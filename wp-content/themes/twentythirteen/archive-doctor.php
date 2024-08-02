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
                <h3 class="areaTitleLead">
                </h3>
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
                <?php get_template_part('template-part/boxBook'); ?>
            </div>
        </div>
        <?php endif; ?>
        <!-- .formResult -->
    </div>
    <!-- .areaListDoctor -->
</div>
<!-- #content -->
<?php get_template_part('template-part/areaContact'); ?>
<!-- #areaContact -->
<?php get_template_part('template-part/fixedSection'); ?>
<!-- #fixedSection -->
<?php get_footer() ?>