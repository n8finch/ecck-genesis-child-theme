<?php

/**-------------------------------------------------------------------
// Single Portfolio
--------------------------------------------------------------------*/

add_action( 'get_header', 'zp_portfolio_sidebar' );
function zp_portfolio_sidebar(){

	if( is_singular('portfolio') ){
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
		add_action( 'genesis_sidebar', 'zp_get_portfolio_sidebar' );	
	}
}

function zp_get_portfolio_sidebar(){
	global $post;

	// retrieve post meta values
	$button_label = get_post_meta( $post->ID, 'button_label', true );
	$button_link = get_post_meta( $post->ID, 'button_link', true );
	$date_label = get_post_meta( $post->ID, 'date_label', true );
	$date_value = get_post_meta( $post->ID, 'date_value', true );
	$client_label = get_post_meta( $post->ID, 'client_label', true );
	$client_value = get_post_meta( $post->ID, 'client_value', true );
	$category_label = get_post_meta( $post->ID, 'category_label', true );
		
	$output = '';
	
	if (  have_posts(  )  ) : while (  have_posts(  )  ) : the_post(  );
		$output .= '<div class="col-md-12 single_portfolio_sidebar">';
		
			
		$output .= '<div class="single_portfolio_section single_portfolio_content col-m-12">'.apply_filters( 'the_content', get_the_content() ).'</div>';
		
		if( $button_link ){
				$output .= '<div class="single_portfolio_section single_portfolio_button col-m-12"><a class="btn btn-lg btn-primary " href="'.$button_link.'">'.$button_label.'</a></div>';
		}
		
		if( $date_value || $client_value || $category_label ){
			$output .= '<div class="single_portfolio_section single_portfolio_meta col-m-12">';
			
				if( $date_value ){
					$output .= '<div class="meta_value date_meta"><span class="meta_label">'.$date_label.'</span>'.$date_value.'</div>';	
				}
				
				if( $client_value ){
					$output .= '<div class="meta_value client_meta"><span class="meta_label">'.$client_label.'</span>'.$client_value.'</div>';	
				}
				
				// retrieve portfolio category 
				if( $category_label ){
					$output .= '<div class="meta_value category_meta"><span class="meta_label">'.$category_label.'</span>';
						$categories = wp_get_post_terms(  $post->ID , 'portfolio_category' );
						foreach( $categories as $category ){
							$output .= $category->name.' ';
						}
					$output .= '</div>';
				}
				
			$output .= '</div>';
		}
		
		$output .= '<div class="single_portfolio_section single_portfolio_nav col-m-12">';
			
			$prev_post = get_previous_post();
			if ( !empty( $prev_post )){
				$output .= '<div class="single_nav_prev"><a href="'.get_permalink( $prev_post->ID ).'" class="btn btn-lg btn-primary">'.__( 'Previous', 'awaken' ).'</a></div>';
			}
			$next_post = get_next_post();
			if ( !empty( $next_post )){
				$output .= '<div class="single_nav_next inline"><a href="'.get_permalink( $next_post->ID ).'" class="btn btn-lg btn-primary">'.__( 'Next', 'awaken' ).'</a></div>';
			}
		$output .= '</div>';
		$output .= '</div>';	
		
	endwhile; endif; 
	
	genesis_structural_wrap( 'sidebar' );
	do_action( 'genesis_before_sidebar_widget_area' );
	echo $output;
	do_action( 'genesis_after_sidebar_widget_area' );
	genesis_structural_wrap( 'sidebar', 'close' );	
}


// remove default genesis loop
remove_action( 	'genesis_loop', 'genesis_do_loop'  );

// add custom loop for single portfolio page
add_action( 'genesis_loop', 'zp_single_portfolio_page'  );

function zp_single_portfolio_page(){
	global $post;
	
	$output = '';
	
	$output .= '<div class="content col-md-12 pull-left single_portfolio_main">';
	$output .= '<article '.genesis_attr( 'entry' ).'>';
		
	if (  have_posts(  )  ) : while (  have_posts(  )  ) : the_post(  );
	
		$image = get_the_post_thumbnail( $post->ID  , 'full', array('class'=> 'img-responsive', 'alt'	=> "", 'title'	=> "" ) );
		$image_url = wp_get_attachment_url(  get_post_thumbnail_id(  $post->ID  )  );
			
		// get video link
		$video_link = get_post_meta( $post->ID, 'video_link', true );
		
		// get portfolio attached images ids
		$portfolio_images = get_post_meta( $post->ID, 'portfolio_images', true );
			
	
		$output .= '<header '.genesis_attr( 'entry-header' ).'><h1 class="entry-title" itemprop="headline" >'.get_the_title().'</h1></header><div '.genesis_attr( 'entry-content' ).'>';
	
		
			
		if( $video_link ){
			$output .= '<div class="single_portfolio_container portfolio_video fitvids"><iframe src="'.zp_return_desired_link( $video_link ).'" width="710" height="400" ></iframe></div>';
		}elseif( $portfolio_images ){
			$output .= '<div class="single_portfolio_container single_portfolio_slide">';
			$output .= '<a href="'.$image_url.'"><span class="portfolio_icon_class"><i class="fa fa-picture-o"></i></span><img class="img-responsive" alt="placeholder image" src="'.$image_url.'" /></a>';
			$output .= zp_portfolio_image_attachments( $portfolio_images, 'single_portfolio_slide' );
			$output .= '</div>';
		}else{
			$output .= '<div class="single_portfolio_container gallery-popup"><a href="'.$image_url.'"><span class="portfolio_icon_class"><i class="fa fa-search"></i></span>'.$image.'</a></div>';
		}
				
	endwhile; endif;
	
	$output .= '</article></div>';
	
	echo $output;
}

/* Add related Portfolio aftet the content */
add_action( 'genesis_after_content', 'zp_add_related_portfolio' );
function zp_add_related_portfolio(){
	$output = '';
	$output .= '<div class="related_portfolio container box">';
	$output .= '<h3>'.__( 'Related Portfolio', 'dharma' ).'</h3>';
	$output .= zp_related_portfolio();
	$output .= '</div>';
	
	echo $output;
}

genesis();