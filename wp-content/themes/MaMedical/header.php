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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/i18n/datepicker.ja-JP.min.js" integrity="sha512-ZP3x/vrH154LojT7mCIBPQoioAD64+Qx8LQ1LZSP5DO6gFOx79U2AMl4t3dfwKHPNRIR4MmG4/SOcgagUngtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
	<?php wp_head(); ?>
</head>

<body>

<div id="header">
    <div class="headerBar">
        <div class="inner">
            <div class="logo">
                <a class="hover" href="index.html"><img src="<?php echo get_theme_file_uri() . ('/assets/images/common/logo.svg') ?>" alt=""></a>
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
            <ul class="menu">
                <li class="current-menu-item"><a href="<?php echo home_url() ?>">TOP</a></li>
                <li class="menu-item-has-children">
                    <a href="#">サービスについて</a>
                    <ul class="sub-menu"> 
                        <li><a href="#">MAオンライン<br>セカンドオピニオン<br>サービスとは</a></li>
                        <li><a href="#">医師へのメール相談<br>サービスとは</a></li>
                        <li><a href="#">ご利用の流れ</a></li>
                    </ul>
                </li>
                <?php MaMedical_header_menu_nav(); ?>
            </ul>
        </div>
    </div>
</div>
<!-- #header -->
