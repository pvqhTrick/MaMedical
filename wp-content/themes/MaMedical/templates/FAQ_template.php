<?php
/*
Template Name: FAQ Template
*/
?>
<?php get_header() ?>
<div id="main">
    <div class="inner">
        <h2 class="pageTitle">よくある質問</h2>
    </div>
</div>
<!-- #main -->
<div id="content">
    <div class="areaFaq pageBG">
        <div class="inner">
        <?php
        $args = array ( 'post_type' => 'faq' );
        $FAQS = new WP_Query($args); 
        // var_dump($FAQS);
        if($FAQS->have_posts()): $FAQS->the_post();?> 
            <?php if( have_rows('frequently_asked_questions') ): ?>
                <h3 class="areaTitleLead">よくある質問</h3>
                <?php while( have_rows('frequently_asked_questions') ): the_row();  ?>
                <div class="listFaq">
                    <div class="itemFaq">
                        <div class="question">
                            <p class="numQ"><?php echo get_sub_field('question_no') ?></p>
                            <h4 class="titlequestion"><?php echo nl2br(get_sub_field('question')) ?></h4>
                        </div>
                        <div class="anwser">
                            <p class="iconA"><?php echo get_sub_field('answers_name') ?></p>
                            <p class="subQuestion"><?php echo get_sub_field('answers') ?><br class="pc">利用できます。「医師への相談サービス」は特に委任状は必要ございません。</p>
                        </div>
                    </div>
                </div>
                <?php endwhile; 
            endif; 
        else: ?>
            <h3 class="areaTitleLead">NULL</h3>
        <?php endif; ?>
        </div>
    </div>
</div>
<!-- #content -->
<script type="text/javascript">
    $('.question').click(function () {
        $(this).next('.anwser').stop().slideToggle();
        $(this).toggleClass('changeArrs');
    });
</script>

<?php get_footer() ?>