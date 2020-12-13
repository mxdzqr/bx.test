<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("CUSTOM_PROFILE"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC_LIST_DESC"),
    "PATH" => array(
        "ID" => "utility",
        "CHILD" => array(
            "ID" => "user",
        )
    ),
);
?>