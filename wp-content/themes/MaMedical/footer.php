<?php get_template_part('template-part/areaContact'); ?>
<!-- #areaContact -->
<?php get_template_part('template-part/fixedSection'); ?>
<!-- #fixedSection -->
<div id="footer">
    <div class="inner">
        <div class="ftWrapper">
            <div class="ftInfo">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo get_theme_file_uri() . ('/assets/images/common/logo.svg') ?>" alt=""></a>
                </div>
                <p id="copyright">© copyright by Phan Van Quoc Hung</p>
            </div>
            <!-- ftInfo -->
            <div class="ftMenu">
                <?php wp_nav_menu(['theme_location'=>'footerMenu1', 'container'=>'']) ?>
                <?php wp_nav_menu(['theme_location'=>'footerMenu2', 'container'=>'']) ?>
                <?php wp_nav_menu(['theme_location'=>'footerMenu3', 'container'=>'']) ?>
                </ul>
            </div>
            <!-- ftMenu -->
        </div>
    </div>
</div>
<!-- #footer -->
    <?php wp_footer(); ?>
</body>
</html>

