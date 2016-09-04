<?php
/**
 * Template: Blog
 */

remove_action(	'genesis_loop', 'genesis_do_loop' );

add_action(	'genesis_loop', 'zp_custom_blog_page' );

function zp_custom_blog_page(){
	global $post, $wp_query ;	
			
	$include = genesis_get_option( 'blog_cat' );
	$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

		//* Arguments
		$args = 	array(
				'cat'              => $include,
				'category__not_in' => $exclude,
				'posts_per_page'        => genesis_get_option( 'blog_cat_num' ),
				'paged'            => $paged
		);

	
	$wp_query = new WP_Query( $args  );
		
	
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		$content = get_the_content();
		$title = get_the_title(  );
		$permalink=get_permalink(  );
		
		do_action( 'genesis_before_entry' );
		printf( '<article %s>', genesis_attr( 'entry' ) );
		// check post format and call template
		
		$format = get_post_format();
		if( $format == 'quote' ){
			echo zp_quote();
		}else if( $format == 'link' ){
			echo zp_link();
		}else if( $format == 'video' ){
			wp_enqueue_script('jquery_fitvids');
			echo '<div class="media_container">';
			
			$embed = get_post_meta( $post->ID, 'zp_video_format_embed', true);
			if( !empty( $embed ) ) {
				echo '<div class="video_container">'.stripslashes(htmlspecialchars_decode($embed)).'</div>';
			}else {
				echo zp_video($post->ID, 'blog_gallery'  );
			}
			
			echo '</div>';
		}else if( $format == 'gallery' ){
			echo '<div class="media_container">';
			echo zp_gallery( $post->ID , 'blog_gallery' );
			echo '</div>';
		}else if( $format == 'audio' ){
			echo '<div class="media_container">';
			$embed = get_post_meta( $post->ID, 'zp_embed_audio', true);
				if( !empty( $embed ) ) {
					echo stripslashes(htmlspecialchars_decode($embed));
				}else{
					echo zp_audio($post->ID, 'blog_gallery' );
				}
				echo '</div>';
		}else{
			$image = genesis_get_image(  array(  'format' => 'url', 'size' => genesis_get_option(  'image_size'  )   )   );	
			if( genesis_get_option( 'content_archive_thumbnail' ) ){
				echo '<div class="media_container">';
				if($image){
					printf(  '<a href = "%s" rel = "bookmark"><img class = "post-image" src = "%s" alt="" /></a>', get_permalink(   ), $image   );
				}
				echo '</div>';
			}
		}
		
		if( $format != 'quote' && $format != 'link' ){
			do_action( 'genesis_entry_header' );
			do_action( 'genesis_before_entry_content' );
			printf( '<div %s>', genesis_attr( 'entry-content' ) );
			genesis_do_post_content();
			echo '</div>';
		}
		
		do_action( 'genesis_after_entry_content' );
		
		// entry-footer is removed in blog archive
		//do_action( 'genesis_entry_footer' );
		echo '</article>';
		do_action( 'genesis_after_entry' );
		
		endwhile; //* end of one post
		do_action( 'genesis_after_endwhile' );
	else : //* if no posts exist
		do_action( 'genesis_loop_else' );
	endif; //* end loop 
	
	//* Restore original query
	
	wp_reset_query();	
}

genesis();