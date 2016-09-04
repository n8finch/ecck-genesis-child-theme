<?php 
/** 
* Themes' Helper Functions
*/

/**
* Blog Gallery Function
*/
function zp_gallery( $postid, $imagesize ) {
   $output = '';
   
   // get all of the attachments for the post
   $args = array(
	  'orderby' => 'menu_order',
	  'order' => 'ASC',
	  'post_type' => 'attachment',
	  'post_parent' => $postid,
	  'post_mime_type' => 'image',
	  'post_status' => null,
	  'numberposts' => '-1'
  );
  
  $output='';
  
  $attachments = get_posts($args);
  if( count($attachments) > 0 ){
	  $output .='<div class="carousel slide blog_slider" id="'.$postid.'">';
	  $output .= '<ol class="carousel-indicators">';
	  
	  $i=0;
	  while($i < count( $attachments ) ){
		  if( $i == 0 ){
			  $active = 'active';
		  }else{
			  $active ='';
		  }
		  
		  $output .= '<li class="'.$active.'" data-slide-to="'.$i.'" data-target="#'.$postid.'"></li>';
		  $i++;
	  }
	  $output .= '</ol>';
	  $output .= '<div class="carousel-inner">';
	  
	  $flag = 0;
	  $counter = 0;
	  foreach( $attachments as $attachment ) {
		  $flag++;
		  if($flag == 1){
			  $active = 'active';
		  }else{
			  $active = '';
		  }
		  
		  $image_url = wp_get_attachment_image_src( $attachment->ID, $imagesize );
		  $output .= '<div class="item blog_slide '.$active.'">';
		  $output .= '<img class="img-responsive" alt="placeholder image" src="'.$image_url[0].'" />';
		  $output .= '</div>';
	  }
	  
	  $output .= '</div>';
	  $output .= '<a data-slide="prev" data-target="#'.$postid.'" class="carousel-control left"><span class="glyphicon glyphicon-chevron-left"></span></a>';
	  $output .= '<a data-slide="next" data-target="#'.$postid.'" class="carousel-control right"><span class="glyphicon glyphicon-chevron-right"></span></a>';
	  $output .= '</div>';
	  
	  return $output;
  }
}

/**
* Blog Video Function
*/
function zp_video( $postid, $image_size ) {
  $height = get_post_meta( $postid, 'zp_video_prieview_image_height', true);
  $m4v = get_post_meta( $postid, 'zp_video_m4v_url', true);
  $ogv = get_post_meta( $postid, 'zp_video_ogv_url', true);
  $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), $image_size );
  
  $output = '';
  
  //set width and height
  $style = '';
  $width = $poster[1];
  $height = $poster[2];
  
  if( !$height ){
	  $height = '400px';
  }
  
  $output .= '<script type="text/javascript">
	  jQuery(document).ready(function($){
		  if( $().jPlayer ) {
			  $("#jquery-jplayer-video-'.$postid.'").jPlayer({
				  ready: function () {
					  $(this).jPlayer("setMedia", {
						  m4v: "'.$m4v.'",
						  ogv: "'.$ogv.'",
						  poster: "'.$poster[0].'"
					  });
				  },
				  size: {
					  cssClass: "jp-video-normal",
					  width: "100%",
					  height: "'.$height.'px"
				  },
					  swfPath: "'.get_stylesheet_directory_uri().'/js",
					  solution: "flash, html",
					  wmode: "window",
					  cssSelectorAncestor: "#jp-video-container-'.$postid.'",
					  supplied: "m4v, ogv"
		  });
		  $("#jquery-jplayer-video-'.$postid.'").bind($.jPlayer.event.playing, function(event) {
			  $(this).add("#jp-video-interface-'. $postid.'").hover( function() {
				  $("#jp-video-interface-'.$postid.'").stop().animate({ opacity: 1 }, 400);
			  }, function() {
				  $("#jp-video-interface-'.$postid.'").stop().animate({ opacity: 0 }, 400);
			  });
		  });
		  
		  $("#jquery-jplayer-video-'.$postid.'").bind($.jPlayer.event.pause, function(event) {
			  $("#jquery-jplayer-video-'.$postid.'").add("#jp-video-interface-'.$postid.'").unbind("hover");
			  $("#jp-video-interface-'.$postid.'").stop().animate({ opacity: 1 }, 400);
		  });
	  }
  });</script>';

	  $output .= '<div id="jp-video-container-'.$postid.'" class="jp-video jp-video-normal">';
	  $output .= '<div class="jp-type-single">';
	  $output .= '<div id="jquery-jplayer-video-'.$postid.'" class="jp-jplayer" data-orig-width="'.$width.'" data-orig-height="'.$height.'"></div>';
	  $output .= '<div class="jp-gui">';
	  $output .= '<div id="jp-video-interface-'.$postid.'" class="jp-interface">';
	  $output .= '<ul class="jp-controls">';
	  $output .= '<li><a href="#" class="jp-play" tabindex="1">play</a></li>';
	  $output .= '<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>';
	  $output .= '<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>';
	  $output .= '<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>';
	  $output .= ' </ul>';
	  $output .= '<div class="jp-progress">';
	  $output .= '<div class="jp-seek-bar">';
	  $output .= '<div class="jp-play-bar"></div>';
	  $output .= '</div>';
	  $output .= '</div>';
	  $output .= '<div class="jp-volume-bar">';
	  $output .= '<div class="jp-volume-bar-value"></div>';
	  $output .= '</div>';
	  $output .= '</div>';
	  $output .= '</div>';
	  $output .= '</div>';
	  $output .= '</div>';
	  return $output;
}

/**
* Blog Audio Fucntion
*/
function zp_audio($postid, $image_size ) {
	$mp3 = get_post_meta( $postid, 'zp_audio_mp3_url', true);
	$ogg = get_post_meta( $postid, 'zp_audio_ogg_url', true);
	$poster = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), $image_size );
	$output = '';
	
	//set width and height
	$style = '';
	$width = $poster[1];
	$height = $poster[2];
	
	if( !empty($poster[0]) ) {
		$poster_size = 'size: { width: "'.$width.'px", height: "'.$height.'px" },';
	}else{
		$poster_size = 'size: { width: "100%", height: "33px" },';
	}
	
	$output .='<script type="text/javascript">
		jQuery(document).ready(function($){
			if( $().jPlayer ) {
				$("#jquery-jplayer-audio-'.$postid.'").jPlayer({
					ready: function () {
						$(this).jPlayer("setMedia", {
							poster: "'.$poster[0].'",
							mp3: "'.$mp3.'",
							oga: "'.$ogg.'",
							end: ""
						});
					},
					'.$poster_size.'
					swfPath: "'.get_stylesheet_directory_uri().'/js",
					solution: "flash, html",
					wmode: "window",
					cssSelectorAncestor: "#jp-audio-interface-'.$postid.'",
					supplied: "mp3, oga"
				});
			}
		});
		</script>';
		
		$output .= '<div id="jp-container-'.$postid.'" class="jp-audio">';
		$output .= '<div class="jp-type-single">';
		$output .= '<div id="jquery-jplayer-audio-'.$postid.'" class="jp-jplayer" data-orig-width="'.$width.'" data-orig-height="'.$height.'"></div>';
		$output .= '<div id="jp-audio-interface-'.$postid.'" class="jp-interface">';
			$output .= '<ul class="jp-controls">';
				$output .= '<li><a href="#" class="jp-play" tabindex="1" title="play">play</a></li>';
				$output .= '<li><a href="#" class="jp-pause" tabindex="1" title="pause">pause</a></li>';
				$output .= '<li><a href="#" class="jp-mute" tabindex="1" title="mute">mute</a></li>';
				$output .= '<li><a href="#" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>';
			$output .= '</ul>';
			$output .= ' <div class="jp-progress">';
				$output .= '<div class="jp-seek-bar">';
				$output .= '<div class="jp-play-bar"></div>';
			$output .= '</div>';
		$output .= ' </div>';
		$output .= '<div class="jp-volume-bar">';
		$output .= '<div class="jp-volume-bar-value"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
}

/**
* Blog Quote Function
*/
function zp_quote(){
	$content = get_the_content();
	$title = get_the_title(  );
	$permalink=get_permalink(  );
	
	$output = '';
	$output .= '<div class="caption">';
	$output .= sprintf( '<div %s>', genesis_attr( 'entry-content' ) );
	$output .= '<h2><i class="fa fa-quote-right"></i>'.$content.'</h2>';
	$output .= '<span class="blog_meta"></span><p class="quote_author">'.$title.'<a href="'.$permalink.'" title="Permanent Link to '.$title.'"></a></p>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

/**
* Blog Link Function
*/
function zp_link(){
	global $post;
	
	$title = get_the_title(  );
	$permalink=get_permalink(  );
	$link = get_post_meta( $post->ID, 'zp_link_format', true );
	$output = '';
	$output .= sprintf( '<div %s>', genesis_attr( 'entry-content' ) );
	$output .= '<div class="caption">';
	$output .= '<h2><i class="fa fa-link"></i><a href="'.$link.'" title="'.$title.'">'.$title.'</a></h2>';
	$output .= '<span class="blog_meta"></span><p class="link_source">'.get_the_content().'</p>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

/**
* Matches the input video link inserted.
*/
function zp_return_desired_link( $link){
	$src = '';
	
	if( preg_match( '/youtube/', $link ) ){
		if( preg_match_all('#(http://www.youtube.com)?/(v/([-|~_0-9A-Za-z]+)|watch\?v\=([-|~_0-9A-Za-z]+)&?.*?)#i', $link, $matches ) ){
			$src = '//www.youtube.com/embed/'.$matches[4][0].'?autoplay=1';
		}
	}elseif( preg_match( '/vimeo/', $link ) ){
		if( preg_match('/^http:\/\/(www\.)?vimeo\.com\/(clip\:)?(\d+).*$/', $link, $matches ) ){
			$src = '//player.vimeo.com/video/'.$matches[3].'?autoplay=1';
		}
	}
	return $src;
}

/**
* Display images attached to a portfolio items
*/
function zp_portfolio_image_attachments( $portfolio_images, $slidename ){
	$ids = explode(",", $portfolio_images );
	
	$output = '';
	$i=0;
	
	while( $i < count( $ids ) ){
		if( $ids[$i] ){
			// get image url
			$url = wp_get_attachment_image_src( $ids[$i] , 'full' );
			$output .= '<a style="display:none;" href="'.$url[0].'"></a>';
		}
		$i++;
	}
	
	$output .= '<script type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function() {
			jQuery(".'.$slidename.'").magnificPopup({
				delegate: "a",
				type: "image",
				tLoading: "Loading image...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1]
				}
			});
		});
		</script>';
		
		return $output;
}

/**
*	Get portfolio terms
*/

function zp_portfolio_items_term( $id ){
	$output = '';
	
	$terms = wp_get_post_terms( $id, 'portfolio_category' );
	$term_string = '';
	
	foreach( $terms as $term ){
		$term_string.=( $term->slug ).',';
	}
	$term_string = substr( $term_string, 0, strlen( $term_string )-1 );
	
	/** separate terms with space*/
	$string = str_replace( ","," ",$term_string );
	$output = $string." ";
	return $output;
}

/**
* Get portfolio Terms Name
*/

function zp_portfolio_items_term_name( $id ){
	$output = '';
	
	$terms = wp_get_post_terms( $id, 'portfolio_category' );
	$term_string = '';
	
	foreach( $terms as $term ){
		$term_string.=( $term->name ).',';
	}
	
	$term_string = substr( $term_string, 0, strlen( $term_string )-1 );
	
	/** separate terms with space*/
	$portfolio_tag_separator = apply_filters( "portfolio_tag_separator", " <i class='fa fa-angle-right'></i> " );
	
	$output = str_replace( ",",$portfolio_tag_separator,$term_string );
	
	return $output;
}

/**
* Related portfolio
*/
function zp_related_portfolio(){
	global $post;
	
	$terms = get_the_terms( $post->ID , 'portfolio_category' );
	$term_ids = array_values( wp_list_pluck( $terms,'term_id' ) );
	
	$args=array(
     'post_type' => 'portfolio',
     'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio_category',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'IN'
                     )),
      'posts_per_page' => 3,
      'orderby' => 'rand',
      'post__not_in'=>array( $post->ID )
	);

	$related_portfolio = new WP_Query($args);
	$output = '';
	$output .='<div id="filters" class="gallery-filter">';
	$output .= '<div class="loader portfolio_loader"></div>';
	$output .= '<div id="gallery-items">';
	
	while($related_portfolio->have_posts()) : $related_portfolio->the_post();	
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );		
		$image = get_the_post_thumbnail( $post->ID  , 'portfolio', array('class'=> 'img-responsive', 'alt'	=> "", 'title'	=> "" ) );			
			
		$gallery_class = 'gallery-link';
		$portfolio_icon_class = '<span class="portfolio_icon_class"><i class="fa fa-link"></i></span>';
		
		$output .= '<div class="portfolio-item '.$gallery_class.' '.zp_portfolio_items_term( $post->ID ).'">';
		$output .= '<a href="'.get_permalink().'">'.$portfolio_icon_class.$image.'</a>';
		$output .= '</div>';
	
	endwhile;
	
	wp_reset_query();
	
	$output .= '</div>';
	
	return $output;
}