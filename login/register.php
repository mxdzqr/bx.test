<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?>

<div class="container">
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.register",
                "",
                Array(
                    "AUTH" => "N",
                    "REQUIRED_FIELDS" => array("EMAIL","NAME","SECOND_NAME","LAST_NAME"),
                    "SET_TITLE" => "Y",
                    "SHOW_FIELDS" => array("EMAIL","NAME","SECOND_NAME","LAST_NAME"),
                    "SUCCESS_PAGE" => "/login",
                    "USER_PROPERTY" => array(),
                    "USER_PROPERTY_NAME" => "",
                    "USE_BACKURL" => "Y"
                )
            );?>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
