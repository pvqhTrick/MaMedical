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
                <li class="current-menu-item"><a href="#">TOP</a></li>
                <li class="menu-item-has-children">
                    <a href="#">サービスについて</a>
                    <ul class="sub-menu"> 
                        <li><a href="#">MAオンライン<br>セカンドオピニオン<br>サービスとは</a></li>
                        <li><a href="#">医師へのメール相談<br>サービスとは</a></li>
                        <li><a href="#">ご利用の流れ</a></li>
                    </ul>
                </li>
                <li><a href="#">料金</a></li>
                <li><a href="#">医師一覧</a></li>
                <li><a href="#">よくある質問</a></li>
                <li><a href="#">お客様の声</a></li>
                <li><a href="#">運営会社</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- #header -->
