<?php
/**
 * Integration of Bootstrap classes to Genesis Framework
 */

/**
*  Add bootstrap class to .site-header
*/

add_filter( 'genesis_attr_site-header', 'zzp_site_header_id', 10, 2 );
function zzp_site_header_id( $attributes, $context ){
	$attributes['id'] = 'header' ;
	return  $attributes;
}

/**
* Add bootstrap class to .nav-primary
*/
add_filter( 'genesis_attr_site-header', 'zzp_site_header_class', 10, 2 );
function zzp_site_header_class( $attributes, $context ){
	$attributes['class'] = 'site-header navbar navbar-fixed-top' ;
	return  $attributes;
}

/**
* Add bootstrap class to .nav-primary
*/
add_filter( 'genesis_attr_nav-primary', 'zzp_nav_primary_class', 10 , 2  );
function zzp_nav_primary_class( $attributes, $context ){
	$attributes['class'] = 'nav-primary navbar-collapse pull-right in';
	return $attributes;
}

/**
* Add bootstrap class to .secondary-primary
*/
add_filter( 'genesis_attr_nav-secondary', 'zzp_nav_secondary_class', 10 , 2  );
function zzp_nav_secondary_class( $attributes, $context ){
	$attributes['class'] = 'nav-secondary navbar-collapse pull-right in';
	return $attributes;
}

/**
* Add bootstrap class to .title-area
*/
add_filter( 'genesis_attr_title-area', 'zzp_title_area_class', 10 , 2  );
function zzp_title_area_class( $attributes, $context ){
	$attributes['class'] = 'title-area navbar-brand';
	return $attributes;
}

/**
* Add bootstrap class to .header-widget-area
*/

add_filter( 'genesis_attr_header-widget-area', 'zzp_header_widget_area_class', 10 , 2  );
function zzp_header_widget_area_class( $attributes, $context ){
	$attributes['class'] = 'header-widget-area col-md-8 col-sm-8';
	return $attributes;
}

/**
* Add bootstrap class to Main Content
*/
add_filter( 'genesis_attr_content', 'zzp_genesis_main_content_class', 10, 2 );
function zzp_genesis_main_content_class( $attributes, $context ){
		// get site layout	
		$layout = genesis_site_layout();	
	
		if( 'content-sidebar' == $layout ){
			$attributes['class'] = 'content col-sm-12 col-md-8 col-xs-12 ';
		}
		
		if( 'sidebar-content' == $layout ){
			$attributes['class'] = 'content col-sm-12 col-md-8 col-xs-12';
		}
		
		if( 'full-width-content' == $layout ){
			$attributes['class'] = 'content col-md-12 col-sm-12 col-xs-12';
		}
	return $attributes;
}

/**
* Add bootstrap class to Primary Sidebar
*/
add_filter( 'genesis_attr_sidebar-primary', 'zzp_genesis_primary_sidebar_class', 10, 2 );
function zzp_genesis_primary_sidebar_class( $attributes, $context ){
	//get site layout
	$layout = genesis_site_layout();
	if( 'content-sidebar' == $layout ){
		$attributes['class'] = 'sidebar sidebar-primary widget-area col-sm-12  col-md-4 col-xs-12 ';
	}
	
	if( 'sidebar-content' == $layout ){
		$attributes['class'] = 'sidebar sidebar-primary widget-area col-sm-12 col-md-4 col-xs-12';
	}
	return $attributes;
}

/**
* Create additional <div> 'container' and 'row' on site header
*/

add_action( 'genesis_header', 'zzp_header_markup_open', 6 );
function zzp_header_markup_open(){
	echo '<div class="container">';
}

add_action( 'genesis_header', 'zzp_header_markup_close', 14 );
function zzp_header_markup_close(){
	echo '</div>';
}
/**
* Create additional <div> 'container' and 'row' on site inner
*/

add_action( 'genesis_before_content', 'zzp_site_inner_markup_open' );
function zzp_site_inner_markup_open(){
	echo '<div class="container box">';
}

add_action( 'genesis_after_content', 'zzp_site_inner_markup_close' );
function zzp_site_inner_markup_close(){
	echo '</div>';
}

/**
* Create additional <div> 'container' and 'row' on site footer
*/

add_action( 'genesis_footer', 'zzp_footer_markup_open', 6 );
function zzp_footer_markup_open(){
	echo '<div class="container"><div class="row"><div class="footer_wrap">';
}

add_action( 'genesis_footer', 'zzp_footer_markup_close', 14 );
function zzp_footer_markup_close(){
	echo '</div></div></div>';
}

/**
* Add Classes to Genesis Primary nav
*/

add_filter( 'wp_nav_menu_args' , 'zp_custom_primary_nav' );
function zp_custom_primary_nav( $args ) {
	if ( $args['theme_location'] == 'primary' ) {
		$args['walker'] = new ZP_Custom_Genesis_Nav_Menu;
		$args['desc_depth'] = 0;
		$args['thumbnail'] = false;
	}
	return $args;
}

/**
* Menu Walker Class
*/

class ZP_Custom_Genesis_Nav_Menu extends Walker_Nav_Menu {
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$attributes='';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' dropdown"';
		$output .= '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
		//check if the link is a section or an http link
		$check_link = strpos( $item->url, 'http' );
		if( $check_link === false ){
			$dropdown_class = 'class="dropdown-toggle" data-toggle="dropdown"';
			$external_class = '';
		}else{
			$dropdown_class = '';
			$external_class = 'class="external"';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
	$item_output = $args->before;
		
	// menu link output
	$item_output .= '<a'. $attributes .'  '.$dropdown_class.$external_class.' >';
	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
	// close menu link anchor
	$item_output .= '</a>';
	$item_output .= $args->after;

	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

/**
* Filter Primary Nav
*/
add_filter( 'genesis_do_nav', 'zp_filter_genesis_nav', 10, 3 );
function zp_filter_genesis_nav( $nav_output , $nav, $args){
	if ( ! genesis_nav_menu_supported( 'primary' ) )
		return;

	if( is_front_page() ){
	//* If menu is assigned to theme location, output
	if ( has_nav_menu( 'primary' ) ) {
		$class = 'menu genesis-nav-menu menu-primary nav navbar-nav pull-right';
		if ( genesis_superfish_enabled() )
			$class .= ' js-superfish';
		$args = array(
			'theme_location' => 'primary',
			'container'      => '',
			'menu_class'     => $class,
			'echo'           => 0,
		);

		$nav = wp_nav_menu( $args );

		//* Do nothing if there is nothing to show
		if ( ! $nav )
			return;

		$nav_markup_open = genesis_markup( array(
			'html5'   => '<nav %s>',
			'xhtml'   => '<div id="nav">',
			'context' => 'nav-primary',
			'echo'    => false,
		) );
		$nav_markup_open .= genesis_structural_wrap( 'menu-primary', 'open', 0 );

		$nav_markup_close  = genesis_structural_wrap( 'menu-primary', 'close', 0 );
		$nav_markup_close .= genesis_html5() ? '</nav>' : '</div>';

		$nav_output = $nav_markup_open . $nav . $nav_markup_close;	
	 }
	 return $nav_output;
	}
}


/**
* Filter Secondary Nav
*/
add_filter( 'genesis_do_subnav', 'zp_filter_genesis_subnav', 10, 3 );
function zp_filter_genesis_subnav( $nav_output , $nav, $args){	
	if ( ! genesis_nav_menu_supported( 'secondary' ) )
	return;

	if(  !is_front_page() ){
	//* If menu is assigned to theme location, output
	if ( has_nav_menu( 'secondary' ) ) {

	$class = 'menu genesis-nav-menu menu-secondary nav navbar-nav pull-right';
	if ( genesis_superfish_enabled() )
		$class .= ' js-superfish';

	$args = array(
		'theme_location' => 'secondary',
		'container'      => '',
		'menu_class'     => $class,
		'echo'           => 0,
	);

	$subnav = wp_nav_menu( $args );

	//* Do nothing if there is nothing to show
	if ( ! $subnav )
		return;

	$subnav_markup_open = genesis_markup( array(
		'html5'   => '<nav %s>',
		'xhtml'   => '<div id="subnav">',
		'context' => 'nav-secondary',
		'echo'    => false,
	) );
	$subnav_markup_open .= genesis_structural_wrap( 'menu-secondary', 'open', 0 );

	$subnav_markup_close  = genesis_structural_wrap( 'menu-secondary', 'close', 0 );
	$subnav_markup_close .= genesis_html5() ? '</nav>' : '</div>';

	$subnav_output = $subnav_markup_open . $subnav . $subnav_markup_close;	
		
	 }
	 return $subnav_output;
	}
}

/**
* Filter the default WP comment form fields to add bootstrap CSS. 
*/
add_filter( 'comment_form_default_fields', 'zp_filter_comment_fields' );
function zp_filter_comment_fields( $fields ){
	$commenter = wp_get_current_commenter();
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5';
	
	$fields   =  array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'dharma' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .'<input id="author" class="form-control input-hg" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'dharma' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .	'<input id="email" class="form-control input-hg" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>', 'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'dharma' ) . '</label> ' .'<input id="url" class="form-control input-hg" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'

	);					
	return $fields;
}

/**
* Filter the default WP comment form comment field to add bootstrap CSS. 
*/
add_filter( 'comment_form_field_comment', 'zp_comment_form_field_comment' );
function zp_comment_form_field_comment( $comment_field ) {
	$comment_field = str_replace( 'id="comment"', 'id="comment" class="form-control input-hg"', $comment_field);
	return $comment_field;
}

/**
* Add Bootstrap class to search form
*/
remove_filter( 'get_search_form', 'genesis_search_form' );
add_filter( 'get_search_form', 'zp_custom_search_form' );
function zp_custom_search_form() {
	$search_text = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : apply_filters( 'genesis_search_text', __( 'Search this website', 'dharma' ) . '&#x02026;' );
	$button_text = apply_filters( 'genesis_search_button_text', esc_attr__( 'Search', 'dharma' ) );
	$onfocus = "if ('" . esc_js( $search_text ) . "' === this.value) {this.value = '';}";
	$onblur  = "if ('' === this.value) {this.value = '" . esc_js( $search_text ) . "';}";

	//* Empty label, by default. Filterable.
	$label = apply_filters( 'genesis_search_form_label', '' );
	if ( genesis_html5() )
		$form = sprintf( '<form method="get" class="search-form control-group large" action="%s" role="search">%s<div class="input-group"><input type="search" class="search-input form-control input-lg" name="s" placeholder="%s" /><span class="search-span input-group-btn"><button class="search-btn btn btn-primary btn-lg" type="submit" name="submit"><i class="fa fa-search"></i></button></span></div></form>', home_url( '/' ), esc_html( $label ), esc_attr( $search_text ), esc_attr( $button_text ) );
	else
		$form = sprintf( '<form method="get" class="searchform search-form" action="%s" role="search" >%s<input type="text" value="%s" name="s" class="s search-input" onfocus="%s" onblur="%s" /><input type="submit" class="searchsubmit search-submit" value="%s" /></form>', home_url( '/' ), esc_html( $label ), esc_attr( $search_text ), esc_attr( $onfocus ), esc_attr( $onblur ), esc_attr( $button_text ) );
	return $form;
}

/**
* Add bootstrap class to .entry-author
*/

add_filter( 'genesis_attr_entry-author', 'zzp_add_entry_author_class', 10 , 2  );
function zzp_add_entry_author_class( $attributes, $context ){
	$attributes['class'] = 'entry-author label label-default';
	return $attributes;
}

/**
* Add bootstrap class to .entry-time
*/

add_filter( 'genesis_attr_entry-time', 'zzp_add_entry_time_class', 10 , 2  );
function zzp_add_entry_time_class( $attributes, $context ){
	$attributes['class'] = 'entry-time label label-default';
	return $attributes;
}

/**
* Add bootstrap class to .entry-categories
*/

add_filter( 'genesis_attr_entry-categories', 'zzp_add_entry_categories_class', 10 , 2  );
function zzp_add_entry_categories_class( $attributes, $context ){
	$attributes['class'] = 'entry-categories label label-default';
	return $attributes;
}

/**
* Add bootstrap class to .entry-categories
*/

add_filter( 'genesis_attr_entry-tags', 'zzp_add_entry_tags_class', 10 , 2  );
function zzp_add_entry_tags_class( $attributes, $context ){
	$attributes['class'] = 'entry-tags label label-default';
	return $attributes;
}

/**
* Add bootstrap class to .entry-comment-link
*/

add_filter( 'genesis_post_comments_shortcode', 'zzp_add_entry_comment_link_class', 10 , 2  );
function zzp_add_entry_comment_link_class( $output, $atts ){
	$defaults = array(
		'after'       => '',
		'before'      => '',
		'hide_if_off' => 'enabled',
		'more'        => __( '% Comments', 'dharma' ),
		'one'         => __( '1 Comment', 'dharma' ),
		'zero'        => __( 'Leave a Comment', 'dharma' ),
	);
	$atts = shortcode_atts( $defaults, $atts, 'post_comments' );

	if ( ( ! genesis_get_option( 'comments_posts' ) || ! comments_open() ) && 'enabled' === $atts['hide_if_off'] )
		return;

	// Darn you, WordPress!
	ob_start();
	comments_number( $atts['zero'], $atts['one'], $atts['more'] );
	$comments = ob_get_clean();

	$comments = sprintf( '<a href="%s">%s</a>', get_comments_link(), $comments );

	$output = genesis_markup( array(
		'html5' => '<span class="entry-comments-link label label-default">' . $atts['before'] . $comments . $atts['after'] . '</span>',
		'xhtml' => '<span class="post-comments">' . $atts['before'] . $comments . $atts['after'] . '</span>',
		'echo'  => false,
	) );
	
	return $output;
}