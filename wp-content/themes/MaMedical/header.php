<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <meta name="description" content=" content " />
    <meta name="keywords" content=" content " />
    <meta name="author" content=" content " />
    <meta name="robots" content=" all " />
    <meta name="googlebot" content=" all ">
	<?php wp_head(); ?>   
</head>

<body> 
<div id="header">
    <div class="headerBar">
        <div class="inner">
            <div class="logo">
                <a class="hover" href="<?php echo home_url() ?>"><img src="<?php echo get_theme_file_uri() . ('/assets/images/common/logo.svg') ?>" alt=""></a>
            </div>
            <ul class="listLang">
                <li><a href="#" class="hover">日本語</a></li>
                <li><a href="#" class="hover">ENGLISH</a></li>
                <li><a href="#" class="hover">中文</a></li>
            </ul>
            <div class="hamburger sp">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="mainMenu">
        <div class="inner">
            <?php wp_nav_menu(['theme_location'=>'headerMenu', 'container'=>'']); ?>
        </div>
    </div>
</div>
<!-- #header -->
<div id="fixH" style='height: 65px'></div>
<?php if (function_exists('custom_breadcrumbs') && !is_home()) {
    custom_breadcrumbs();
} ?>
<!-- #breadCrumb -->
