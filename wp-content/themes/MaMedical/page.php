<?php get_header(); ?>

<div id="fixH"></div>
<div id="breadCrumb">
	<div class="inner">
		<ul class="listBread">
			<li><a href="#">TOP</a></li>
			<li>会社概要</li>
		</ul>
	</div>
</div>
<!-- #breadCrumb -->
<div id="main">
	<div class="inner">
		<h2 class="pageTitle">会社概要</h2>
	</div>
</div>
<!-- #main -->
<?php while(have_posts()): the_post();  
	the_content(); ?>
<?php endwhile; wp_reset_postdata(); ?>



<?php get_footer(); ?>