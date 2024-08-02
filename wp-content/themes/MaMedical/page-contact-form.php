<?php get_header(); ?>
<div id="main">
	<div class="inner">
		<h2 class="pageTitle">Contact Form</h2>
	</div>
</div>
<!-- #main -->
<?php while(have_posts()): the_post();  
	the_content(); ?>
<?php endwhile; wp_reset_postdata(); ?>


<?php get_footer(); ?>