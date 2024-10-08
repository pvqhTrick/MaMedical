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


// SHOW CATEGORY
function show_category( $category = 'null' ){
	$categories = get_terms('specialized-field');
	foreach($categories as $item): ?>
		<option value="<?php echo $item->term_id ?>" <?php echo isset($_GET['specialty']) ? ($item->term_id == $_GET['specialty']) ? 'selected' : '' : ''?>><?php echo $item->name ?></option>
	<?php endforeach;
}
// FIND CATEGORY
function find_category($cat_id = 'null', $category = 'specialized-field' ){
	if ($cat_id === 'null' || $category === 'null') {
		return;
	}
	if($cat_id==0){
		echo '専門分野';
		return;
	}
	$category = get_term($cat_id, $category);
	if($cat_id == $category->term_id){
		echo $category->name;
	}
}

/// FUNCTION
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

// CUSTOM BREADCRUMBS
function custom_breadcrumbs() {
    $separator          = '>';
    $home_title         = 'single';
    
    // Get the query & post information
    global $post,$wp_query;
    
    if ( !is_front_page() && !is_home()) {
		echo '<div id="breadCrumb">';
       	echo '<div class="inner">';
        echo '<ul class="listBread">';

        echo '<li><a href="' . HOME_URL . '">TOP</a></li>';
        
		if ( is_post_type_archive('doctor')) {
            echo '<li><a href='.home_url('/doctor/').'>医師一覧</a></li>';
        }
		if ( is_page('faq') ) {
			echo '<li><span> よくある質問 </span></li>';
        } 
		if ( is_page('privacy') ) {
			echo '<li><a href=#> よくある質問 </a></li>';
        } 
		if ( is_page('contact') ) {
			echo '<li><a href=#> 医師への相談・面談予約・その他お問合せはこちら </a></li>';
        } 
		if ( is_single() ) {
			echo '<li><a href ='.home_url('/doctor/').'>医師一覧</a></li>';
			// echo '<li><a href ="#">'.get_the_title().'</a></li>';
			echo the_title( '<li><a>', '</a></li>' );;
        } 
        echo '</ul>';
		echo '</div>';
		echo '</div>';
    }
}

// //Add custom rewrite rules
function doctor_custom_rewrite_rule() {
    add_rewrite_rule(
        '^doctor/([0-9]+)/?',
        'index.php?doctor_no=$matches[1]',
        'top'
    );	
}
add_action('init', 'doctor_custom_rewrite_rule');

// Add custom query vars
function add_custom_query_vars($vars) {
    $vars[] = 'doctor_no';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// Modify the query to load the correct post
function doctor_custom_query($query) {
    if (!is_admin() && $query->is_main_query() && isset($query->query_vars['doctor_no'])) {
        $doctor_number = $query->query_vars['doctor_no'];
		var_dump($query->query_vars['doctor_no']);
        $meta_query = array(
            array(
                'key' => 'doctor_no',
                'value' => $doctor_number,
                'compare' => '=',
				'type' => 'NUMERIC'
            )
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'doctor_custom_query');

// Modify the permalink structure
function doctor_post_type_link($post_link, $post) {
    if ($post->post_type == 'doctor') {
        $doctor_number = get_field('doctor_no', $post->ID);
        if ($doctor_number) {	
            return home_url('/doctor/' . $doctor_number . '/');
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'doctor_post_type_link', 1, 2);
// // Tải template phù hợp dựa trên product_code
// function custom_product_template_redirect() {
//     $Num = get_query_var('doctor_no');
//     if ($Num) {
//         $args = array(
//             'post_type' => 'doctor',
//             'meta_key' => 'doctor_no',
//             'meta_value' => $Num,
//         );
//         $query = new WP_Query($args);

//         if ($query->have_posts()) {
//             while ($query->have_posts()) {
//                 $query->the_post();
//                 include(get_template_directory() . '/single-doctor.php'); 
//                 exit;
//             }
//         } else {
//             global $wp_query;
//             $wp_query->set_404();
//             status_header(404);
//             get_template_part(404);
//             exit;
//         }
//     }
// }
// add_action('template_redirect', 'custom_product_template_redirect');

add_action('init', function() {
    flush_rewrite_rules();
});

// FUNCTION SELECT 3 DOCTOR RECOMMEND IN CONTACT FORM 
add_filter('wpcf7_form_tag', 'recommend_doctor_select_field');
function recommend_doctor_select_field($form_tag) {
    if ($form_tag['name'] != 'your-recommend-doctor') {
        return $form_tag;
    }
    $args = array(
        'post_type' => 'doctor',
        'posts_per_page' => 3,
		'meta_query' => array(
			'key' => 'years_of_experience',
			'type' => 'NUMERIC',	
		),
		'orderby' => array(
			'meta_value_num' => 'DESC',
		)
    );
    $doctor_posts = get_posts($args);
    if ($doctor_posts) {
        $options = array();
        foreach ($doctor_posts as $post) {
            $doctor_name = get_the_title($post->ID);
            $options[] = $doctor_name;
        }
        $form_tag['raw_values'] = $options;
        $form_tag['values'] = $options;
    }
    return $form_tag;
}
// FUNCTION SELECT ALL DOCTOR IN CONTACT FORM 
add_filter('wpcf7_form_tag', 'populate_doctor_select_field');
function populate_doctor_select_field($form_tag) {
    if ($form_tag['name'] != 'your-doctor') {
        return $form_tag;
    }
    $args = array(
        'post_type' => 'doctor',
        'posts_per_page' => -1,
    );
    $doctor_posts = get_posts($args);
    if ($doctor_posts) {
        $options = array();
        foreach ($doctor_posts as $post) {
            $doctor_name = get_the_title($post->ID);
			$doctor_no = get_field('doctor_no',$post->ID);
            $options[] = $doctor_name . $doctor_no ;
        }
        $form_tag['raw_values'] = $options;
        $form_tag['values'] = $options;
    }
    return $form_tag;
}

//
function result_search(){?>
	<ul class="areaSpecialized">
		<li>
			<span class="label">専門分野:　</span>
			<br class="sp">
			<span class="value"><?php find_category($_GET['specialty']) ?></span>
		</li>
		<li>
			<span class="label">対応可能な疾患:　</span>
			<br class="sp">
			<span class="value"><?php echo $_GET['text'] ?></span>
		</li>
	</ul>
<?php }
/// ACTION
// LOADING CSS AND JS 
add_action('wp_enqueue_scripts', 'load_assets');
function load_assets()
{
	wp_enqueue_style('maincommoncss', get_theme_file_uri() . '/assets/css/common.css');
	// wp_enqueue_style('mainjquerycss', get_theme_file_uri() . '/assets/css/jquery.bxslider.css');
	wp_enqueue_script('jqueryjs', get_theme_file_uri() . "/assets/js/jquery-1.11.0.min.js", array(), '1.0', array('in_footer' => false));
	// wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/assets/js/jquery.bxslider.mi	n.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	wp_enqueue_script('mainjs', get_theme_file_uri() . "/assets/js/script.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	wp_enqueue_script('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jqueryjs'), '1.12.1', true);
	wp_enqueue_script('datepicker-ja', 'https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/i18n/datepicker.ja.min.js', array('jquery-ui'), '1.0.10', true);
	if (is_home() || is_front_page()) {
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css');
	} elseif (is_single()) {
		wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/doctor-detail.css');
		wp_enqueue_script('jquerybxsliderjs', get_theme_file_uri() . "/assets/js/jquery.bxslider.min.js", array('jqueryjs'), '1.0', array('in_footer' => false));
	} elseif (is_post_type_archive('doctor')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/doctor-list.css');
	} elseif (is_page('contact-form')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/doctor-list.css');
	} elseif (is_page('faq')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/faq.css');
	} elseif (is_page('company')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/company.css');
	} elseif (is_page('contact')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/contact.css');
		wp_enqueue_script('jqueryjs-contact', get_theme_file_uri() . "/assets/js/contact.js", array('jquery-ui'));
	} elseif (is_page('privacy')) {
		wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/privacy.css');
	} else{
		wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css');
	}
}

/// FILTER

/// SHORTCODE
// SHORTCODE DISPLAY ALL DOCTOR AND SELECTED 3 DOCTOR
function display_doctors_shortcode() {
    $args = array(
        'post_type'      => 'doctor',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        ob_start();  
		get_template_part('template-part/inputCheckBoxDoctor', null, array('query'=> $query) );
        return ob_get_clean();
    }
}
add_shortcode('display_doctors', 'display_doctors_shortcode');
// [checkbox your-doctor use_label_element]
function do_shortcode_in_cf7($form) {
    return do_shortcode($form);
}
add_filter('wpcf7_form_elements', 'do_shortcode_in_cf7');