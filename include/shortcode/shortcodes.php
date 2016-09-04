<?php
/**-------------------------------------------------------------------
 * Theme Shortcodes
 --------------------------------------------------------------------*/

/**
 *	Column Shortcodes
 */

if ( !function_exists( 'zp_column_wrapper' ) ){
	function zp_column_wrapper( $atts, $content = null ){
		return '<div class="column_wrapper row">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_wrapper', 'zp_column_wrapper' );
}

if (!function_exists('zp_one_third')) {
	function zp_one_third( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';
		}elseif ( $align == 'right' ){
			$align = 'text-right';	
		}else{
			$align = 'text-left';	
		}
	   return '<div class="col-md-4 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode('one_third', 'zp_one_third');
}

if ( !function_exists( 'zp_one_half' ) ){
	function zp_one_half( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));

		if( $align == 'center' ){
			$align = 'text-center';
		}elseif ( $align == 'right' ){
			$align = 'text-right';	
		}else{
			$align = 'text-left';	
		}
		
		return '<div class="col-md-6 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'one_half', 'zp_one_half' );
}

if ( !function_exists( 'zp_one_fourth' ) ){
	function zp_one_fourth( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';
		}elseif ( $align == 'right' ){
			$align = 'text-right';	
		}else{
			$align = 'text-left';	
		}
		
		return '<div class="col-md-3 '.$align.'">'.do_shortcode($content).'</div>'; 
	}
	add_shortcode( 'one_fourth', 'zp_one_fourth' );
}

/**
 *	Grid Columns
 */

if ( !function_exists( 'zp_column_grid_1' ) ){
	function zp_column_grid_1( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));	
		
		if( $align == 'center' ){
			$align = 'text-center';
		}elseif ( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		return '<div class="col-md-1 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_1','zp_column_grid_1' );
}

if( !function_exists( 'zp_column_grid_2' )){
	function zp_column_grid_2( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';	
		}
		
		return '<div class="col-md-2 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_2', 'zp_column_grid_2' );
}

if( !function_exists( 'zp_column_grid_3' )){
	function zp_column_grid_3( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-3 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_3', 'zp_column_grid_3' );
}

if( !function_exists( 'zp_column_grid_4' )){
	function zp_column_grid_4( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-4 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_4', 'zp_column_grid_4' );
}

if( !function_exists( 'zp_column_grid_5' )){
	function zp_column_grid_5( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-5 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_5', 'zp_column_grid_5' );
}

if( !function_exists( 'zp_column_grid_6' )){
	function zp_column_grid_6( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-6 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_6', 'zp_column_grid_6' );
}

if( !function_exists( 'zp_column_grid_7' )){
	function zp_column_grid_7( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-7 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_7', 'zp_column_grid_7' );
}

if( !function_exists( 'zp_column_grid_8' )){
	function zp_column_grid_8( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-8 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_8', 'zp_column_grid_8' );
}

if( !function_exists( 'zp_column_grid_9' )){
	function zp_column_grid_9( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-9 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_9', 'zp_column_grid_9' );
}

if( !function_exists( 'zp_column_grid_10' )){
	function zp_column_grid_10( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-10 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_10', 'zp_column_grid_10' );
}

if( !function_exists( 'zp_column_grid_11' )){
	function zp_column_grid_11( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-11 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_11', 'zp_column_grid_11' );
}

if( !function_exists( 'zp_column_grid_12' )){
	function zp_column_grid_12( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => ''
		), $atts ));
		
		if( $align == 'center' ){
			$align = 'text-center';	
		}elseif( $align == 'right' ){
			$align = 'text-right';
		}else{
			$align = 'text-left';
		}
		
		return '<div class="col-md-12 '.$align.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode( 'column_grid_12', 'zp_column_grid_12' );
}

/**
 *	Services  Section
 */

if ( !function_exists( 'zp_services_section' )){
	function zp_services_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'columns' => '',
			'align' => '',
			'items' => ''
		), $atts ));			
		return '<div class="services_section section"><div class="container"><div class="row">'.zp_display_services( $columns, $align , $items ).'</div></div></div>';
	}
	add_shortcode( 'services', 'zp_services_section' );
	
}

function zp_display_services( $columns, $align , $items ){
	global $post;
	
	$output='';
	
	$recent = new WP_Query(array('post_type'=> 'services', 'showposts' => $items  ));

	// check the number of columns
	if( $columns == 2 ){
		$columns = 'col-md-6 col-sm-6 col-xs-12';
	}elseif( $columns == 3 ){
		$columns = 'col-md-4 col-sm-6 col-xs-12';	
	}elseif ( $columns == 4 ){
		$columns = 'col-md-3 col-sm-6 col-xs-12';	
	}else{
		$columns = 'col-md-3 col-sm-6 col-xs-12';	
	}
	
	// check the content alignment
	if( $align == 'center' ){
		$align = 'text-center';
	}elseif ( $align == 'right' ){
		$align = 'text-right';	
	}else{
		$align = 'text-left';	
	}

	while($recent->have_posts()) : $recent->the_post();
	
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		$icon_class = get_post_meta( $post->ID, 'icon_class', true );
		$icon_type = get_post_meta( $post->ID, 'icon_type', true );
		
		$icon='';
		if( $icon_type == 'font-awesome' ){
			$icon = '<div class="thumbnail"><div class="feature-icon icon-font"><i class="fa '.$icon_class.'"></i></div>';
		}elseif( $icon_type == 'glyphicons' ){
			$icon = '<div class="thumbnail"><div class="feature-icon icon-font"><span class="glyphicon '.$icon_class.'"></span></div>';
		}else{
			$icon = '<div class="thumbnail"><div class="feature-icon icon-image"><img alt="" src="'.$image_url.'" /></div>';
		}
		$content = apply_filters('the_content', get_the_content());
		
		//filter content to output the same as the the_content
		$content = str_replace(']]>', ']]&gt;', $content);
		$output .= '<div class="service_block '.$columns.' '.$align.'">';
		
		$output .= $icon.'<div class="caption"><h3>'.get_the_title().'</h3>'.do_shortcode( $content ).'</div></div>';
		$output .= '</div>';	
	endwhile;
	wp_reset_query();	
	
	return $output;	
}

/**
 *	Image Ssection
 */
if (!function_exists( 'zp_image_section' ) ){
	function zp_image_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'image_url' => '',
			'link' => '',
			'title' => '',
			'desc' => '',
			'image_position' =>''
		), $atts ));
		
		if( $image_position == 'left' ){
			$image_position = 'pull-left';
			$text_position = 'pull-right';
		}else{
			$image_position = 'pull-right';	
			$text_position = 'pull-left';
		}
		
		if( $link ){
			$image = '<div class="col-md-6 col-sm-12 col-xs-12 '.$image_position.' "><a href="'.$link.'"><img class="img-responsive" alt="placeholder image" src="'.$image_url.'" /></a></div>';
		}else{
			$image = '<div class="col-md-6 col-sm-12 col-xs-12 '.$image_position.' gallery-popup section_image"><a href="'.$image_url.'"><img class="img-responsive" alt="placeholder image" src="'.$image_url.'" /></a></div>';
		}
		
		if( $title ){
			$title = '<h2>'.$title.'</h2>';	
		}
		
		if( $desc ){
			$desc = '<p class="lead">'.$desc.'</p>';	
		}
		
		return '<div class="info_image_section section"><div class="container"><div class="row">'.$image.'<div class="col-md-6 col-sm-12 col-xs-12 '.$text_position.'">'.$title.$desc.'<p>'.do_shortcode( $content ).'</p></div></div></div></div>';
	}
	add_shortcode( 'image_section','zp_image_section' );
}

/**
 *	Slider Section
 */

if ( !function_exists( 'zp_slider_section' )){
	function zp_slider_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'slidename' => '',
			'slideshow' => '',
			'caption' => '',
			'title' => '',
			'desc' => '',
			'slider_position' => ''
			), $atts ));
			
			//create slider
			$slidename = str_replace( ' ', '_', $slidename );
			$slider = zp_create_slider( $slidename, $slideshow, $caption );
			
			if( $slider_position == 'right' ){
				$slider_position = 'pull-right';
				$text_position = 'pull-left';	
			}else{
				$slider_position = 'pull-left';
				$text_position = 'pull-right';	
			}
			
			if($title){
				$title = '<h2>'.$title.'</h2>';	
			}
			if($desc){
				$desc = '<p class="lead">'.$desc.'</p>';	
			}
			
			return '<div class="info_slider_section section"><div class="container"><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 '.$slider_position.'">'.$slider.'</div><div class="col-md-6 col-sm-12 col-xs-12 '.$text_position.'">'.$title.$desc.'<p>'.do_shortcode( $content ).'</p></div></div></div></div>';
			
	}
	add_shortcode( 'slider_section','zp_slider_section' );
}

function zp_create_slider( $slidename, $slideshow, $caption ){
	global $post;
	$output='';
	
	$recent = new WP_Query(array('post_type'=> 'slide', 'showposts' => '-1','orderby' => 'meta_value_num', 'meta_key'=>'slide_number_value','order'=>'ASC', 'slideshow' => $slideshow ));
	
	$output .='<div class="carousel slide" id="'.$slidename.'">';
	$output .= '<ol class="carousel-indicators">';
	
	$nav_buttons = $recent->found_posts;
	$i=0;
	while($i < $nav_buttons){
		if( $i == 0 ){
			$active = 'active';
	}else{
		$active ='';
	}
		$output .= '<li class="'.$active.'" data-slide-to="'.$i.'" data-target="#'.$slidename.'"></li>';
		$i++;
	}
	
	$output .= '</ol>';
	$output .= '<div class="carousel-inner">';
	
	
	$flag = 0;
	
	while($recent->have_posts()) : $recent->the_post();
		$flag++;
		if($flag == 1){
			$active = 'active';
		}else{
			$active = '';
		}
		
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		
		$output .= '<div class="item gallery-popup '.$active.'">';
		
		$output .= '<a href="'.$image_url.'"><img class="img-responsive" alt="placeholder image" src="'.$image_url.'" /></a>';
		if( $caption == 'true'){
			$output .= '<div class="carousel-caption"><h4>'.get_the_title().'</h4>'.do_shortcode( get_the_content() ).'</div>';
		}
		
		$output .= '</div>';
	endwhile;wp_reset_query();
	
	$output .= '</div>';
	$output .= '<a data-slide="prev" data-target="#'.$slidename.'" class="carousel-control left"><span class="glyphicon glyphicon-chevron-left"></span></a>';
	$output .= '<a data-slide="next" data-target="#'.$slidename.'" class="carousel-control right"><span class="glyphicon glyphicon-chevron-right"></span></a>';
	$output .= '</div>';
	
	return $output;
}

/**
 *	Video Section
 */

if (!function_exists( 'zp_video_section' )){
	function zp_video_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'src' => '',
			'title' => '',
			'height' => '',
			'width' => '',
			'desc' => '',
			'video_position' =>''
		), $atts ));

		if( $video_position == 'right'){
			$video_position = 'pull-right';
			$text_position = 'pull-left';
		}else{
			$video_position = 'pull-left';
			$text_position = 'pull-right';	
		}
	
		if( $title ){
			$title = '<h2>'.$title.'</h2>';
		}
		if( $desc ){
			$desc = '<p class="lead">'.$desc.'</p>';	
		}
		
		return '<div class="info_video_section section"><div class="container"><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 '.$video_position.' gallery-popup fitvids"><iframe src="'.$src.'" height="'.$height.'" width="'.$width.'" ></iframe></div><div class="col-md-6 col-sm-12 col-xs-12 '.$text_position.'">'.$title.$desc.'<p>'.do_shortcode( $content ).'</p></div></div></div></div>';
	}
	
	add_shortcode( 'video_section','zp_video_section' );
}

/**
 *	Testimonial
 */

if ( !function_exists( 'zp_testimonial_section_wrapper' )){
	function zp_testimonial_section( $atts, $content = null ){
		return '<div class="testimonial_section section"><div class="container"><div class="row">'.zp_create_testimonials().'</div></div></div>';		
	}
	add_shortcode( 'testimonial_section','zp_testimonial_section' );
}

// create testimonial function
function zp_create_testimonials( ){
	global $post;
	
	$output='';
	
	$recent = new WP_Query(array('post_type'=> 'testimonial', 'showposts' => '-1','order'=>'ASC'));
	
	$output .='<div class="carousel slide" id="testimonials-slider">';
	$output .= '<ol class="carousel-indicators">';
	
	$nav_buttons = $recent->found_posts;
	$i=0;
	while($i < $nav_buttons){
		$output .= '<li class="active" data-slide-to="'.$i.'" data-target="#testimonials-slider"></li>';
		$i++;
	}
	
	$output .= '</ol>';
	$output .= '<div class="carousel-inner">';
	
	$flag = 0;
	while($recent->have_posts()) : $recent->the_post();
		$flag++;
		if($flag == 1){
			$active = 'active';
		}else{
			$active = '';
		}
		
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		$output .= '<div class="item '.$active.'">';
		$output .= '<div class="col-md-8 col-md-offset-2 text-center"><div class="quote-icon"><img alt="" src="'.$image_url.'" /></div></div>';
		$output .= '<div class="col-md-8 col-md-offset-2 text-center"><p class="lead">'.get_the_content().'</p><cite>'.get_the_title().', <a class="label label-default" href="'.get_post_meta($post->ID, 'link', true).'">'.get_post_meta($post->ID, 'position_title', true).'</a></cite></div>';
		$output .= '</div>';
		
	endwhile;wp_reset_query();
	
	$output .= '</div>';
	$output .= '<a data-slide="prev" data-target="#testimonials-slider" class="carousel-control left"><span class="glyphicon glyphicon-chevron-left"></span></a>';
	$output .= '<a data-slide="next" data-target="#testimonials-slider" class="carousel-control right"><span class="glyphicon glyphicon-chevron-right"></span></a>';
	$output .= '</div>';
	
	return $output;
}

/**
 *	Portfolio Section
 */

if ( !function_exists( 'zp_portfolio_section' )){
	function zp_portfolio_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'preselect_cat' => '',
			'lightbox' => ''
		), $atts ));
		return '<div class="portfolio_section section">'.zp_portfolio( $preselect_cat, $lightbox ).'</div>';
	}
	add_shortcode( 'zp_portfolio','zp_portfolio_section' );
}

//create portfolio section
function zp_portfolio( $preselect_cat, $lightbox){
	global $post;
	
	$output='';
	$selected = '';
	$gallery_class = '';
	
	$recent_portfolio = new WP_Query(array('post_type'=> 'portfolio', 'showposts' => '-1' ));
	/*$output .='<div id="filters" class="gallery-filter">';
	
	//check if preselect category is defined
	if( $preselect_cat != '' ){
		$active = '';
	}else{
		$active = 'active selected';	
	}
	$output .= '<ul data-option-key="filter" class="option-set" > <li><a class="btn btn-default inline '.$active.'" href="#" data-option-value="*" >'.__( 'All', 'dharma' ).'</a></li>';
	$categories = get_categories( array( 'taxonomy' => 'portfolio_category' ) );
	
	foreach( $categories as $category ):
		if( $preselect_cat === $category->slug  ){
			$selected = 'data-pre-select = "true"';
			$active = 'active selected';
		}else{
			$selected = '';
			$active = '';
		}
		$output .=  '<li ><a class="btn btn-default inline '.$active.'" href="#" '.$selected.' data-option-value=".'.$category->slug.'" >'.$category->name.'</a></li>';
	endforeach;
	
	$output .= '</ul></div>';*/
	
	$output .='<div id="filters" class="gallery-filter">';
	
	$output .= '<select> <option value="*">'.__( 'All', 'start' ).'</option>';
	$categories = get_categories( array( 'taxonomy' => 'portfolio_category' ) );
	
	foreach( $categories as $category ) :
		if( $preselect_cat === $category->slug  ){
			$selected = 'selected="selected"';
		}else{
			$selected='';
		}
		$output .=  '<option value=".'.$category->slug.'" '.$selected.'>'.$category->name.'</option>';
	endforeach;
	
	$output .= '</select></div>';
		
	$output .= '<div class="loader portfolio_loader"></div>';
	$output .= '<div id="gallery-items">';
	
	
	while($recent_portfolio->have_posts()) : $recent_portfolio->the_post();
	
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		
		$image = get_the_post_thumbnail( $post->ID  , 'portfolio', array('class'=> 'img-responsive', 'alt'	=> "", 'title'	=> "" ) );
			
		// get video link
		$video_link = get_post_meta( $post->ID, 'video_link', true );
		
		// get portfolio attached images ids
		$portfolio_images = get_post_meta( $post->ID, 'portfolio_images', true );
			
		if(  $lightbox == 'true' ){
			// check if video link exists
			if( $video_link ){
				$gallery_class = 'gallery-video';
				$portfolio_icon_class = '<span class="portfolio_icon_class"><i class="fa fa-film"></i></span>';
			}elseif( $portfolio_images ){
				$gallery_class = 'gallery-slide '.$post->post_name;
				$portfolio_icon_class = '<span class="portfolio_icon_class"><i class="fa fa-picture-o"></i></span>';
			}else{
				$gallery_class = 'gallery-image';
				$portfolio_icon_class = '<span class="portfolio_icon_class"><i class="fa fa-search"></i></span>';
			}
		}else{
			$gallery_class = 'gallery-link';
			$portfolio_icon_class = '<span class="portfolio_icon_class"><i class="fa fa-link"></i></span>';
		}
		
		$output .= '<div class="portfolio-item '.$gallery_class.' '.zp_portfolio_items_term( $post->ID ).'">';
		if(  $lightbox == 'true' ){
			if( $video_link ){
				$output .= '<a href="'.$video_link.'">'.$portfolio_icon_class.$image.'</a>';
			}elseif( $portfolio_images ){
				$output .= '<a href="'.$image_url.'">'.$portfolio_icon_class.$image.'</a>';
				$output .= zp_portfolio_image_attachments( $portfolio_images, $post->post_name );
			}else{
				$output .= '<a href="'.$image_url.'">'.$portfolio_icon_class.$image.'</a>';
			}
		}else{
			$output .= '<a href="'.get_permalink().'">'.$portfolio_icon_class.$image.'</a>';
		}
		$output .= '</div>';
	
	endwhile;
	wp_reset_query();
	
	$output .= '</div>';
	
	return $output;
}

/**
 *	Button Shortcode
 */

if (!function_exists( 'zp_button' )){
	function zp_button( $atts, $content = null ){
		extract( shortcode_atts( array(
			'link' => '',
			'size' => '',
			'class' => '',
			'inline' => '',
			'target' => ''
		),$atts ));
		
		if( $inline == 'true' ){
			$inline = 'inline';	
		}else{
			$inline = '';	
		}
		
		$target = ( $target != '' )? 'target="'.$target.'"' : '';
		
		return '<a class="btn '.$class.' '.$inline.' '.$size.'" href="'.$link.'" '.$target.'>'.$content.'</a>';		
	}
	
	add_shortcode( 'button', 'zp_button');
}

/**
 *	Accordion Section
 */

if ( !function_exists( 'zp_accordion_wrap' ) ){
	function zp_accordion_wrap( $atts, $content = null ){
		return ' <div class="panel-group" id="accordion">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'accordion_wrap', 'zp_accordion_wrap' );
}

if ( !function_exists( 'zp_accordion' )){
	function zp_accordion( $atts, $content = null ){
		extract( shortcode_atts( array(
			'id' => '',
			'title' => '',
			'label' => ''
		), $atts));
		
		$id = str_replace( ' ', '_' , $id );
		
		$label = ( $label )? '<span class="label label-default">'.$label.'</span>' : '';			
		
		$heading = '<div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion" href="#'.$id.'"><span class="fa fa-plus-circle pull-right"></span></a>'.$label.$title.'</h4></div>';
		
		$content = '<div id="'.$id.'" class="panel-collapse collapse"><div class="panel-body">'.do_shortcode( $content ).'</div></div> ';
		
		return '<div class="panel panel-default">'.$heading.$content.'</div>';
	}
	
	add_shortcode( 'accordion', 'zp_accordion' );
}

/**
 *	Alert Shortcodes
 */

if ( !function_exists( 'zp_alerts' )){
	function zp_alerts( $atts, $content = null ){
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ));
		
	return '<div class="alert '.$class.'">'.do_shortcode( $content ).'</div>';		
	}
	add_shortcode( 'alert', 'zp_alerts' );
}

/**
 *	Dismissable  Section
 */

if ( !function_exists( 'zp_dismissable_alerts' )){
	function zp_dismissable_alerts( $atts, $content = null ){
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ));
		
	return '<div class="alert '.$class.' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.do_shortcode( $content ).'</div>';		
	}
	add_shortcode( 'dismissable_alert', 'zp_dismissable_alerts' );
}

/**
 *	Team Section
 */

if ( !function_exists( 'zp_team_section' )){
	function zp_team_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'columns' => '',
			'align' => ''
		), $atts ));
		return '<div class="team_section section"><div class="container"><div class="row">'.zp_display_team( $columns, $align ).'</div></div></div>';
	}
	add_shortcode ('team', 'zp_team_section');
}

function zp_display_team( $column, $align ){
	global $post;
	
	$output='';
	
	$recent = new WP_Query(array('post_type'=> 'team', 'showposts' => '-1' ));

	// check the number of columns
	if( $column == 2 ){
		$column = 'col-md-6 col-sm-6 col-xs-12';
	}elseif( $column == 3 ){
		$column = 'col-md-4 col-sm-6 col-xs-12 ';	
	}elseif ( $column == 4 ){
		$column = 'col-md-3 col-sm-6 col-xs-12 ';	
	}else{
		$column = 'col-md-3 col-sm-6 col-xs-12';	
	}
	
	// check the content alignment
	if( $align == 'center' ){
		$align = 'text-center';
	}elseif ( $align == 'right' ){
		$align = 'text-right';	
	}else{
		$align = 'text-left';	
	}

	while($recent->have_posts()) : $recent->the_post();	
	
	// team social links
	$social = '';
	if( get_post_meta( $post->ID, 'dribbble', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'dribbble', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Dribbble" target="_blank" ><i class="fa fa-dribbble"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'flickr', true ) != '' ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'flickr', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Flickr" target="_blank" ><i class="fa fa-flickr"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'github', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'github', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Github" target="_blank" ><i class="fa fa-github"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'pinterest', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'pinterest', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'twitter', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'twitter', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'facebook', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'facebook', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'google+', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'google+', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Google+" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'skype', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'skype', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Skype" target="_blank"><i class="fa fa-skype"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'tumblr', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'tumblr', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'vimeo', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'vimeo', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'youtube', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'youtube', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>';	
	}
	if( get_post_meta( $post->ID, 'linkedin', true ) ){
		$social .= '<li><a href="'.get_post_meta( $post->ID, 'linkedin', true ).'" class="tooltip-trigger mlm" title="" data-toggle="tooltip" data-original-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>';	
	}	
	
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );	
		$output .= '<div class="'.$column.' '.$align.'"><div class="thumbnail" ><div class="feature-icon"><img alt="placeholder" src="'.$image_url.'" /></div><div class="caption"><h3>'.get_the_title().'<br><small>'.get_post_meta( $post->ID, 'team_position', true ).'</small></h3><p>'.get_the_content().'</p><ul class="team_social">'.$social.'</ul></div></div></div>';	
	endwhile;
	wp_reset_query();	
	
	return $output;	
}

/**
 *	Blog Section
 */

if ( !function_exists( 'zp_blog_section' ) ){
	function zp_blog_section( $atts, $content = null ){
		extract( shortcode_atts( array(
			'category' => '',
			'exclude_ids' => '',
			'columns' => '',
			'items' => ''
		), $atts ));

		return '<div class="blog_section section"><div class="container">'.zp_blog( $category, $exclude_ids='', $columns , $items ).'</div></div>';
	}
	add_shortcode( 'blog_section', 'zp_blog_section' );
}

function zp_blog( $category, $exclude_ids='', $columns , $items ){
		global $post, $wp_query;
		$output='';
		
		// get blog settings
		$include = $category;
		$exclude = explode( ',', str_replace( ' ', '', $exclude_ids ) );
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		// inherit Genesis arguments to render posts
		$query_args = 
			array(
				'post_type'		   => 'post',
				'cat'              => $include,
				'category__not_in' => $exclude,
				'showposts'        => $items,
				'paged'            => $paged,
			);
		
		$wp_query = new WP_Query( $query_args );
			
		//check the no of columns
		$size = '';
		if( $columns == 2 ){
			$columns = 'col-md-6 col-sm-6 col-xs-12';
			$column_class = 'masonry_blog_2col';
			$size = 'blog_masonry2';
		}elseif( $columns == 3 ){
			$columns = 'col-sm-6 col-md-4 col-xs-12';
			$column_class = 'masonry_blog_3col';
			$size = 'blog_masonry';
		}

		$output .=   '<div class="masonry_blog_shortcode '.$column_class.' row">';
		
		$flag = 0;
		
		if( have_posts() ) {
			while ( have_posts() ) {
				
				the_post();
		
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		$image = get_the_post_thumbnail( $post->ID  , $size, array('class'=> 'img-responsive') );
		
		// get the number of comments
		$num_comments = get_comments_number();

		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __( 'No Comments' ,'dharma' );
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __( ' Comments' ,'dharma' );
			} else {
				$comments = __( '1 Comment' ,'dharma' );
			}
			$write_comments = '<a class="blog_comment label label-default" href="' . get_comments_link() .'">'. $comments.'</a>';
		} else {
			$write_comments =  __( 'Comments are off' ,'dharma' );
		}
		$format = get_post_format();
		
		if( $format ){
			$post_format_class = $format.'_format';
		}else{
			$post_format_class = 'standard_format';
		}
		
		$output .=   '<div class="masonry_blog_item '.$columns.' '.$post_format_class.'"><div class="thumbnail">';
		
		//media section
		$output .=   '<div class="media_container">';
		if( $format == 'gallery' ){
			$output .=   zp_gallery( $post->ID , $size );
			$post_format_icon = '<i class="fa fa-camera"></i>';
		}elseif( $format == 'video' ){
			$embed = get_post_meta( $post->ID, 'zp_video_format_embed', true);
			if( !empty( $embed ) ) {
				$output .=   '<div class="video_container">'.stripslashes(htmlspecialchars_decode($embed)).'</div>';
			} else {
			   $output .= zp_video($post->ID, $size ); 
			}
			$post_format_icon = '<i class="fa fa-video-camera"></i>';
		}elseif( $format == 'audio' ){
			$embed = get_post_meta( $post->ID, 'zp_embed_audio', true);
			if( !empty( $embed ) ) {
            	$output .= stripslashes(htmlspecialchars_decode($embed));
			}else{
				$output .=  zp_audio($post->ID, $size );	
			}
			$post_format_icon = '<i class="fa fa-music"></i>';
		}elseif( $format == 'quote' ){
			$output .=   zp_quote();
		}elseif( $format == 'link' ){
			$output .=   zp_link();
		}else{
			$output .=   '<a href="'.get_permalink().'">'.$image.'</a>';
			$post_format_icon = '<i class="fa fa-pencil"></i>';
		}
		$output .=   '</div>';
		
		if( $format != 'link' && $format != 'quote' )		
		$output .=   '<div class="caption"><h4>'.$post_format_icon.'<a href="'.get_permalink().'">'.get_the_title().'</a></h4><div class="masonry_blog_meta"><time class="entry-time label label-default">'. get_the_date( 'F j, Y' ).'</time>'.$write_comments.'</div>'.get_the_content_limit( 100, '' ).'<a class="readmore btn btn-primary btn-sm" href="'.get_permalink().'">'.__( 'Read More','dharma' ).'</a></div>';
		$output .=   '</div></div>';
		
			}
		}
		$output .=   '</div>';		
		
		wp_reset_query();
		
		return $output;
}

	
/**
 *	Contact Section
 */

	if ( !function_exists( 'zp_contact_section' )){
		function zp_contact_section( $atts, $content = null ){
		
			return '<div class="contact_section section"><div class="container">'.do_shortcode( $content ).'</div></div>';
		}
		add_shortcode( 'contact_section', 'zp_contact_section' );
	}

/**
 *	Social
 */

if ( !function_exists( 'zp_social_icons' ) ){
	function zp_social_icons( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => '',
			'color' => '',
			'hover_color' => '',
			'tooltip_color' => '',
			'tooltip_bg' => ''
		), $atts ));
		return '<div class="bottom-icons"><ul style="float:'.$align.'">'.do_shortcode( $content ).'</ul></div>';
	}
	add_shortcode( 'social_icons', 'zp_social_icons' );
}

if ( !function_exists( 'zp_social' )){
	function zp_social( $atts, $content = null ){
		extract( shortcode_atts( array(
			'name' => '',
			'link' => '',
			'label' => '',
			'target' => ''
		), $atts));
		
		if( 'dribbble' == $name ){
			$name = 'fa-dribbble';	
		}
		if( 'flickr' == $name ){
			$name = 'fa-flickr';	
		}
		if( 'github' == $name ){
			$name = 'fa-github';	
		}
		if( 'pinterest' == $name ){
			$name = 'fa-pinterest';
		}
		if( 'twitter' == $name ){
			$name = 'fa-twitter';	
		}
		if( 'facebook' == $name ){
			$name = 'fa-facebook';
		}
		if( 'google+' == $name ){
			$name = 'fa-google-plus-square';
		}
		if( 'skype' == $name ){
			$name = 'fa-skype';
		}
		if( 'tumblr' ==  $name ){
			$name = 'fa-tumblr';	
		}
		if( 'vimeo' == $name ){
			$name = 'fa-vimeo-square';	
		}
		if( 'youtube' == $name ){
			$name = 'fa-youtube';	
		}
		if( 'linkedin' == $name ){
			$name = 'fa-linkedin';	
		}
		
		if( '' == $target){
			$target = '_blank';	
		}
		
		return '<li><a href="'.$link.'" class="tooltip-trigger tooltip-light" title="" data-toggle="tooltip" data-original-title="'.$label.'" target="'.$target.'"><i class="fa '.$name.'"></i></a></li>';
	}
	add_shortcode( 'social','zp_social' );
}

/**
 *	Pricing Table
 */

if ( !function_exists( 'zp_pricing_section' ) ){
	function zp_pricing_section( $atts, $content = null )	{
		extract( shortcode_atts( array(
			'columns' => ''
		), $atts ));
		
		return '<div class="pricing_section section"><div class="container">'.zp_pricing_display( $columns ).'</div></div>';
	}
	add_shortcode( 'pricing','zp_pricing_section' );
}

function zp_pricing_display( $column ){
	global $post;
	
	$output = '';
	$btn_class = '';
	
	$recent = new WP_Query(array('post_type'=> 'pricing', 'showposts' => '-1' ));

	// check the number of columns
	if( $column == 2 ){
		$column = 'col-md-6 col-sm-6 col-xs-12';
	}elseif( $column == 3 ){
		$column = 'col-md-4 col-sm-4 col-xs-12';	
	}elseif ( $column == 4 ){
		$column = 'col-md-3 col-sm-3 col-xs-12';	
	}else{
		$column = 'col-md-3';	
	}
	$output .= '<ul class="pricing_main row">';
	while($recent->have_posts()) : $recent->the_post();	
		$price = get_post_meta( $post->ID, 'price', true );
		$payment_terms = get_post_meta( $post->ID, 'payment_terms', true );
		$best_price = get_post_meta( $post->ID, 'best_price', true );
		$button_label = get_post_meta( $post->ID, 'button_label', true );
		$button_link = get_post_meta( $post->ID, 'button_link', true );
		
		if( $best_price == 'bestprice' ){
			$btn_class = 'btn-primary btn-hg';	
		}else{
			$btn_class = 'btn-primary';	
		}

	
		$output .= '<li class="pricing '.$column.' '.$best_price.'"><h2>'.get_the_title().'</h2><div class="plan-head"><div class="plan-price">'.$price.'</div><div class="plan-terms">'.$payment_terms.'</div></div>'.do_shortcode( get_the_content() ).'<div class="plan-bottom"><a class="btn '.$btn_class.'" href="'.$button_link.'">'.$button_label.'</a></div></li>';	
	endwhile;
	wp_reset_query();
	$output .= '</ul>';	
	
	return $output;	
}
/**
 * Lead Text
 */
 
if ( !function_exists( 'zp_lead_text' )){
	function zp_lead_text( $atts, $content = null ){	
		return '<p class="lead">'.$content.'</p>';	
	}
	add_shortcode( 'lead_text', 'zp_lead_text' );
}
/**
 * Code Wrapper
 */
 
if ( !function_exists( 'zp_code_wrapper' )){
	function zp_code_wrapper( $atts, $content = null ){
		
		$Old     = array( '<br />', '<br>' );
		$New     = array( '','' );
		$content = str_replace( $Old, $New, $content );
		return '<style type="text/css">.code_wrapper{display:block; margin-top: 20px;} .code_wrapper strong{margin-top: 16px; display: block;}</style><div class="code_wrapper"><h4>Shortcode:</h4><pre>'.$content.'</pre></div>';
	}
	add_shortcode( 'code_wrapper', 'zp_code_wrapper' );
}

/**
 * Tooltip
 */
if( !function_exists( 'zp_tooltip' ) ){
	function zp_tooltip( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' => '',
			'title' => ''
		), $atts ));
		return '<span class="tooltip-trigger" title="" data-placement="'.$position.'" data-toggle="tooltip" data-original-title="'.$title.'">'.$content.'</span>';
	}
	
	add_shortcode( 'tooltip','zp_tooltip' );
}

/**
 * Popover
 */

if ( !function_exists( 'zp_popover' )){
	function zp_popover( $atts, $content = null ){
		extract( shortcode_atts( array(
			'label' => '',
			'position' => '',
			'title' => ''
		), $atts ));
		
		return '<span class="popover-trigger" title="" data-content="'.$label.'" data-placement="'.$position.'" data-toggle="popover" data-original-title="'.$title.'">'.do_shortcode( $content ).'</span>';
	}
	add_shortcode( 'popover' , 'zp_popover' );
}
/**
 * Tabs
 */

if( !function_exists( 'zp_tabs' )){
	function zp_tabs( $atts, $content = null ){
		extract( shortcode_atts( array(
			'ids' => '',
			'nav' => ''
		), $atts ) );
		
		$ids_array = explode( ',',$ids );
		$nav_array = explode( ',',$nav );
		$output = '';
		
		$output .= '<div class="tab_container">';
		$output .= '<ul class="nav nav-tabs nav-append-content">';
		for( $i=0; $i < count( $nav_array ); $i++ ){
			$output .= '<li><a href="#'.$ids_array[$i].'" data-toggle="tab">'.$nav_array[$i].'</a></li>';	
		}
		$output .= '</ul>';
		
		$output .= '<div class="tab-content">'.do_shortcode( $content ).'</div>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode( 'tab', 'zp_tabs' );
}

if( !function_exists( 'zp_tabpane' )){
	function zp_tabpane( $atts, $content = null ){
		extract( shortcode_atts( array(
			'id' => ''
		), $atts ) );
		
		return '<div class="tab-pane" id="'.$id.'">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'tabpane', 'zp_tabpane' );
}

/**
 * Modal Box
 */
 
if( !function_exists( 'zp_modal_box' ) ){
	function zp_modal_box( $atts, $content = null ){
		extract( shortcode_atts( array(
			'modal_name' => '',
			'btn_label' => '',
			'btn_size' => '',
			'btn_class' => ''
		), $atts ));
		
		return '<button class="btn '.$btn_class.' '.$btn_size.'" data-toggle="modal" data-target="#'.$modal_name.'">'.$btn_label.'</button><div class="modal fade" id="'.$modal_name.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content">'.do_shortcode( $content ).'</div></div></div>';	
	}
	add_shortcode( 'modal','zp_modal_box' );
}
 
if( !function_exists( 'zp_modal_header' ) ){
	function zp_modal_header( $atts, $content = null ){
		extract( shortcode_atts( array(
			'title' => ''
		), $atts ) );
		return '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">'.$title.'</h4></div>';		
	}
	add_shortcode( 'modal_header', 'zp_modal_header' );
}

if( !function_exists( 'zp_modal_content' ) ){
	function zp_modal_content( $atts, $content = null ){
		return '<div class="modal-body">'.do_shortcode( $content ).'</div>';		
	}
	add_shortcode( 'modal_content', 'zp_modal_content' );
}
if( !function_exists( 'zp_modal_footer' ) ){
	function zp_modal_footer( $atts, $content = null ){
		return '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">'.__( 'Close','dharma').'</button>'.do_shortcode( $content ).'</div>';		
	}
	add_shortcode( 'modal_footer', 'zp_modal_footer' );
}

/**
 * Client carousel
 */
 if( !function_exists( 'zp_client_carousel' ) ){
	 function zp_client_carousel( $atts, $content = null ){
		 extract( shortcode_atts( array(
		 	'name' => ''
		 ), $atts ));
		wp_enqueue_script( 'owl_carousel' );
		 
		 $output = '';
		 $output .= '<script>
	jQuery(document).ready(function() {
		
	  
      var owl = jQuery("#'.$name.'");
      owl.owlCarousel({
			  items : 5, 
			  itemsDesktop : [1023, 4 ], 
			  itemsDesktopSmall : [767, 3], 
			  itemsTablet: [600,2], 
			  itemsMobile : [479,1],
			  pagination: false 
	 });
   	jQuery(".cc_next").click(function(){
        owl.trigger("owl.next");
      })
      jQuery(".cc_prev").click(function(){
        owl.trigger("owl.prev");
      })
	  
	  jQuery(".client_carousel_nav").hide();
	 
	  });
	  
	  jQuery(window).load(function() {
		  var nav_height = jQuery(".owl-carousel .item img").height();
		  jQuery(".client_carousel_nav").css({"margin-top": nav_height/2+"px" });
		  jQuery(".client_carousel_nav").show();	 
	  });
</script>';
		 return '<div class="client_carousel section"><div class="container">'.$output.'<a class="client_carousel_nav cc_prev"><span class="glyphicon glyphicon-chevron-left"></span></a><div id="'.$name.'" class="owl-carousel">'.zp_client_display( ).'</div><a class="client_carousel_nav cc_next"><span class="glyphicon glyphicon-chevron-right"></span></a></div></div>';
	 }
	 
	 add_shortcode( 'client_carousel', 'zp_client_carousel' );
 }

/* Client Display */
 function zp_client_display( ){
	global $post;
	
	$output = '';
	
	$recent = new WP_Query(array('post_type'=> 'client', 'showposts' => -1 ));

	while($recent->have_posts()) : $recent->the_post();	
		$client_link = get_post_meta( $post->ID, 'zp_client_link', true );
		$client_link_target = get_post_meta( $post->ID, 'zp_client_link_target', true );
		
		$client_link_target = ( $client_link_target != '' )? $client_link_target : '_blank';
		
		if( $client_link ){
			$output .= ' <div class="item"><a href="'.$client_link.'" target="'.$client_link_target.'">'.wp_get_attachment_image( get_post_thumbnail_id(  $post->ID  ), 'full'  ).'</a></div>';
		}else{
			$output .= ' <div class="item">'.wp_get_attachment_image( get_post_thumbnail_id(  $post->ID  ), 'full'  ).'</div>';
		}
		
	endwhile;
	wp_reset_query();
	
	return $output;	
}
 
