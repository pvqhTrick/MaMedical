<?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $is_search = false; 
    $args = array (
        'post_type' => 'doctor',
        'posts_per_page' => '5',
        'paged' => $paged,
        'meta_key' => 'doctor_no',
        'orderby' => 'meta_value_num', 
        'order' => 'ASC',         
    );
    
    if(!empty($_GET['text'])) {
        $is_search = true;
        // $args['s'] =  $_GET['text'];
        $args['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key' => 'doctor_no',
                'value' =>intval($_GET['text']) ,
                'type' => 'NUMERIC'
            ),
            // array(
            //     'key' => 'affiliated_medical_institution_position',
            //     'value' => $_GET['text'],
            //     'compare' => 'LIKE'
            // ),
            // array(
            //     'key' => 'location',
            //     'value' => $_GET['text'],
            //     'compare' => 'LIKE'
            // ),
            // array(
            //     'key' => 'qualifications_awards',
            //     'value' => $_GET['text'],
            //     'compare' => 'LIKE'
            // ),
            // array(
            //     'key' => 'years_of_experience',
            //     'value' =>(int) $_GET['text'],
            //     'compare' => '=',
            //     'type' => 'NUMERIC'
            // ),
        );
    };
        
    if( !empty($_GET['specialty']) && $_GET['specialty'] != 'all'){
        $args['tax_query'] =array( array(
            'taxonomy' => 'specialized-field',
            'field' => 'term_id',
            'terms' => $_GET['specialty'],
        ));
        $is_search = true;
    }

    $listDoctors = new WP_Query($args);
?>

<?php get_header(); var_dump($args)?>

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
        <?php $index =123;
        // get_template_part('template-part/demo',null, array('index'=>$index));
        if($is_search)
            if($listDoctors->have_posts())
                get_template_part('template-part/form-search-box', 'noresult',array('cat_id'=> 1));
            else 
                get_template_part('template-part/form-search-box', 'result', array('number'=> $listDoctors->found_posts));
        else 
            get_template_part('template-part/form-search-box'); ?>
        <!-- form search -->
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
        <!-- .formResult -->
    </div>
    <!-- .areaListDoctor -->
</div>
<!-- #content -->

<?php get_footer() ?>