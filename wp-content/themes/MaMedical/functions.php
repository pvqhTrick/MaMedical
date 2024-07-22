<?php
if ( ! isset( $content_width ) )
	$content_width = 604;

define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'HOME_URL', get_home_url() );

/**
 * My Theme only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

function mytheme_setup() {
	load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'gallery', 'image', 'link', 'status'
	) );
	//'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'mytheme' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function mytheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mytheme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mytheme_wp_title', 10, 2 );

if ( ! function_exists( 'mytheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function mytheme_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'mytheme' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'mytheme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'mytheme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'mytheme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*/
function mytheme_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'mytheme' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'mytheme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'mytheme' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'mytheme_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own mytheme_entry_meta() to override in a child theme.
 */
function mytheme_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'mytheme' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		mytheme_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'mytheme' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'mytheme' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'mytheme' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;


function mytheme_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mytheme' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'mytheme_excerpt_more' );

function mytheme_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'mytheme_content_width' );



/// FUNCTION

/// ACTION
// LOADING CSS AND JS 
add_action('wp_enqueue_scripts', 'load_assets');
function load_assets()
{
	if (is_home() || is_front_page()) {
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css');
	} elseif (is_single()) {
		wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/detail.css');
	} elseif (is_page('list')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/list.css');
	} else{
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/list.css');
	}

	wp_enqueue_style('maincommoncss', get_theme_file_uri() . '/assets/css/common.css');
	wp_enqueue_style('mainjquerycss', get_theme_file_uri() . '/assets/css/jquery.bxslider.css');
	wp_enqueue_script('jqueryjs', get_theme_file_uri() . "/assets/js/jquery-1.11.0.min.js", array(), '1.0', array('in_footer' => false));
	// wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/assets/js/jquery.bxslider.min.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	wp_enqueue_script('mainjs', get_theme_file_uri() . "/assets/js/script.js", array('jqueryjs'), '1.0', array('in_footer' => false));
}


/// FILTER