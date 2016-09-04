<?php
/**
 * Template Name: Home
 */
 
// Force homepage to full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// custom loop
remove_action(	'genesis_loop', 'genesis_do_loop' );
add_action(	'genesis_loop', 'zp_homepage_template' );
function zp_homepage_template() {
	global $post;
	
	$recent = new WP_Query(array('post_type'=> 'section', 'showposts' => '-1','order'=>'DESC' ));
	
	while($recent->have_posts()) : $recent->the_post();
		$include_header_label= '';
		$text_color = '';
		$section_css = '';
		$title = get_the_title();
		$nav_anchor = get_post_meta( $post->ID, 'navigation_anchor', true  );
		$section_intro = get_post_meta( $post->ID, 'section_intro', true  );
		$include_header_label = get_post_meta( $post->ID, 'include_header_label', true  );
		$content = get_the_content();
		?>
        
        <section id="<?php echo $nav_anchor; ?>" class="section_wrapper" >
        <header>
				<?php
					if( $include_header_label == '' || $include_header_label == 'yes' ){
						if( $title ){
							echo '<h1>'.$title.'</h1>';
							}
							if( $section_intro ){
							echo '<p class="lead">'.do_shortcode( $section_intro ).'</p>';
							}
						}
					?>
				</header>
		<?php echo do_shortcode( the_content() );?>
		</section>
<?php
endwhile; wp_reset_query();
}

genesis();