<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main;

$result = [
	'ret' => false,
	'message' => 'Давным-давно, в далекой-далекой галактике...'
];

$request = Main\Application::getInstance()->getContext()->getRequest();

if(
	$request->getPost('name') != null  &&
	$request->getPost("tel") != null &&
	$request->getPost('email') != null
)
{
	if(Main\Loader::includeModule("iblock"))
	{
		$arFields['NAME'] = $request->getPost('name');
		$arFields['PHONE'] = $request->getPost('tel');
		$arFields['EMAIL'] = $request->getPost('email');
		$arFields['TEXT']  = $request->getPost('text');

		if(CEvent::Send('ON_RECOUNT_POST', SITE_ID, $arFields));
			$result = [
				'ret' 	=> true
			];
	}
}
else
	$result = [
		'ret' => false,
		'message' => 'Не заполнены обязательные поля!'
	];

echo json_encode($result);