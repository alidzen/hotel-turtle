<!DOCTYPE html>
<html>
<head>
	<meta charset="<?=LANG_CHARSET ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?$APPLICATION->ShowTitle()?> &mdash; Ахиллес и Черепаха</title>
	<?$APPLICATION->ShowMeta("keywords")?>
	<?$APPLICATION->ShowMeta("description")?>
	<?$APPLICATION->ShowCSS();?>
	<?$APPLICATION->ShowHeadStrings()?>
	<?$APPLICATION->IncludeFile(
		"/local/area/scripts.php",
		Array(),
		Array("SHOW_BORDER" => false, "MODE" => "text")
	);?>
	<?$APPLICATION->ShowHeadScripts()?>
</head>
<body>
	<?$APPLICATION->ShowPanel();?>