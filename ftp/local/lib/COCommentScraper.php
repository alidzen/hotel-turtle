<?php
namespace olympia;

/**
 * Class CommentScraper
 * @package olympia
 */
class CommentScraper
{
    /**
     *
     * @var object Client class
     */
    private $client;

    /**
     *
     * @var string
     */
    private $clientClass;

    /**
     *
     * @var array
     */
    private $comments = array();

    /**
     *
     * @var array
     */
    private $headers = [
        'User-Agent'      => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:38.0) Gecko/20100101 Firefox/38.0',
        'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Encoding' => 'gzip, deflate',
        'Accept-Language' => 'en-US,en;q=0.5',
        'Connection'      => 'keep-alive',
    ];

    private $sites = [
        'booking'     => [
            'n_comments'      => 5,
            'commentSelector' => '.review_item',
            'elemSelectors'   => [
                'author'  => '.review_item_reviewer h4',
                'country' => '.review_item_reviewer .reviewer_country',
                'score'   => '.review_item_header_score_container',
                'header'  => '.review_item_header_content',
                'content' => '.review_item_review_content',
                'date'    => '.review_item_header_date'
            ]
        ],
        'tripadvisor' => [
            'n_comments'      => 10,
            'commentSelector' => '.review',
            'elemSelectors'   => [
                'author'  => '.member_info .username',
                'country' => '.member_info .location',
                'score'   => '.rate',
                'header'  => '.quote',
                'content' => '.partial_entry',
                'date'    => '.ratingDate',
            ],
        ],
    ];

	/**
	 * CommentScraper constructor.
	 *
	 * @param       $clientObject
	 * @param array $sitesConfig
	 */
    public function __construct($clientObject, array $sitesConfig = [])
    {
        $this->clientClass = '\\'.get_class($clientObject);

        if (!empty($sitesConfig))
        {
            $this->sites = array_replace_recursive(
                $this->sites,
                $sitesConfig
            );
        }
    }

	/**
	 * @param string $site
	 * @param bool   $forceRefresh
	 *
	 * @return array|mixed
	 */
    public function getComments($site = '', $forceRefresh = false)
    {
        try
        {
            if ($site)
            {
                if (!array_key_exists( $site, $this->sites))
                {
                    throw new \Exception('No site configuration found');
                }

                if (!isset($this->comments[ $site ]) || empty($this->comments[ $site ]) || $forceRefresh === true)
                    $this->fetchComments($site);

                return $this->comments[ $site ];
            }
        }
        catch (\Exception $e)
        {
            $file = $e->getFile();
            $line = $e->getLine();
            echo 'Error crawling site! Message: '.$e->getMessage()." ($file:$line)";
        }

        if (empty($this->comments) || $forceRefresh === true)
        {
            foreach ($this->sites as $site => $config)
                $this->fetchComments($site);
        }

        return $this->comments;
    }

	/**
	 * @param $site
	 */
    private function fetchComments($site)
    {
        foreach ($this->sites[$site]['languageURI'] as $lang => $uri) {
            if (is_array($uri)) {
                foreach ($uri as $lang_uri) {
                    $this->fetchURI($site, $lang, $lang_uri);
                }

                continue;
            }

            $this->fetchURI($site, $lang, $uri);
        }
    }

	/**
	 * @param $site
	 * @param $lang
	 * @param $uri
	 */
    private function fetchURI($site, $lang, $uri)
    {
        try {
            $this->client = new $this->clientClass();
            $this->initHeaders();

            $siteURI = parse_url($uri);
            $this->client->setHeader('Host', $siteURI['host']);

            $crawler = $this->client->request('GET', $uri);

            $crawler->filter($this->sites[ $site ]['commentSelector'])
                    ->each(
                        function ($node, $i) use ($site, $lang)
                        {
                            if ($i < $this->sites[ $site ]['n_comments'])
                            {
                                $this->parseContent(
                                    $node,
                                    $site,
                                    $lang
                                );
                            }
                        }
                    );

            unset($this->client);

        } catch (\Exception $e) {
            $file = $e->getFile();
            $line = $e->getLine();
            echo 'Error crawling site! Message: '.$e->getMessage()." ($file:$line)";
        }
    }

    private function initHeaders()
    {
        foreach ($this->headers as $header => $value)
            $this->client->setHeader($header, $value);
    }

	/**
	 * @param $key
	 * @param $val
	 *
	 * @return bool
	 */
    public function setHeader($key, $val)
    {
        if (!$key || !$val)
            return false;

        $this->headers[$key] = $val;

		return true;
    }

	/**
	 * @param $headers
	 *
	 * @return bool
	 */
    public function setHeaders($headers)
    {
        if (!is_array($headers) || empty($headers)) {
            return false;
        }

        $this->headers = $headers;

		return true;
    }

	/**
	 * @param $node
	 * @param $site
	 * @param $lang
	 *
	 * @return bool
	 */
    private function parseContent($node, $site, $lang)
	{
		$elemSelectors = $this->sites[ $site ]['elemSelectors'];

		if (!count($elemSelectors))
			return false;

		$newReview = [
			'id' => '',
			'site' => $site,
		];

		foreach ($elemSelectors as $key => $el)
		{
			$elNode = $node->filter($el);

			if ($elNode === null)
				continue;

			$parseFnName = 'parse'.ucfirst($site).'Content';

			if (method_exists($this, $parseFnName))
				$val = call_user_func_array([$this, $parseFnName], [$elNode, $key]);
			elseif (isset($this->sites[ $site ]['parseFn']) && is_callable($this->sites[ $site ]['parseFn']))
			{
				$fn = $this->sites[ $site ]['parseFn'];

				$val = $fn($elNode, $key);
			}

			$newReview[ $key ] = strip_tags($val);

			if ($key == 'content')
				$newReview['id'] = md5($newReview[ $key ]);
		}

		if (!isset($this->comments[ $site ]))
			$this->comments[ $site ] = [];

		if (!isset($this->comments[ $site ][ $lang ]))
			$this->comments[ $site ][ $lang ] = [];

		array_push($this->comments[ $site ][ $lang ], $newReview);

		return true;
	}

	/**
	 * @param $elementNode
	 * @param $key
	 *
	 * @return mixed|string
	 */
    private function parseBookingContent($elementNode, $key)
    {
        if ($key == 'content') {
            $val =  trim($elementNode->html());
            $val = preg_replace(
				['/^\n+|^[\t\s]*\n+/', '/<p class="review_neg">(\n)*/', '/<p class="review_pos">(\n)*/', '/<\/p>/', '/\n{1}$/', ],
                ['','--- ', '+++ ', '', '', ],
                $val
            );
        } elseif ($key == 'score')
            $val = trim($elementNode->text()).'/10';
        else
            $val = trim($elementNode->text());

        return $val;
    }

	/**
	 * @param $elementNode
	 * @param $key
	 *
	 * @return mixed|string
	 */
    private function parseTripAdvisorContent($elementNode, $key)
    {
        if ($key == 'content')
		{
            $val = trim($elementNode->text());
            $val = preg_replace(
                ['/(^\n+|^[\t\s]*\n+)(More\s*)/m'],
                [''],
                $val
            );
        } elseif ($key == 'score')
		{
            $score = array();
            $html = $elementNode->html();

            preg_match('/alt="([1-5]){1}/', $html, $score);

            if (!count($score)) {
                $val = '';
                break;
            }

            $val = $score[1].'/5';
        }
		elseif ($key == 'date')
            $val = str_replace('Reviewed ', '', trim($elementNode->text()));
        else
            $val = trim($elementNode->text());

        return $val;
    }
}