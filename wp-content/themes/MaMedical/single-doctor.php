<?php get_header() ?>
<div id="main">
    <div class="inner">
        <h2 class="mainTitle acumin">Specialist Doctors profile</h2>
    </div>
</div>
<!-- #main -->
<div id="content">
    <div class="areaDetail">
        <div class="inner">
            <div class="boxDetail">
                <p class="resultNum">
                    <span class="numLabel">医師No.</span>
                    <span class="numNumber"><?php echo get_field('doctor_no') ?></span>
                </p>
                <h3 class="titleDetail"><?php the_title(); ?> <span class="small">医師</span></h3>
                <div class="boxInfor">
                    <p class="imageInfor">
                        <?php has_post_thumbnail() ? the_post_thumbnail('Radio') : the_default_thumbnail(get_field('gender')); ?>
                    </p>
                    <div class="detailInfor">
                        <div class="itemInfor">
                            <h4 class="titleInfor">所属医療機関・役職</h4>
                            <p class="subInfor sub21"><?php echo get_field('affiliated_medical_institution_position') ?></p>
                        </div>
                        <div class="itemInfor">
                            <h4 class="titleInfor">所在地</h4>
                            <p class="subInfor"><?php echo get_field('location') ?></p>
                        </div>
                    </div>
                </div>
                <div class="listInfor">
                    <div class="itemInfor">
                        <h4 class="titleInfor">専門分野</h4>
                        <?php get_template_part('template-part/category'); ?>
                    </div>
                    <div class="itemInfor">
                        <h4 class="titleInfor">資格・受賞歴</h4>
                        
                        <?php $qualifications_awards = get_field( 'qualifications_awards' );
                        if($qualifications_awards):?>
                            <p class="subInfor sub16"><?php echo nl2br($qualifications_awards) ?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <!-- boxDetail -->

            <div class="boxContent">
                <div class="itemContent">
                    <h4 class="titleContent">自己紹介</h4>
                    <div class="subContent"><?php the_content() ?></div>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">専門分野</h4>
                    <?php get_template_part('template-part/category'); ?>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">対応可能な疾患</h4>
                    <?php $patients = get_field( 'patient' );
                    if ($patients): ?>
                    <ul class="rFList">
                        <?php foreach ($patients as $patient) :?>
                            <li><?php echo $patient['name_patient']?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">資格・受賞歴</h4>
                    <?php get_template_part('template-part/category'); ?>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">所属学会</h4>
                    <?php 
                    if (get_field('affiliated_academic_society_text')): ?>
                        <p class="subContent"><?php echo nl2br(get_field('affiliated_academic_society_text')); ?></p>
                    <?php else:
                        echo '行が見つかりません';
                    endif; ?>
                </div>
                <?php $affiliated_academic_society = get_field('affiliated_academic_society_table'); ?>
                <?php if ($affiliated_academic_society): ?>
                    <div class="itemContent">
                        <h4 class="titleContent">所属学会</h4>
                        <div class="tableContent">
                            <table>
                                <?php foreach($affiliated_academic_society as $item):?>
                                <tr>
                                    <th><?php echo $item['time_line']?></th>
                                    <td><?php  echo $item['affiliated_academic_society_name']?></td>
                                </tr>
                                <?php  endforeach; ?>
                            </table>
                        </div>
                    </div>
                <?php else:
                    echo '行が見つかりません';
                endif; ?>          
                <div class="itemContent">
                    <h4 class="titleContent">経験年数</h4>
                    <?php if(get_field('years_of_experience')): ?>
                        <p class="subContent"><?php echo get_field('years_of_experience') ?>年</p>
                    <?php endif; ?>
                </div>
            </div>
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