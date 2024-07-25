<div class="resultItem">
    <div class="resultLeft">
        <p class="resultNum">
            <span class="numLabel">医師No.</span>
            <span class="numNumber"><?php echo get_field('doctor_no'); ?></span>
        </p>
        <a href="<?php the_permalink() ?>">
            <p class="resultAvatar">
                <?php has_post_thumbnail()?the_post_thumbnail('Radio'):the_default_thumbnail(get_field('gender'));?>
            </p>
            <p class="resultName"><?php the_title();?></p>
        </a>
    </div>
    
    <div class="resultRight">
        <div class="resultField">
            <h3 class="rFTitle">専門分野</h3>
            <?php get_template_part('template-part/category'); ?>
        </div>
        
        <div class="resultField">
            <h3 class="rFTitle">資格・受賞歴</h3>

            <?php $qualifications_awards = get_field('qualifications_awards');
            if( $qualifications_awards ): ?>
                <p class="rFText"><?php echo nl2br($qualifications_awards); ?> </p>
            <?php else :
                echo 'No rows found';
            endif;?>
            <!-- <p class="rFText">日本医学放射線学会専門医（放射線治療）<br>日本放射線腫瘍学会認定医<br>日本放射線腫瘍学会高精度放射線外部照射部会幹事</p> -->
        </div>

        <div class="resultField">
            <h3 class="rFTitle">経験年数・経歴など</h3>
            <p class="rFText"><?php echo get_field('years_of_experience'); ?>年</p>
        </div>
    </div>
</div>