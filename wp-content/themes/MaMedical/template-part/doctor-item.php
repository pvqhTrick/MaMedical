<div class="resultItem">
    <div class="resultLeft">
        <p class="resultNum">
            <span class="numLabel">医師No.</span>
            <span class="numNumber"><?php echo get_field('doctor_no'); ?></span>
        </p>
        <a href="<?php the_permalink() ?>">
            <p class="resultAvatar">
                <?php 
                if(has_post_thumbnail())
                    the_post_thumbnail('thumbnail');
                else 
                    the_default_thumbnail(get_field('gender'));
                ?>
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
                <p class="rFText"><?php echo $qualifications_awards; ?> </p>
            <?php endif; ?>
        </div>
        <div class="resultField">
            <h3 class="rFTitle">経験年数・経歴など</h3>
            <?php if(get_field('years_of_experience')) : ?>
                <p class="rFText"><?php echo get_field('years_of_experience'); ?>年</p>
            <?php endif; ?>
        </div>
    </div>
</div>