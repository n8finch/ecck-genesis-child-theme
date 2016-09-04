<?php 
/**
 * ZP Custom Post Types Initialization
 */
 
function zp_custom_post_type() {
	if ( ! class_exists( 'Super_CPT' ) )
		return;
/**
 * Add Slide Custom Post Type
 */
$slide_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	'menu_icon' => 'dashicons-slides'
);

/**
 * register slide post type
 */
$slide = new Super_Custom_Post_Type( 'slide', 'Slide', 'Slides',  $slide_custom_default );
$slideshow = new Super_Custom_Taxonomy( 'slideshow' ,'Slideshow', 'Slideshows', 'cat' );
connect_types_and_taxes( $slide, array( $slideshow ) );

$slide->add_meta_box( array(
	'id' => 'slide-order',
	'context' => 'side',
	'fields' => array(
		'slide_number_value' => array( 'type' => 'text', 'data-zp_desc' => __( 'Define slide order. Ex. 1,2,3,4,...','dharma') ),
		)
));

/**
 * manage slide columns
 */

function zp_add_slide_columns($columns) {
	return array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Title', 'dharma'),
		'slideshow' => __('Slideshow', 'dharma'),
		'slide_order' =>__( 'Slide Order', 'dharma'),
		'date' => __('Date', 'dharma'),
	);
}

add_filter('manage_slide_posts_columns' , 'zp_add_slide_columns');
function zp_custom_slide_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'slideshow' :
			$terms = get_the_term_list( $post_id , 'slideshow' , '' , ',' , '' );
			if ( is_string( $terms ) )
				echo $terms;
			else
				_e( 'Unable to get slideshows(s)', 'dharma' );
				break;
		case 'slide_order' :
			echo get_post_meta( $post_id , 'slide_number_value' , true );
			break;
		}
}
add_action( 'manage_posts_custom_column' , 'zp_custom_slide_columns', 10, 2 );

/**
 * Add Portfolio Custom Post Type
 */
/*
$portfolio_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions','genesis-layouts', 'genesis-seo'),
	'menu_icon' =>  'dashicons-portfolio'
);
$portfolio = new Super_Custom_Post_Type( 'portfolio', 'Portfolio', 'Portfolio',  $portfolio_custom_default );
$portfolio_category = new Super_Custom_Taxonomy( 'portfolio_category' ,'Portfolio Category', 'Portfolio Categories', 'cat' );
connect_types_and_taxes( $portfolio, array( $portfolio_category ) );

$portfolio->add_meta_box( array(
	'id' => 'portfolio-settings',
	'context' => 'normal',
	'priotity' => 'high',
	'fields' => array(
		'video_link' => array( 'label' => __('Video Link','dharma'), 'type' => 'text', 'data-zp_desc' => __('Add video link here. Video link format: Youtube: "http://www.youtube.com/watch?v=7HKoqNJtMTQ", Vimeo: "http://vimeo.com/123123"','dharma') ),
		'button_label' => array( 'label' => __('Button Label','dharma'), 'type' => 'text', 'data-zp_desc' => __('Add button label','dharma') ),
		'button_link' => array( 'label' => __('Button Link','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Add button link','dharma') ),
		'date_label' => array( 'label' => __('Date Label','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Date Label','dharma') ),
		'date_value' => array( 'label' => __('Date Value','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Date Value.','dharma') ),
		'client_label' => array( 'label' => __('Client Label','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Client Label.','dharma') ),
		'client_value' => array( 'label' => __('Client Value','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Client Value.','dharma') ),
		'category_label' => array( 'label' => __('Category Label','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Category Label.','dharma') )
	)
));

$portfolio->add_meta_box( array(
	'id' => 'portfolio-images',
	'context' => 'normal',
	'priotity' => 'high',
	'fields' => array(
		'portfolio_images' => array( 'label' => __('Upload/Attach an image to this portfolio item. Images attached in here will be shown in lightbox and single portfolio page.','dharma'), 'type' => 'multiple_media', 'data-zp_desc' => __('Add images to this portfolio','dharma') )
	)
));

function zp_add_portfolio_columns($columns) {
	return array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Title', 'dharma'),
		'portfolio_category' => __('Portfolio Category', 'dharma'),
		'portfolio_size' => __('Size', 'dharma'),
		'author' =>__( 'Author', 'dharma'),
		'date' => __('Date', 'dharma'),
	);
}

add_filter('manage_portfolio_posts_columns' , 'zp_add_portfolio_columns');

function zp_custom_portfolio_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'portfolio_category' :
			$terms = get_the_term_list( $post_id , 'portfolio_category' , '' , ',' , '' );
			if ( is_string( $terms ) )
				echo $terms;
			else
				_e( 'Unable to get portfolio category(s)', 'dharma' );
				break;
		case 'portfolio_size':
			echo str_replace( ' ', '', get_post_meta( $post_id, 'portfolio_image_sizes', true));
	}
}
add_action( 'manage_posts_custom_column' , 'zp_custom_portfolio_columns', 10, 2 );
*/

/**
 * Add Sections Custom Post Type
 */

$sections_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions'),
	'menu_icon' =>  'dashicons-exerpt-view'
);

/**
 * Register sections post type
 */

$sections = new Super_Custom_Post_Type( 'section', 'Section', 'Sections',  $sections_custom_default );
$sections->add_meta_box( array(
	'id' => 'section-option',
	'context' => 'normal',
	'priotity' => 'high',
	'fields' => array(
		'include_header_label' => array( 'label' => __('Include Title and Intro?','dharma'), 'type' => 'select', 'options' => array('yes' => 'Yes','no' => 'No'), 'data-zp_desc' => __('Select Yes to include title and intro in the section','dharma') ),
		'navigation_anchor' => array( 'label' => __('Navigation Anchor/Section ID','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'e.g. portfolio, blog. Then in custom menu add #portfolio, #blog. <strong>This should NOT be empty.</strong>','dharma') ),
		'section_intro' => array( 'type' => 'textarea', 'data-zp_desc' => __( 'Enter some section intro','dharma') )
	)
));

/**
 * Add Testimonial Custom Post Type
 */

/*
$testimonial_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
	'menu_icon' =>  'dashicons-format-chat'
);

$testimonials = new Super_Custom_Post_Type( 'testimonial', 'Testimonial', 'Testimonials',  $testimonial_custom_default );
$testimonials->add_meta_box( array(
	'id' => 'testimonial_option',
	'context' => 'side',
	'fields' => array(
	'position_title' => array( 'type' => 'text' ),
	'link' => array( 'type' => 'text' ),
	)
));
*/

/**
 * Add Team Custom Post Type
 */
/*
$team_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	'menu_icon' =>  'dashicons-groups'
);
$team = new Super_Custom_Post_Type( 'team', 'Team', 'Teams',  $team_custom_default );

$team->add_meta_box( array(
	'id' => 'team_settings',
	'context' => 'normal',
	'fields' => array(
		'team_position' => array( 'type' => 'text', 'data-zp_desc' => __( 'Position','dharma') )
	)
));

$team->add_meta_box( array(
	'id' => 'social_links',
	'context' => 'normal',
	'fields' => array(
		'dribbble' => array( 'type' => 'text', 'data-zp_desc' => __( 'Dribbble link','dharma') ),
		'flickr' => array( 'type' => 'text', 'data-zp_desc' => __( 'Flickr link','dharma') ),
		'github' => array( 'type' => 'text', 'data-zp_desc' => __( 'Github link','dharma') ),
		'twitter' => array( 'type' => 'text', 'data-zp_desc' => __( 'Twitter link','dharma') ),
		'facebook' => array( 'type' => 'text', 'data-zp_desc' => __( 'Facebook link','dharma') ),
		'google+' => array( 'type' => 'text', 'data-zp_desc' => __( 'Google+ link','dharma') ),
		'skype' => array( 'type' => 'text', 'data-zp_desc' => __( 'Skype link','dharma') ),
		'tumblr' => array( 'type' => 'text', 'data-zp_desc' => __( 'Tumblr link','dharma') ),
		'vimeo' => array( 'type' => 'text', 'data-zp_desc' => __( 'Vimeo link','dharma') ),
		'youtube' => array( 'type' => 'text', 'data-zp_desc' => __( 'Youtube link','dharma') ),
		'linkedin' => array( 'type' => 'text', 'data-zp_desc' => __( 'Linkedin link','dharma') ),
		'pinterest' => array( 'type' => 'text', 'data-zp_desc' => __( 'Pinterest link','dharma') )
	)
));
*/

/**
 * Add Service Custom Post Type
 */
/*
$services_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	'menu_icon' =>  'dashicons-tag'
);
$services = new Super_Custom_Post_Type( 'services', 'Service', 'Services',  $services_custom_default );

$services->add_meta_box( array(
	'id' => 'services_settings',
	'context' => 'normal',
	'fields' => array(
		'icon_type' => array( 'type' => 'select', 'options' => array('font-awesome' => 'Font-Awesome','glyphicons' => 'Glyphicons', 'image' => 'Image' ), 'data-zp_desc' => __( 'Select icons to use. Font-Awesome, Glyphicons or an Image.','dharma') ),
		'icon_class' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add icon classes. For font-awesome classes, please refer to this link <a href="http://fontawesome.io/icons/">page</a>. For Glyphicons, refer to this <a href="http://getbootstrap.com/components/">page</a> ','dharma') )
	)
));

*/
/**
 * Pricing Table
 */
/*
$pricing_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	'menu_icon' =>  'dashicons-calendar'
);
$pricing = new Super_Custom_Post_Type( 'pricing', 'Pricing', 'Pricing',  $pricing_custom_default );

$pricing->add_meta_box( array(
	'id' => 'pricing_settings',
	'context' => 'normal',
	'fields' => array(
		'price' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add price. Include currency symbol ( $, €, £)','dharma') ),
		'payment_terms' => array( 'type' => 'text', 'data-zp_desc' => __( 'Payment Terms. (per month, per year, annually,...etc.)','dharma') ),
		'best_price' => array( 'type' => 'select', 'options' => array('bestprice' => 'Best Price','normal' => 'Normal'), 'data-zp_desc' => __( 'Select if this is the best price to highlight','dharma') ),
		'button_label' => array( 'type' => 'text', 'data-zp_desc' => __( 'Button label (Sign Up, Join Now, Buy,... )','dharma') ),
		'button_link' => array( 'type' => 'text', 'data-zp_desc' => __( 'Button link','dharma') )
	)
));

*/
/**
 * Client
 */
/*
$client_custom_default = array(
	'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	'menu_icon' =>  'dashicons-admin-users'
);
$client = new Super_Custom_Post_Type( 'client', 'Client', 'Clients',  $client_custom_default );
$client->add_meta_box( array(
	'id' => 'client-settings',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		'zp_client_link' => array( 'label' => __( 'Client Link','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Add client link','dharma') ),
		'zp_client_link_target' => array( 'label' => __( 'Link Target','dharma'), 'type' => 'select', 'options'=> array( '_blank' => '_blank', '_self' => '_self', '_parent'=>'_parent', '_top'=>'_top' ), 'data-zp_desc' => __( 'Add client link','dharma') )
	)
));
*/

/**
 * Add Post Custom Meta
 */

$post_meta = new Super_Custom_Post_Meta( 'post' );
$post_meta->add_meta_box( array(
	'id' => 'audio-settings',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'zp_audio_mp3_url' => array( 'label' => __( 'Audio .mp3 URL','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'The URL to the .mp3 audio file','dharma') ),
		'zp_audio_ogg_url' => array( 'label' => __( 'Audio .ogg, .oga URL','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'The URL to the .oga, .ogg audio file','dharma') ),
		'zp_embed_audio' => array( 'label' => __( 'Embed Audio','dharma'), 'type' => 'textarea', 'data-zp_desc' => __( 'Embed audio code here.','dharma') )
	)
));

$post_meta->add_meta_box( array(
	'id' => 'link-settings',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'zp_link_format' => array( 'label' => __( 'Enter link.  E.g., http://www.yourlink.com','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'Input your link. e.g., http://www.yourlink.com','dharma') )
	)
));

$post_meta->add_meta_box( array(
	'id' => 'video-settings',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'zp_video_m4v_url' => array( 'label' => __( 'Video File (.m4v)','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'The URL to the .m4v video file','dharma') ),
		'zp_video_ogv_url' => array( 'label' => __( 'Video File (.ogv)','dharma'), 'type' => 'text', 'data-zp_desc' => __( 'The URL to the .ogv video file','dharma') ),
		'zp_video_format_embed' => array( 'label' => __( 'Embed Video','dharma'), 'type' => 'textarea', 'data-zp_desc' => __( 'If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 600px with any height. This field will override the above.','dharma') )
		)
));

/**
 * Add Page Custom Meta
 */

$page_meta = new Super_Custom_Post_Meta( 'page' );
$page_meta->add_meta_box( array(
	'id' => 'page_header_option',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'page_header_featured' => array( 'type' => 'select' , 'options'=> array( 'slider' => 'Slider', 'video' => 'Video' ), 'data-zp_desc' => __( 'Select the type of feature to be in the header of the page.','dharma') ),
		'page_slideshow' => array( 'type' => 'text' , 'data-zp_desc' => __( 'In this option, add the slideshow slug.','dharma') ),
		'page_slideshow_effect' => array( 'type' => 'select', 'options'=> array( 'slide' => 'Slide', 'fade' => 'Fade' ) , 'data-zp_desc' => __( 'Set slider effect', 'dharma') ),
		'page_slideshow_caption' => array( 'type' => 'select', 'options'=> array( 'true' => 'True', 'false' => 'False' ) , 'data-zp_desc' => __( 'Enable caption?', 'dharma') ),
		'MP4_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add MP4 video URL','dharma') ),
		'WEBM_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add WEBM video URL','dharma') ),
		'OGV_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add OGV video URL','dharma') )
	)
));

/*$portfolio->add_meta_box( array(
	'id' => 'page_header_option',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'page_header_featured' => array( 'type' => 'select' , 'options'=> array( 'slider' => 'Slider', 'video' => 'Video' ), 'data-zp_desc' => __( 'Select the type of feature to be in the header of the page.','dharma') ),
		'page_slideshow' => array( 'type' => 'text' , 'data-zp_desc' => __( 'In this option, add the slideshow slug.','dharma') ),
		'page_slideshow_effect' => array( 'type' => 'select', 'options'=> array( 'slide' => 'Slide', 'fade' => 'Fade' ) , 'data-zp_desc' => __( 'Set slider effect', 'dharma') ),
		'page_slideshow_caption' => array( 'type' => 'select', 'options'=> array( 'true' => 'True', 'false' => 'False' ) , 'data-zp_desc' => __( 'Enable caption?', 'dharma') ),
		'MP4_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add MP4 video URL','dharma') ),
		'WEBM_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add WEBM video URL','dharma') ),
		'OGV_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add OGV video URL','dharma') )
	)
));*/
$post_meta = new Super_Custom_Post_Meta( 'post' );
$post_meta->add_meta_box( array(
	'id' => 'page_header_option',
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		'page_header_featured' => array( 'type' => 'select' , 'options'=> array( 'slider' => 'Slider', 'video' => 'Video' ), 'data-zp_desc' => __( 'Select the type of feature to be in the header of the page.','dharma') ),
		'page_slideshow' => array( 'type' => 'text' , 'data-zp_desc' => __( 'In this option, add the slideshow slug.','dharma') ),
		'page_slideshow_effect' => array( 'type' => 'select', 'options'=> array( 'slide' => 'Slide', 'fade' => 'Fade' ) , 'data-zp_desc' => __( 'Set slider effect', 'dharma') ),
		'page_slideshow_caption' => array( 'type' => 'select', 'options'=> array( 'true' => 'True', 'false' => 'False' ) , 'data-zp_desc' => __( 'Enable caption?', 'dharma') ),
		'MP4_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add MP4 video URL','dharma') ),
		'WEBM_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add WEBM video URL','dharma') ),
		'OGV_video' => array( 'type' => 'text', 'data-zp_desc' => __( 'Add OGV video URL','dharma') )
	)
));

}
add_action( 'after_setup_theme', 'zp_custom_post_type' );