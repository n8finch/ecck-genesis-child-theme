<?php

/**
 *
 */
require_once dirname(__FILE__) . '/shortcodes.php';

/**
 * Start the engine
 */
require_once( get_template_directory() . '/lib/init.php' );

/**
 * Localization
 */
load_child_theme_textdomain(  'dharma', apply_filters(  'child_theme_textdomain', get_stylesheet_directory(  ) . '/languages', 'dharma'  )  );

/**
 * Include Bootstrap Classes
 */
require_once( get_stylesheet_directory() . '/include/bootstrap_class_inclusion.php' );
 add_theme_support( 'genesis-connect-woocommerce' );
/**
 * Custom Post Types
 */
require_once(  get_stylesheet_directory(  ) . '/include/cpt/super-cpt.php'   );
require_once(  get_stylesheet_directory(  ) . '/include/cpt/zp_cpt.php'   );

/**
 * Include shortcodes
 */
require_once(  get_stylesheet_directory(  ) . '/include/shortcode/shortcodes_init.php' );

/**
 * Theme Settings
 */
require_once (  get_stylesheet_directory(  ) . '/include/theme_settings.php'   );

/**
 * Additional Theme Functions
 */
require_once (  get_stylesheet_directory(  ) . '/include/theme_functions.php'   );

/**
 * Slider
 */
require_once(  get_stylesheet_directory(  ) . '/include/slider/slider.php'  );

/**
 * Add HTML5 support
 */
add_theme_support( 'html5' );

/**
 * Meta tag for mobile
 */
add_theme_support( 'genesis-responsive-viewport' );

/**
 * Child Theme (Do not remove)
 */
define( 'CHILD_THEME_NAME', 'Dharma' );
define( 'CHILD_THEME_URL', 'http://demo.zigzagpress.com/dharma' );

/**
 * Add background support
 */
add_theme_support( 'custom-background' );

/**
 * Reposition Primary and Secondary Navigation
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 11 );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 11 );

/**
 * Declare structural support on Genesis
 */
add_theme_support( 'genesis-structural-wraps', array () );

/**
 * Add Post format supports
 */
add_theme_support( 'post-formats', array( 'audio','gallery','link','quote','video', 'image') );

/**
 * Unregister un-needed widget area and layout
 */
unregister_sidebar(  'header-right'  );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

/**
 * Enqueue child theme stylesheets
 */
add_action( 'wp_enqueue_scripts', 'zp_print_styles'  );
function zp_print_styles( ) {
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri( ).'/css/bootstrap.css' );
	wp_register_style( 'main', get_stylesheet_directory_uri( ).'/css/main.css' );
	wp_register_style( 'script_css', get_stylesheet_directory_uri( ).'/css/scripts.css' );
	wp_register_style( 'animate', get_stylesheet_directory_uri( ).'/css/animate.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'script_css'  );
	wp_enqueue_style( 'main'  );
	wp_enqueue_style( 'animate'  );

	// Register video CSS
	wp_enqueue_style( 'video_css', get_stylesheet_directory_uri( ).'/css/video/video-js.css' );

	// enqueue mobile css
	wp_register_style( 'mobile', get_stylesheet_directory_uri( ).'/css/mobile.css' );
	wp_enqueue_style( 'mobile'  );

	// Load color scheme css
	if( genesis_get_option( 'zp_color_scheme',  ZP_SETTINGS_FIELD ) != '' ){
		$color = genesis_get_option( 'zp_color_scheme',  ZP_SETTINGS_FIELD );
		wp_enqueue_style( 'color_scheme', get_stylesheet_directory_uri( ).'/css/color/'.$color.'.css' );
	}

	// load custom css
	wp_register_style( 'custom_css', get_stylesheet_directory_uri( ).'/custom.css' );
	wp_enqueue_style( 'custom_css'  );
}

/**
 * Enuqueue child theme scripts
 */
add_action( 'wp_enqueue_scripts', 'zp_theme_js' );
function zp_theme_js( ) {
	global $post;

	// load only the JS if needed
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-1.10.3.custom.min', get_stylesheet_directory_uri() . '/js/jquery-ui-1.10.3.custom.min.js', '', '1.10.3' , true );
	wp_enqueue_script( 'jquery.ui.touch-punch.min', get_stylesheet_directory_uri() . '/js/jquery.ui.touch-punch.min.js', '','0.2.2', true );
	wp_enqueue_script( 'bootstrap.min', get_stylesheet_directory_uri().'/js/bootstrap.min.js','', '3.0', true );
	wp_enqueue_script( 'jquery.isotope.min', get_stylesheet_directory_uri().'/js/jquery.isotope.min.js', '', '1.5.25', true  );
	wp_enqueue_script( 'jquery.magnific-popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.js', '', '0.9.7', true );
	wp_enqueue_script( 'jquery.fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js','','1.0.3', true );
	wp_enqueue_script( 'jquery.nav', get_stylesheet_directory_uri() . '/js/jquery.nav.js','','2.2.0', true );
	wp_enqueue_script( 'jquery_jplayer', get_stylesheet_directory_uri() . '/js/jquery.jplayer.min.js','','2.5.0' );
	wp_enqueue_script( 'jquery_scrollTo_js', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.js','','1.4.3', true );
	wp_enqueue_script( 'bootstrap-select', get_stylesheet_directory_uri() . '/js/bootstrap-select.js','','', true );
	wp_enqueue_script('custom_js', get_stylesheet_directory_uri() . '/js/custom.js','','1.0.1', true );

	wp_register_script( 'owl_carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js','','1.3.2', true );

	// enqueue script only when needed

	$page_header = get_post_meta( $post->ID, 'page_header_featured', true );
	$page_header_default = genesis_get_option( 'zp_default_page_header',  ZP_SETTINGS_FIELD );
	if( ( $page_header != '' && $page_header == 'video') || ( $page_header == '' && $page_header_default == 'video' )  ){
		wp_enqueue_script( 'video_js', get_stylesheet_directory_uri() . '/js/video/video.js' );
	}
}

/**
 * Add the video.js flash file location
 */
add_action( 'wp_footer', 'zp_video_js_swf_location' );
function zp_video_js_swf_location(){
	global $post;

	// get page_header_feature values and
	// check if video is used in the page
	// enable script if used
	$page_header = get_post_meta( $post->ID, 'page_header_featured', true );
	$page_header_default = genesis_get_option( 'zp_default_page_header',  ZP_SETTINGS_FIELD );

	if( ( $page_header != '' && $page_header == 'video') || ( $page_header == '' && $page_header_default == 'video' )  ){?>
		<script type="text/javascript">
        videojs("home_video", { "controls": false, "autoplay": true, "preload": "auto" });
        videojs.options.flash.swf = "<?php echo get_stylesheet_directory_uri(); ?>/js/video/video-js.swf"
        var myPlayer = videojs('home_video');
        videojs("home_video").ready(function(){
            var myPlayer = this;
            myPlayer.play();
        });
        </script>
 <?php
	}
}

/**
 * Register New widget area
 */
genesis_register_sidebar( array(
	'id'			=> 'bottom-widget',
	'name'			=> __( 'Bottom Widget', 'dharma' ),
	'description'	=> __( 'This is the bottom widget right of footer credits', 'dharma' ),
) );

/**
 * Customize footer area
 */
add_filter( 'genesis_footer_creds_text', 'zp_footer_creds_text' );
function zp_footer_creds_text(){
	$cred_text = '<div class="creds col-md-6"><p>Copyright &copy; '.date('Y').' '.get_bloginfo( 'name' ).' :: '.get_bloginfo(  'description' ).'</p></div>';
	if( genesis_get_option( 'zp_footer_text',  ZP_SETTINGS_FIELD ) ){
		echo '<div class="creds col-md-6"><p>'.genesis_get_option( 'zp_footer_text',  ZP_SETTINGS_FIELD ).'</p></div>';
	}else{
		echo $cred_text;
	}

	if(is_active_sidebar('bottom-widget')){
		echo '<div class="bottom-widget col-md-6">';
			dynamic_sidebar('bottom-widget');
		echo '</div>';
	}
}

/**
 * Enable shortcodes on text widget
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Custom Favicon option
 */
add_filter( 'genesis_favicon_url', 'zp_favicon_url' );
function zp_favicon_url(  ) {
	$favicon_link = genesis_get_option( 'zp_favicon', ZP_SETTINGS_FIELD );
	if (  $favicon_link  ) {
		$favicon = $favicon_link;
		return $favicon;
	}else
		return false;
}

/**
 * Custom logo option
 */
add_action(  'wp_head', 'zp_custom_logo'  );
function zp_custom_logo(  ) {
	if (  genesis_get_option( 'zp_logo', ZP_SETTINGS_FIELD )  ) { ?>
		<style type="text/css">
			.header-image .site-header .title-area {
				background-image: url( "<?php echo genesis_get_option( 'zp_logo', ZP_SETTINGS_FIELD ); ?>" );
				background-position: center center;
				background-repeat: no-repeat;
				height: <?php echo genesis_get_option( 'zp_logo_height', ZP_SETTINGS_FIELD );?>px;
				width: <?php echo genesis_get_option( 'zp_logo_width', ZP_SETTINGS_FIELD );?>px;
				background-size: <?php echo genesis_get_option( 'zp_logo_width', ZP_SETTINGS_FIELD );?>px;
			}
			.header-image .title-area, .header-image .site-title, .header-image .site-title a{
				height: <?php echo genesis_get_option( 'zp_logo_height', ZP_SETTINGS_FIELD );?>px;
				width: <?php echo genesis_get_option( 'zp_logo_width', ZP_SETTINGS_FIELD );?>px;
			}
       </style>
	 <?php }
}

/**
 * Add Mobile Menu
 */
add_action( 'genesis_header', 'zp_mobile_nav' );
function zp_mobile_nav(){
	$output = '';
	$output .=  '<div class="mobile_menu" role="navigation">';
	$output .= '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
	$output .= '</div>';
	echo $output;
}

/**
 * Custom Read More Text
 */
add_filter(  'excerpt_more', 'zp_read_more_link'  );
add_filter(  'get_the_content_more_link', 'zp_read_more_link'  );
add_filter( 'the_content_more_link', 'zp_read_more_link' );
function zp_read_more_link(  ) {
    return '&hellip; <a class="more-link" href="' . get_permalink(  ) . '"> '.__( 'Read More ','dharma' ).'<i class="fa fa-angle-double-right"></i></a>';
}

/**
 * Define child theme image sizes
 */
add_image_size( 'portfolio', 381, 381, true );
add_image_size( 'blog_gallery', 710, 400, true );
add_image_size( 'blog_masonry', 350, 232, true );
add_image_size( 'blog_masonry2', 505, 336, true );

/**
 * Post Info
 */
add_filter( 'genesis_post_info', 'zp_custom_post_info' );
function zp_custom_post_info(){
	return '[post_date] [post_author_posts_link] [post_comments] [post_edit]';
}

/**
 * Post Meta
 */
add_filter( 'genesis_post_meta','zp_custom_post_meta' );
function zp_custom_post_meta(){
	return '[post_categories before="" after="" sep=","] [post_tags before="" after="" sep=","]';
}

/**
 * Add post format icon before the title link
 */
add_filter( 'genesis_post_title_output', 'zp_post_format_icon_before_title' );
function zp_post_format_icon_before_title(  ){
	global $post;

	// check post format
	$format = get_post_format();
	$post_format_icon = '';
	$title_desc = '';
	if( $format != 'link' && $format != 'quote' ){
		if( $format == 'gallery' ){
			$post_format_icon = '<i class="fa fa-camera"></i>';
		}
		if( $format == 'video' ){
			$post_format_icon = '<i class="fa fa-video-camera"></i>';
		}
		if( $format == 'audio' ){
			$post_format_icon = '<i class="fa fa-music"></i>';
		}
		if( $format == 'image' ){
			$post_format_icon = '<i class="fa fa-pencil"></i>';
		}
		if( $format == '' ){
			$post_format_icon = '<i class="fa fa-pencil"></i>';
		}
	}

	// get page subtitle
	$subtitle = '<p class="lead">'.get_post_meta( $post->ID, 'subtitle', true).'</p>';

	//* Code from Genesis
	if ( 0 === mb_strlen( apply_filters( 'genesis_post_title_text', get_the_title() ) ) )
		return;

	if(  is_singular( 'post' ) ){
		$title = sprintf( '%s%s', $post_format_icon, apply_filters( 'genesis_post_title_text', get_the_title())  );
	}else if( is_singular( 'page' )){
		$title = apply_filters( 'genesis_post_title_text', get_the_title());
		$title_desc = apply_filters( 'zp_page_subtitle', $subtitle );
	}else if ( ! is_singular() && apply_filters( 'genesis_link_post_title', true ) ){
		$title = sprintf( '%s<a href="%s" title="%s" rel="bookmark">%s</a>', $post_format_icon, get_permalink(), the_title_attribute( 'echo=0' ), apply_filters( 'genesis_post_title_text', get_the_title())  );
	}else{
		$title = apply_filters( 'genesis_post_title_text', get_the_title());
	}

	//* Wrap in H1 on singular pages
	$wrap = is_singular() ? 'h1' : 'h2';

	//* Also, if HTML5 with semantic headings, wrap in H1
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	//* Build the output
	$output = genesis_markup( array(
		'html5'   => "<{$wrap} %s>",
		'xhtml'   => sprintf( '<%s class="entry-title">%s%s</%s>', $wrap, $title, $title_desc, $wrap ),
		'context' => 'entry-title',
		'echo'    => false,
	) );

	$output .= genesis_html5() ? "{$title}</{$wrap}>{$title_desc}" : '';
	return $output;
}

/**
 * Add Contact Form 7 shortcode support
 */
add_filter( 'wpcf7_form_elements', 'zp_wpcf7_form_elements' );
function zp_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );
	return $form;
}

/**
 * Change breadcrumb separator
 */
add_filter( 'genesis_breadcrumb_args', 'zp_breadcrumb_separator' );
function zp_breadcrumb_separator( $args ){
	$args['sep'] = ' <i class="fa fa-angle-right"></i> ';
	if( is_page_template( 'portfolio_template.php' ) ){
		$args['prefix'] = sprintf( '<div class="container"><div %s>', genesis_attr( 'breadcrumb' ) );
		$args['suffix'] = '</div></div>';
	}else{
		$args['prefix'] = sprintf( '<div %s>', genesis_attr( 'breadcrumb' ) );
		$args['suffix'] = '</div>';
	}
	return $args;
}

/**
 * Add map section in the footer area
 */
add_action( 'genesis_before_footer', 'zp_footer_map' );
function zp_footer_map(){
	$iframe = genesis_get_option( 'zp_footer_map_iframe', ZP_SETTINGS_FIELD );
	$padding = genesis_get_option( 'zp_footer_map_padding', ZP_SETTINGS_FIELD );
	$is_map_enable = genesis_get_option( 'zp_footer_map', ZP_SETTINGS_FIELD );

	if( $is_map_enable ){
		echo '<div class="map_footer">';
		echo '<div class="map_section" style="padding-bottom: '.$padding.';"><div class="container" >'.$iframe.'</div></div>';
		echo '</div>';
	}
}

/**
 * Add body class
 */
add_filter( 'body_class', 'zp_body_class' );
function zp_body_class( $classes ){
	if( genesis_get_option( 'zp_footer_map', ZP_SETTINGS_FIELD )){
		$classes[] = 'enable_footer_map';
	}
	if( is_page_template( 'homepage_template.php' ) ){
		$classes[] = 'home_page_template';
	}
	return $classes;
}

/**
 * Add IE Support
 */
function zp_add_IE_support() {
	global $is_IE;
	if ($is_IE)
   		echo '<!--[if lt IE 9]>';
    	echo '<script src="'.get_stylesheet_directory_uri( ).'/js/respond.js"></script>';
    	echo '<![endif]-->';
}
add_action('wp_head', 'zp_add_IE_support');


/**
 * Include Custom Theme Function
 * Write all your custom functions in this file
 */
require_once (  get_stylesheet_directory(  ) . '/include/custom_functions.php'   );

function woo_add_cart_fee() {


  	global $woocommerce;
   $value = get_field( "start_date_75", 1301);
    if( $value ) {
        echo $value;
    } else {
        echo 'empty';
    }

  	echo get_the_time();

  $discount = floatval(10);
	if(!empty($discount) || $discount != 0){
    $discount *= -1;
    $woocommerce->cart->add_fee('Pro-rate', $discount, true, '' );
}

}
//add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );





if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_subscription-prorate-75',
		'title' => 'Subscription Prorate 75%',
		'fields' => array (
			array (
				'key' => 'field_562507e58cc93',
				'label' => 'Start Date',
				'name' => 'start_date_75',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_562508758cc94',
				'label' => 'End Date',
				'name' => 'end_date_75',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

remove_theme_support( 'custom-header' );