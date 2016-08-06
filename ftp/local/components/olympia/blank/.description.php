<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = [
	"NAME" => GetMessage("NAME"),
	"DESCRIPTION" => GetMessage("DESCR"),
	"ICON" => "/images/system.empty.png",
	"VERSION" => "1.00",
    "PATH" => [
		"ID" => "bitrixonrails",
		"NAME" => GetMessage("BITRIXONRAILS_GROUP_NAME"),
		"CHILD" => [
			"ID" => "system",
			"NAME" => GetMessage("SYSTEM_GROUP_NAME")
		]
	]
];

?>