<?php
/**
 * Add featured slider after the header
 *
 */

add_action( 'genesis_after_header', 'zp_feature_slider' );
function zp_feature_slider(){
	global $post;

	$output = '';
	$page_header = '';
	$page_header_default = '';

	// get page header feature settings
	$page_header = get_post_meta( $post->ID, 'page_header_featured', true );

	// get default page header feature settings
	$page_header_default = genesis_get_option( 'zp_default_page_header',  ZP_SETTINGS_FIELD );

	// check if the page header feature settings was set, if not use the default settings
	if( empty( $page_header ) ){
		//if slider
		if( 'slider' == $page_header_default ){
			$slideshow = genesis_get_option( 'zp_default_slideshow',  ZP_SETTINGS_FIELD );
			$effect = genesis_get_option( 'zp_default_effect',  ZP_SETTINGS_FIELD );
			$caption = genesis_get_option( 'zp_default_include_caption',  ZP_SETTINGS_FIELD );
			$output = zp_header_slider( $slideshow , $effect, $caption );
		}else{
			// displays video
			// get video item links
			$mp4_video = genesis_get_option( 'zp_mp4_url',  ZP_SETTINGS_FIELD );
			$WEBM_video = genesis_get_option( 'zp_webm_url',  ZP_SETTINGS_FIELD );
			$OGV_video = genesis_get_option( 'zp_ogv_url',  ZP_SETTINGS_FIELD );
			$output = zp_header_video( $post->ID, $mp4_video, $WEBM_video, $OGV_video );
		}
	}else{
		// if page header is set
		if( 'slider' == $page_header ){
			$slideshow = get_post_meta( $post->ID, 'page_slideshow', true );
			$effect = get_post_meta( $post->ID, 'page_slideshow_effect', true );
			$caption = get_post_meta( $post->ID, 'page_slideshow_caption', true );
			$output = zp_header_slider( $slideshow , $effect , $caption );
		}else{
			$mp4_video = get_post_meta( $post->ID, 'MP4_video', true );
			$WEBM_video = get_post_meta( $post->ID, 'WEBM_video', true );
			$OGV_video = get_post_meta( $post->ID, 'OGV_video', true );
			$output = zp_header_video( $post->ID, $mp4_video, $WEBM_video, $OGV_video );
		}
	}

	echo $output;
}

/* Page Slider Function */

function zp_header_slider( $slideshow , $slide_effect , $caption ){
	global $post;

	$output='';
	$output .=  '<div class="home_slider container"><div class="fullwidth_slider">';
	$recent = new WP_Query(array('post_type'=> 'slide', 'showposts' => '-1','orderby' => 'meta_value_num', 'meta_key'=>'slide_number_value','order'=>'ASC', 'slideshow' => $slideshow ));

	$slide_effect = ( $slide_effect == 'fade' )? 'carousel-fade': '';

	$output .='<div class="carousel slide '.$slide_effect.'" id="fullwidth_slider">';
	$output .= '<ol class="carousel-indicators">';

	$nav_buttons = $recent->found_posts;

	$i=0;

	while($i < $nav_buttons){
		if( $i == 0 ){
			$active = 'active';
		}else{
			$active ='';
		}
		//removed overlay from this output
		$output .= '<li class="'.$active.'" data-slide-to="'.$i.'" data-target="#fullwidth_slider"></li>';
		$i++;
	}
	$output .= '</ol>';

	$output .= '<div class="carousel-inner">';

	$flag = 0;
	while($recent->have_posts()) : $recent->the_post();
		// Will add the slider meta to the slide
		$ecck_slide_id = $post->ID;
		$ecck_slide_hyperlink = ( get_post_meta( $ecck_slide_id, $key = '_ecck_slide_hyperlink', $single = true ));

		$flag++;

		if($flag == 1){
			$active = 'active';
		}else{
			$active = '';
		}

		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
		$output .= '<div class="item '.$active.'">';
		$output .= '<a href="'.$ecck_slide_hyperlink.'"><img class="img-responsive" alt="'.get_the_title().'" src="'.$image_url.'" /></a>';
		if( $caption == 'true' ){
// 			$output .= '<div class="carousel-caption"><div class="container"><div class="row"><div class="blk">
// <h1>'.get_the_title().'</h1>'.do_shortcode( apply_filters('the_content', get_the_content()) ).'</div></div></div></div>';
			$output .= '<div class="carousel-caption"><div class="container"><div class="row"><div class="blk">'.do_shortcode( apply_filters('the_content', get_the_content()) ).'</div></div></div></div>';
		}
		$output .= '</div>';
	endwhile; wp_reset_query();

	$output .= '</div>';
	if( $nav_buttons > 1 ){
		$output .= '<a data-slide="prev" data-target="#fullwidth_slider" class="carousel-control left"><span class="glyphicon glyphicon-chevron-left"></span></a>';
		$output .= '<a data-slide="next" data-target="#fullwidth_slider" class="carousel-control right"><span class="glyphicon glyphicon-chevron-right"></span></a>';
	}
	$output .= '</div></div>';
	$output .= '</div>';

	return $output;
}

/* Page Video Function */
function zp_header_video( $ID, $mp4_video, $WEBM_video, $OGV_video ){
	$output= '';

	$output .=  '<div class="home_slider container"><div class="fullwidth_slider">';
	$output .= '<video id="home_video" class="video-js vjs-default-skin vjs-big-play-centered" autoplay preload loop width="1903" height="790" >
	<source src="'.$mp4_video.'" type="video/mp4" />
	<source src="'.$WEBM_video.'" type="video/webm" />
	<source src="'.$OGV_video.'" type="video/ogg" />
	</video>';
	$output .= '</div></div>';

	return $output;
}