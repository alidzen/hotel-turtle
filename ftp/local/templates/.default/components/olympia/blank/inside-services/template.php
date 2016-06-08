<?if(count($arResult['ITEMS'])>0):?>
<section class="l-services">
	<div class="l-services__header l-limit-wrap no-padding">
		<div class="l-services__row">
			<div class="b-article">
				<div class="b-feature__header">
					<h1 class="b-feature__ttl">
						<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/services-main-ttl.php',
							Array(),
							Array('MODE' => 'html', 'NAME' => 'заголовок страницы')
						);?>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="l-services__tiles l-limit-wrap no-padding">
		<div class="l-services__tiles-row">
			<?for($i = 0; $i < count($arResult['ITEMS']); $i++):?>
				<div class="l-services__tile <?=$arResult['ITEMS'][$i]['BLOCK_TYPE']['VALUE'];?>">
					<div class="b-service<?if($arResult['ITEMS'][$i]['BLOCK_TYPE']['BORDER']):?> has-lines<?endif;?>">
						<?if($arResult['ITEMS'][$i]['BLOCK_TYPE']['BORDER']):?>
						<div class='b-service__border'>
						<?endif;?>
						<?if($i >= 3):?>
						<div class="b-service__cnt">
						<?endif;?>
							<div class="b-service__header">
								<div class="b-service__ttl-note"><?=$arResult['ITEMS'][$i]['NAME'];?></div>
							</div>
							<p><?=$arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></p>
						<?if($i >= 3):?>
						</div>
						<?endif;?>
							<?if($i < 3):?>
							<div class="b-service__img-wrap">
							<?endif;?>
								<div class="b-service__img">
									<?if($arResult['ITEMS'][$i]['IMAGE'] !== NULL):?>
										<img src="<?=$arResult['ITEMS'][$i]['IMAGE'];?>" alt="<?=$arResult['ITEMS'][$i]['NAME'];?>">
									<?endif;?>
								</div>
							<?if($i < 3):?>
							</div>
							<?endif;?>
						<?if($arResult['ITEMS'][$i]['BLOCK_TYPE']['BORDER']):?>
						</div>
						<?endif;?>
					</div>
				</div>
			<?endfor;?>
		</div>
	</div>
</section>
<?endif;?>
