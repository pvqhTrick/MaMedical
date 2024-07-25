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
	register_nav_menus(array(
		'headerMenu' => __( 'Header Menu' ),
		'footerMenu1'  => __( 'Footer Menu 1' ),
		'footerMenu2'  => __( 'Footer Menu 2' ),
		'footerMenu3'  => __( 'Footer Menu 3' ),
	  ));

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


// SHOW CATEGORY
function show_category( $category = 'null' ){
$categories = wp_get_post_terms(get_the_ID(), $category);
if ($categories): ?>
    <ul class="rFList">
        <?php foreach ($categories as $item): ?>
            <li><?php echo $item->name ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; 
}

/// FUNCTION
// HEADER MENU NAVIGATION 
function MaMedical_header_menu_nav(){
	$menu_name = 'headerMenu'; 
	$locations = get_nav_menu_locations(); 

	if (isset($locations[$menu_name])):
		$menu_id = $locations[$menu_name]; 
		$menu_items = wp_get_nav_menu_items($menu_id);
		if ($menu_items):
			foreach ($menu_items as $item):
				if(has_sub_field($menu_name, $menu_id)): ?>
				<li class="menu-item-has-children">
					<a href=<?php echo esc_url($item->url)?>><?php echo esc_html($item->title) ?></a>
					<ul class="sub-menu">
						<li><a href="#">オンライン<br>セカンドオピニオン<br>とは</a></li>
						<li><a href="#">医師へのメール相談<br>とは</a></li>
						<li><a href="#">ご利用の流れ</a></li>
                    </ul>
				</li>

				<?php else: ?>
					<li><a href=<?php echo esc_url($item->url)?>><?php echo esc_html($item->title) ?></a></li>
				<?php endif; ?>
			<?php endforeach;
		endif; 
	endif;  
}
// GET DEFAULT IMAGE
function the_default_thumbnail($gender = true){
	if(!$gender)
		echo '<img src="' .get_theme_file_uri() . ('/assets/images/doctor/ava-men'). '">';
	else
		echo '<img src="' .get_theme_file_uri() . ('/assets/images/doctor/ava-women'). '">';
}


// THEME PAGINATION FUNCTION
function theme_pagination($post_query = null)
{
	global $paged, $wp_query;

	$translate['next'] = '次へ';
	$translate['prev'] = '前へ';
	$translate['first'] ='';
	$translate['end'] ='';

	if (empty($paged))
		$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;

	$end_size = 1;
	$mid_size = 2;
	$show_all = false;
	$dots = false;

	$pagi_query = $wp_query;
	if (isset($post_query) && $post_query) {
		$pagi_query = $post_query;
	}

	if (!$total = $pagi_query->max_num_pages)
		$total = 1;

	if ($total > 1) {
		echo '<div class="pagingNav hira">';
		echo '<ul class = "pagi_nav_list">';

		if ($paged > 1) {
			echo '<li class="p-control prev"><a href="' . previous_posts(false) . '">' . $translate['prev'] . '</a></li>';
		}
		
		for ($i = 1; $i <= $total; $i++) {
			if ($i == $paged) {
				echo '<li class="active"><a>' . $i . '</a></li>';
				$dots = true;
			} else {
				if ($show_all || ($i <= $end_size || ($paged && $i >= $paged - $mid_size && $i <= $paged + $mid_size) || $i > $total - $end_size)) {
					echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
					$dots = true;
				} elseif ($dots && !$show_all) {
					echo '<li class="dots"><a>...</a></li>';
					$dots = false;
				}
			}
		}
		
		
		if ($paged < $total) {
			echo '<li class="p-control next"><a href="' . next_posts(0, false) . '">' . $translate['next'] . '</a></li>';
		}

		echo '</ul>';
		echo '</div>';
	}
}
// CHECK SUB ITEM IN MENU
function has_sub_menu( array $menu_items, int $id ){
    foreach ( $menu_items as $menu_item ){
        if ( (int)$menu_item->menu_item_parent === $id ) {
            return true;
        }
    }
    return false;
}

// CUSTOM BREADCRUMBS
function custom_breadcrumbs() {
    $separator          = '>';
    $home_title         = 'single';
    
    // Get the query & post information
    global $post,$wp_query;
    
    if ( !is_front_page() ) {
		echo '<div id="breadCrumb">';
       	echo '<div class="inner">';
        echo '<ul class="listBread">';

        echo '<li><a href="' . HOME_URL . '">TOP</a></li>';
        
		if ( is_post_type_archive('doctor')) {
            echo '<li><a href=#>医師一覧</a></li>';
        }

        if ( is_single() ) {
			echo '<li><a href=#> 医師一覧 </a></li>';
            echo '<li><span>' . get_the_title() . '</span></li>';
        } 
		
        echo '</ul>';
		echo '</div>';
		echo '</div>';
    }
}

/// ACTION
// LOADING CSS AND JS 
add_action('wp_enqueue_scripts', 'load_assets');
function load_assets()
{
	if (is_home() || is_front_page()) {
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css');
	} elseif (is_single()) {
		wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/doctor-detail.css');
		wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/assets/js/jquery.bxslider.min.js", array('jqueryjs'), '1.0', array('in_footer' => false));

	} elseif (is_page('list')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/doctor-list.css');
	} elseif (is_page('page')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/index.css');
	} else{
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/doctor-list.css');
	}

	wp_enqueue_style('maincommoncss', get_theme_file_uri() . '/assets/css/common.css');
	wp_enqueue_style('mainjquerycss', get_theme_file_uri() . '/assets/css/jquery.bxslider.css');
	wp_enqueue_script('jqueryjs', get_theme_file_uri() . "/assets/js/jquery-1.11.0.min.js", array(), '1.0', array('in_footer' => false));
	// wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/assets/js/jquery.bxslider.mi	n.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	wp_enqueue_script('mainjs', get_theme_file_uri() . "/assets/js/script.js", array('jqueryjs'), '1.0', array('in_footer' => false));
}


/// FILTER