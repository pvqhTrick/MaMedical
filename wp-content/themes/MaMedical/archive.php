<?php get_header() ?>
<div id="fixH"></div>
<?php if (function_exists('custom_breadcrumbs')) {
    custom_breadcrumbs();
} ?>
<!-- #breadCrumb -->
<div id="main">
    <div class="inner">
        <h2 class="pageTitle">医師一覧</h2>
    </div>
</div>
<!-- #main -->
<div id="content">
    <div class="areaListDoctor pageBG">
        <div class="doctorIntro">
            <div class="inner">
                <h3 class="areaTitleLead">医師一覧</h3>
                <p class="txtDoc">MAメディカル相談サービス</p>
                <ul class="listDoc">
                    <li>MAオンライン・セカンドオピニオンサービス（医師とオンライン面談）</li>
                    <li>MA医師との相談サービス（医師とメール相談）</li>
                </ul>
                <p class="txtDoc">を受けられる医師をご紹介いたします。</p>
            </div>
        </div>
        <!-- .doctorIntro -->
         
        <?php get_template_part('template-part/form-search-box'); ?> 
        <!-- form search -->

        <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array (
            'post_type' => 'doctor',
            'posts_per_page' => '5',
            'paged' => $paged,
            'meta_key' => 'doctor_no',
            'orderby' => 'meta_value_num', 
            'order' => 'ASC'
        );
        $listDoctors = new WP_Query($args);
        ?>

        <?php if($listDoctors->have_posts()): ?>
        <div class="formResult">
            <div class="inner">
                <div class="listResult">
                    <?php while($listDoctors->have_posts()): $listDoctors->the_post(); ?>
                        <?php get_template_part('template-part/doctor-item'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>

                    <?php echo theme_pagination($listDoctors); ?>
                </div>
                <div class="boxBook">
                    <h3 class="titleBook">医師の詳細なプロフィールは<br>医師への相談・面談予約<br class="sp">お申込み時に<br class="sp">ご確認いただけます。</h3>
                    <p class="btnBook"><a href="#" class="hover">医師への相談・<br class="sp">面談予約をする</a></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- .formResult -->
    </div>
    <!-- .areaListDoctor -->
</div>
<!-- #content -->
<div id="areaContact">
    <div class="inner">
        <h3 class="contactTitle">お問合せ<small>は</small><span>お電話</span><small>または</small><br class="sp"><span>フォーム</span>でお気軽に</h3>
        <div class="boxPhone">
            <p class="boxPhoneHead">お客様専用電話窓口</p>
            <p class="phone acumin"><a href="tel:0120934844">0120-934-844</a></p>
            <p class="address">電話受付時間　平日9:00-17:00</p>
        </div>
        <p class="btnContact"><a href="#" class="hover">医師への相談・面談予約・<br class="sp">その他お問合せ</a></p>
    </div>
</div>
<!-- #areaContact -->
<div id="fixedSection">
    <p class="fixedButton">
        <a href="#" class="hover"><img src="<?php echo get_theme_file_uri(). ("/assets/images/common/fixed-button.svg")?>" class="pc" alt=""><img src="<?php echo get_theme_file_uri().("assets/images/common/fixed-button-sp.svg"); ?>" class="sp" alt=""></a>
    </p>
    <p class="scrollToTop">
        <a href="javascript:;" class="hover"><img src="assets/images/common/ico-totop.svg" alt=""></a>
    </p>
</div>
<?php get_footer() ?>