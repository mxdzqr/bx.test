<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use  \Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>

    <title><? $APPLICATION->ShowTitle() ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/vnd.microsoft.icon"  href="<?= SITE_TEMPLATE_PATH ?>/assets/img/favicon.ico">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/favicon.ico">

    <?
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/reset.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/style.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/owl.carousel.css');

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/jquery.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/owl.carousel.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/scripts.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/ajax.js');

    Asset::getInstance()->addString('<link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">');
    ?>

    <? $APPLICATION->ShowHead(); ?>
</head>

<body>
<? $APPLICATION->ShowPanel() ?>

<div class="wrap">

    <header class="header">
        <div class="inner-wrap">

            <div class="actions-block">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:system.auth.form",
                    "",
                    [
                        "FORGOT_PASSWORD_URL" => "/login/index.php?forgot_password=yes",
                        "PROFILE_URL"         => "profile/",
                        "REGISTER_URL"        => "/login/register.php",
                        "SHOW_ERRORS"         => "N",
                    ],
                    false
                ); ?>
            </div>
        </div>
    </header>

    <nav class="nav">
        <div class="inner-wrap">
            <div class="menu-block popup-wrap">
                <a href="" class="btn-menu btn-toggle"></a>
                <div class="menu popup-block">
                    <ul class="">
                        <li class="main-page"><a href="/">Главная</a></li>
                        <li><a href="/profile/">Profile</a></li>
                        <li><a href="/events/">Events</a></li>
                        <li><a href="/articles/">Articles</a></li>
                    </ul>
                    <a href="" class="btn-close"></a>
                </div>
                <div class="menu-overlay"></div>
            </div>
        </div>
    </nav>

</div>
