<?php get_header() ?>

<div id="fixH"></div>
<?php if (function_exists('custom_breadcrumbs')) {
    custom_breadcrumbs();
} ?>
<!-- #breadCrumb -->
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
                    <span class="numNumber"><?php echo get_field('医師No.') ?></span>
                </p>
                <h3 class="titleDetail"><?php the_title(); ?> <span class="small">医師</span></h3>
                <div class="boxInfor">
                    <p class="imageInfor">
                        <?php
                        if (has_post_thumbnail()):
                            the_post_thumbnail('Radio');
                        else:
                            the_default_thumbnail(get_field('性別'));
                        endif;
                        ?>
                    </p>
                    <div class="detailInfor">
                        <div class="itemInfor">
                            <h4 class="titleInfor">所属医療機関・役職</h4>
                            <p class="subInfor sub21"><?php echo get_field('所属医療機関・役職') ?></p>
                        </div>
                        <div class="itemInfor">
                            <h4 class="titleInfor">所在地</h4>
                            <p class="subInfor"><?php echo get_field('所在地') ?></p>
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
                        <p class="subInfor sub16">
                            日本医学放射線学会専門医（放射線治療）<br>日本放射線腫瘍学会認定医<br>日本放射線腫瘍学会高精度放射線外部照射部会幹事<br>肝癌診療ガイドライン改定委員</p>
                    </div>
                </div>
            </div>
            <div class="boxContent">
                <div class="itemContent">
                    <h4 class="titleContent">自己紹介</h4>
                    <div class="subContent"><?php the_content() ?></div>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">専門分野</h4>
                    <ul class="rFList">
                        <li>食道癌手術（開胸、鏡視下、ロボット支援下）</li>
                        <li>上部消化管手術（食道・胃/良性・悪性）</li>
                        <li>食道癌集学的治療（手術、化学療法、放射線治療など）</li>
                        <li>外科栄養管理</li>
                        <li>上部消化管病理</li>
                    </ul>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">対応可能な疾患</h4>
                    <ul class="rFList">
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                        <li>疾患名疾患名疾患名疾患名疾患名</li>
                    </ul>
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">資格・受賞歴</h4>
                    <?php if (have_rows('専門分野')): ?>
                        <p class="subContent">
                            <?php while (have_rows('専門分野')): the_row();
                                $sub_field_value = get_sub_field('専門分野');
                                echo $sub_field_value . '<br>';
                            endwhile; ?>
                        </p>
                    <?php else:
                        echo '行が見つかりません';
                    endif; ?>
                    <!-- <p class="subContent">
                        日本医学放射線学会専門医（放射線治療）<br>日本放射線腫瘍学会認定医<br>日本放射線腫瘍学会高精度放射線外部照射部会幹事<br>肝癌診療ガイドライン改定委員</p> -->
                </div>
                <div class="itemContent">
                    <h4 class="titleContent">所属学会</h4>
                    <p class="subContent">日本医学放射線学会<br>日本放射線腫瘍学会<br>日本放射線腫瘍学会高精度放射線外部照射部会<br>Journal of thoracic disease
                        Editorial Board</p>
                </div>

                <?php if (have_rows('所属学会')): ?>
                    <div class="itemContent">
                        <h4 class="titleContent">所属学会</h4>
                        <div class="tableContent">
                            <table>
                                <?php while (have_rows('所属学会')): the_row();?>
                                <tr>
                                    <th><?php echo get_sub_field('timestart'); ?>~<?php echo get_sub_field('timeend') ?></th>
                                    <td><?php echo get_sub_field('所属学会') ?></td>
                                </tr>
                                <?php  endwhile; ?>
                            </table>
                        </div>
                    </div>
                <?php else:
                    echo '行が見つかりません';
                endif; ?>
                            
                <div class="itemContent">
                    <h4 class="titleContent">経験年数</h4>
                    <p class="subContent"><?php echo get_field('経験年数') ?>年</p>
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
<div id="areaContact">
    <div class="inner">
        <h3 class="contactTitle">お問合せ<small>は</small><span>お電話</span><small>または</small><br
                class="sp"><span>フォーム</span>でお気軽に</h3>
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
    <p class="fixedButton"><a href="#" class="hover"><img
                src="<?php echo get_theme_file_uri() . ('/assets/images/common/fixed-button.svg') ?>" class="pc"
                alt=""><img src="<?php echo get_theme_file_uri() . ('/assets/images/common/fixed-button-sp.svg') ?>"
                class="sp" alt=""></a></p>
    <p class="scrollToTop"><a href="javascript:;" class="hover"><img
                src="<?php echo get_theme_file_uri() . ('/assets/images/common/ico-totop.svg') ?>" alt=""></a></p>
</div>
<!-- #fixedSection -->
<?php get_footer() ?>