<?php
$blockField = get_fields('option');

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<div class="adv-block"></div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.typekit.net/fkf2hvj.css">
    <link rel="stylesheet" href="https://use.typekit.net/uwr6lyz.css">

    <title><?php wp_title()?></title>
</head>
<body id="test">
<?php wp_head() ?>
<header class="header">
    <div class="header-top-menu">
        <span class="menu-name"> <?php _e('Meny', 'norskgolf'); ?></span>
        <div class="search" id="test">
            <span><?php _e('Søk', 'norskgolf'); ?></span>
        </div>
        <div class="logo">
            <?php echo get_custom_logo(); ?>
        </div>
        <a class="golfbox-mobile" href="#"></a>
        <div class="burger-menu">
            <span class="burger-open"></span>
        </div>
    </div>
</header>
<span class="search-bg hidden"></span>
<div class="search-input hidden">
    <div class="search-exit">
        <span class="search-exit-button"></span>
    </div>
    <form method="get" class="search-form" action="<?php home_url() ?>">
          <input type="text" class="search-field" value name="s" placeholder="Hva søker du etter?">
        <span class="search-helper"><?php _e('Trykk “Enter” for å søke') ?> </span>
</form>
</div>
<div class="header-menus">
    <div class="menu-button">
        <a class="golfbox" href="#"></a>
        <span class="close" ><?php _e('Lukk', 'norskgolf'); ?></span>
    </div>
    <div class="all-menus" >
        <div class="main-menu">
            <?php wp_nav_menu(['theme_location' => 'header_menu']); ?>
        </div>
        <div class="header-submenu">
            <?php wp_nav_menu(['theme_location' => 'header_submenu']); ?>
        </div>
    </div>
</div>



