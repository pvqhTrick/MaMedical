<div class="resultItem">
    <div class="resultLeft">
        <p class="resultNum">
            <span class="numLabel">医師No.</span>
            <span class="numNumber"><?php echo get_field('医師No.'); ?></span>
        </p>
        <a href="<?php the_permalink() ?>">
            <p class="resultAvatar">
                <?php 
                if(has_post_thumbnail()):
                    the_post_thumbnail('Radio');
                else:
                    the_default_thumbnail(get_field('性別'));
                endif;
                ?>
            </p>
            <p class="resultName"><?php the_title(); ?> </p>
        </a>
    </div>
    
    <div class="resultRight">
        <div class="resultField">
            <h3 class="rFTitle">専門分野</h3>
            <?php get_template_part('template-part/category'); ?>
        </div>
        
        <div class="resultField">
            <h3 class="rFTitle">資格・受賞歴</h3>

            <?php if( have_rows('専門分野') ): ?>
                <p class="rFText">
                <?php while ( have_rows('専門分野') ) : the_row();
                    $sub_field_value = get_sub_field('専門分野');
                    echo $sub_field_value . '<br>';
                endwhile; ?>
                </p>
            <?php else :
                echo 'No rows found';
            endif;?>
            <!-- <p class="rFText">日本医学放射線学会専門医（放射線治療）<br>日本放射線腫瘍学会認定医<br>日本放射線腫瘍学会高精度放射線外部照射部会幹事</p> -->
        </div>

        <div class="resultField">
            <h3 class="rFTitle">経験年数・経歴など</h3>
            <p class="rFText"><?php echo get_field('経験年数'); ?>年</p>
        </div>
    </div>
</div>