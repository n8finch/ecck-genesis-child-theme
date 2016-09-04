<?php
/**-------------------------------------------------------------------
 * Theme Settings
--------------------------------------------------------------------*/

define( 'ZP_SETTINGS_FIELD', 'zp-settings' );

/**
* zpsettings_default_theme_options function.
*/
function zpsettings_default_theme_options() {
	$options = array(
		'zp_logo' => '',
		'zp_logo_height' => 64,
		'zp_logo_width' => 180,
		'zp_footer_text' 	=> '',
		'zp_default_page_header' => 'slider',
		'zp_footer_map' => 1,
		'zp_color_scheme' => ''
	);
	
	return apply_filters( 'zpsettings_default_theme_options', $options );
}
/**
* zpsettings_sanitize_inputs function.
*/ 
add_action( 'genesis_settings_sanitizer_init', 'zpsettings_sanitize_inputs' );
function zpsettings_sanitize_inputs() {
	genesis_add_option_filter( 'one_zero',
		ZP_SETTINGS_FIELD,
			array(
				'zp_footer_map'
			)
		);
		
	genesis_add_option_filter( 'no_html',ZP_SETTINGS_FIELD,
		array(
			'zp_logo_height',
			'zp_logo'
		)
	);
	
	genesis_add_option_filter( 'requires_unfiltered_html',	ZP_SETTINGS_FIELD,
		array(
			'zp_footer_text',
			'zp_footer_map_iframe'
		)
	);
}
/**
* zpsettings_register_settings function.
*/

add_action( 'admin_init', 'zpsettings_register_settings' );
function zpsettings_register_settings() {
	register_setting( ZP_SETTINGS_FIELD, ZP_SETTINGS_FIELD );
	add_option( ZP_SETTINGS_FIELD, zpsettings_default_theme_options() );
	
	if ( genesis_get_option( 'reset', ZP_SETTINGS_FIELD ) ) {
		update_option( ZP_SETTINGS_FIELD, zpsettings_default_theme_options() );
		genesis_admin_redirect( ZP_SETTINGS_FIELD, array( 'reset' => 'true' ) );
		exit;
	}
}

/**
* zpsettings_theme_settings_notice function.
*/
add_action( 'admin_notices', 'zpsettings_theme_settings_notice' );
function zpsettings_theme_settings_notice() {
	if ( ! isset( $_REQUEST['page'] ) || $_REQUEST['page'] != ZP_SETTINGS_FIELD )
		return;
	
	if ( isset( $_REQUEST['reset'] ) && 'true' == $_REQUEST['reset'] )
		echo '<div id="message" class="updated"><p><strong>' . __( 'Settings reset.', 'dharma' ) . '</strong></p></div>';
	elseif ( isset( $_REQUEST['settings-updated'] ) && 'true' == $_REQUEST['settings-updated'] )
	
	echo '<div id="message" class="updated"><p><strong>' . __( 'Settings saved.', 'dharma' ) . '</strong></p></div>';
}

/**
* zpsettings_theme_options function.
*/
add_action( 'admin_menu', 'zpsettings_theme_options' );
function zpsettings_theme_options() {
	global $_zpsettings_settings_pagehook;
	
	$_zpsettings_settings_pagehook = add_submenu_page( 'genesis', 'Dharma Settings', 'Dharma Settings', 'edit_theme_options', ZP_SETTINGS_FIELD, 'zpsettings_theme_options_page' );
	
	//add_action( 'load-'.$_zpsettings_settings_pagehook, 'zpsettings_settings_styles' );
	add_action( 'load-'.$_zpsettings_settings_pagehook, 'zpsettings_settings_scripts' );
	add_action( 'load-'.$_zpsettings_settings_pagehook, 'zpsettings_settings_boxes' );
}
/**
* zpsettings_settings_scripts function.
* This function enqueues the scripts needed for the ZP Settings settings page.
*/
function zpsettings_settings_scripts() {
	global $_zpsettings_settings_pagehook, $post;
	
	if( is_admin() ){
		wp_register_script( 'zp_image_upload', get_stylesheet_directory_uri() .'/include/upload/image-upload.js', array('jquery','media-upload','thickbox') );
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media( array( 'post' => $post ) );
		wp_enqueue_script('zp_image_upload');
	}
}

/**
* zpsettings_settings_boxes function.
*
* This function sets up the metaboxes to be populated by their respective callback functions.
*/
function zpsettings_settings_boxes() {
	global $_zpsettings_settings_pagehook;
	
	add_meta_box( 'zpsettings_theme_feature_settings', __( 'Page Header Settings', 'dharma' ), 'zpsettings_theme_feature_settings', $_zpsettings_settings_pagehook, 'main' ,'high');
	add_meta_box( 'zpsettings_page_map_settings', __( 'Page Map Settings', 'dharma' ), 'zpsettings_page_map_settings', $_zpsettings_settings_pagehook, 'main' ,'high');
	add_meta_box( 'zpsettings_general_settings', __( 'General Settings', 'dharma' ), 'zpsettings_general_settings', $_zpsettings_settings_pagehook, 'main' ,'high');
	add_meta_box( 'zpsettings_footer_settings', __( 'Footer Settings', 'dharma' ), 'zpsettings_footer_settings', $_zpsettings_settings_pagehook, 'main','high' );
}

/**
* zpsettings_home_settings function.
*
* Callback function for the ZP Settings Social Sharing metabox.
*
*/

function zpsettings_theme_feature_settings() { ?>
	<p><span class="description"><?php _e( 'This settings is for the slider in the header area','dharma' ); ?></span></p>
    <hr class="div">
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_page_header]"><?php _e( 'Select default feature', 'dharma' ); ?></label>
        <select name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_page_header]" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_page_header]">
			<option  value="slider" <?php selected( genesis_get_option( 'zp_default_page_header', ZP_SETTINGS_FIELD ), 'slider' ); ?>>Slider</option>
            <option  value="video" <?php selected( genesis_get_option( 'zp_default_page_header', ZP_SETTINGS_FIELD ), 'video' ); ?>>video</option>
        </select>
    </p>
    <div class="slider_option">
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_slideshow]"><?php _e( 'Select a slideshow', 'dharma' ); ?></label>
            <select name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_slideshow]" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_slideshow]">
                <?php
                    $slideshow_obj = get_terms('slideshow');
                    foreach ($slideshow_obj as $slidehow) {
                        ?><option value="<?php echo $slidehow->slug; ?>" <?php selected( genesis_get_option( 'zp_default_slideshow', ZP_SETTINGS_FIELD ), $slidehow->slug ); ?> > <?php echo $slidehow->name; ?></option><?php
                    }
                ?>
            </select>
        </p>
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_effect]"><?php _e( 'Select effect for slideshow', 'dharma' ); ?></label>
            <select name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_effect]" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_effect]">
                <option  value="fade" <?php selected( genesis_get_option( 'zp_default_effect', ZP_SETTINGS_FIELD ), 'fade' ); ?>>Fade</option>
                <option  value="slide" <?php selected( genesis_get_option( 'zp_default_effect', ZP_SETTINGS_FIELD ), 'slide' ); ?>>Slide</option>
            </select>            
        </p>
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_include_caption]"><?php _e( 'Enable Caption?', 'dharma' ); ?></label>
            <select name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_include_caption]" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_default_include_caption]">
                <option  value="true" <?php selected( genesis_get_option( 'zp_default_include_caption', ZP_SETTINGS_FIELD ), 'true' ); ?>>True</option>
                <option  value="false" <?php selected( genesis_get_option( 'zp_default_include_caption', ZP_SETTINGS_FIELD ), 'false' ); ?>>False</option>
            </select>            
        </p>
    </div>
    <div class="video_option">
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_mp4_url]"><?php _e( 'MP4 URL', 'dharma' ); ?></label>
            <input type="text" size="30" value="<?php echo genesis_get_option( 'zp_mp4_url', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_mp4_url]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_mp4_url]">
        </p>
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_webm_url]"><?php _e( 'WEBM URL', 'dharma' ); ?></label>
            <input type="text" size="30" value="<?php echo genesis_get_option( 'zp_webm_url', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_webm_url]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_webm_url]">
        </p>
        <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_ogv_url]"><?php _e( 'OGV URL', 'dharma' ); ?></label>
            <input type="text" size="30" value="<?php echo genesis_get_option( 'zp_ogv_url', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_ogv_url]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_ogv_url]">
        </p>
    </div>
    <p><span class="description"><?php _e( 'This settings applies through out the site.','dharma' ); ?></span></p>
<?php }

function zpsettings_page_map_settings() { ?>
   <p><span class="description"><?php _e( 'This settings is for the map feature in the footer area','dharma' ); ?></span></p>
    <p><input type="checkbox" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map]" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map]" value="1" <?php checked( 1, genesis_get_option( 'zp_footer_map', ZP_SETTINGS_FIELD ) ); ?> /> <label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map]"><?php _e( 'Check to enable map on the footer.', 'prestige' ); ?></label></p>
    <div class="map_option">
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_iframe]"><?php _e( 'Add Map Iframe.', 'prestige' ); ?><br>
	<textarea class="widefat" rows="5" cols="78" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_iframe]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_iframe]"><?php echo genesis_get_option( 'zp_footer_map_iframe', ZP_SETTINGS_FIELD ); ?></textarea>
	</label>
	</p>
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_padding]"><?php _e( 'Add footer map padding in percentage. e.g. 30%', 'dharma' ); ?></label>
            <input type="text" size="30" value="<?php echo genesis_get_option( 'zp_footer_map_padding', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_padding" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_map_padding]">
        </p>
        </div>
    <hr class="div">
    <p><span class="description"><?php _e( 'This settings applies through out the site.','dharma' ); ?></span></p>

<?php }

function zpsettings_general_settings() { ?> 

	<p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_color_scheme]"><?php _e( 'Select color scheme:','dharma' );?></label>
    <select id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_color_scheme]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_color_scheme]">
    <option  value="" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), '' ); ?>>Default</option>
    <option  value="alizarin" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'alizarin' ); ?>>Alizarin</option>
    <option  value="amethyst" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'amethyst' ); ?>>Amethyst</option>
    <option  value="belize_hole" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'belize_hole' ); ?>>Belize Hole</option>
    <option  value="carrot" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'carrot' ); ?>>Carrot</option>
    <option  value="emerald" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'emerald' ); ?>>Emerald</option>
    <option  value="greensea" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'greensea' ); ?>>Greensea</option>
    <option  value="nephritis" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'nephritis' ); ?>>Nephritis</option>
    <option  value="orange" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'orange' ); ?>>Orange</option>
    <option  value="pomegranate" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'pomegranate' ); ?>>Pomegranate</option>
    <option  value="peter_river" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'peter_river' ); ?>>Peter River</option>
    <option  value="pumpkin" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'pumpkin' ); ?>>Pumpkin</option>
    <option  value="turquoise" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'turquoise' ); ?>>Turquoise</option>
    <option  value="wisteria" <?php selected( genesis_get_option( 'zp_color_scheme', ZP_SETTINGS_FIELD ), 'wisteria' ); ?>>Wisteria</option>
    </select></p>
    
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo]"><?php _e( 'Upload Custom Logo.', 'dharma' ); ?></label><input type="text" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo]" value="<?php echo  genesis_get_option( 'zp_logo', ZP_SETTINGS_FIELD ); ?>" /><input id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_upload_button]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_upload_button]" type="button" class="button upload_button" value="<?php _e( 'Upload Logo', 'dharma' ); ?>" />
    <input name="zp_remove_button" type="button"  class="button remove_button" value="<?php _e( 'Remove Logo', 'dharma' ); ?>" />
    <span class="upload_preview" style="display: block;"><img style="max-width:100%;" src="<?php echo genesis_get_option( 'zp_logo', ZP_SETTINGS_FIELD ); ?>" /></span>
    </p>
    
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_width]"><?php _e( 'Custom Logo Width in pixel. e.g. 200', 'dharma' ); ?></label><input type="text" size="30" value="<?php echo genesis_get_option( 'zp_logo_width', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_width]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_width]">
	</p>
    
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_height]"><?php _e( 'Custom Logo Height in pixel. e.g. 200', 'dharma' ); ?></label>
    <input type="text" size="30" value="<?php echo genesis_get_option( 'zp_logo_height', ZP_SETTINGS_FIELD ); ?>" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_height]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_logo_height]">
    </p>
    
    <p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_favicon]"><?php _e( 'Upload Custom Favicon.', 'dharma' ); ?></label>
    <input type="text" id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_favicon]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_favicon]" value="<?php echo  genesis_get_option( 'zp_favicon', ZP_SETTINGS_FIELD ); ?>" />
    
    <input id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_favicon_upload_button]" name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_favicon_upload_button]" type="button" class="button upload_button" value="<?php _e( 'Upload Favicon', 'dharma' ); ?>" /><input name="zp_remove_button" type="button"  class="button remove_button" value="<?php _e( 'Remove Favicon', 'dharma' ); ?>" /> 
  
    <span class="upload_preview" style="display: block;">
		<img style="max-width:100%;" src="<?php echo genesis_get_option( 'zp_favicon', ZP_SETTINGS_FIELD ); ?>" />
	</span>
    </p>
    <p><span class="description"><?php _e( 'This is the general settings.','dharma' ); ?></span></p>
<?php }

function zpsettings_footer_settings() { ?>
	<p><label for="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_text]"><?php _e( 'Footer Text', 'dharma' ); ?><br>
    <textarea rows="3"  id="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_text]" class="widefat"  name="<?php echo ZP_SETTINGS_FIELD; ?>[zp_footer_text]"><?php echo genesis_get_option( 'zp_footer_text', ZP_SETTINGS_FIELD ); ?></textarea>
	<br><small><strong><?php _e( 'Enter your site copyright here.', 'dharma' ); ?></strong></small>
	</label>
	</p>    
<?php }

/* Replace the 'Insert into Post Button inside Thickbox'
------------------------------------------------------------ */

function zp_replace_thickbox_text($translated_text, $text ) {
	if ( 'Insert into Post' == $text ) {$referer = strpos( wp_get_referer(), ZP_SETTINGS_FIELD );
		if ( $referer != '' ) {
				return __('Insert Image!', 'dharma' );
		}
	}
	
	return $translated_text;
}

/* Hook to filter Insert into Post Button in thickbox
------------------------------------------------------------ */
function zp_change_insert_button_text() {
	add_filter( 'gettext', 'zp_replace_thickbox_text' , 1, 2 );
}
add_action( 'admin_init', 'zp_change_insert_button_text' );

/**
 * zpsettings_settings_layout_columns function.
 * This function sets the column layout to one for the ZP Settings settings page.
 */

add_filter( 'screen_layout_columns', 'zpsettings_settings_layout_columns', 10, 2 );
function zpsettings_settings_layout_columns( $columns, $screen ) {
	global $_zpsettings_settings_pagehook;
	if ( $screen == $_zpsettings_settings_pagehook ) {
		$columns[$_zpsettings_settings_pagehook] = 2;
	}
	return $columns;
}

/**
 * zpsettings_theme_options_page function.
 *
 * This function displays the content for the ZP Settings settings page, builds the forms and outputs the metaboxes.
 *
 */
function zpsettings_theme_options_page() { 
	global $_zpsettings_settings_pagehook, $screen_layout_columns;
	
	$screen = get_current_screen();
	
	$width = "width: 100%;";
	$hide2 = $hide3 = " display: none;";
	?>
    
    <div id="zpsettings" class="wrap genesis-metaboxes">
    	<form method="post" action="options.php">
			<?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
			<?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
			
			<?php settings_fields( ZP_SETTINGS_FIELD ); ?>
			<?php screen_icon( 'options-general' ); ?>
            <h2 style="width: 100%; margin-bottom: 10px;" ><?php _e( 'Dharma Settings', 'dharma' ); ?>
            <span style="float: right; text-align: center;"><input type="submit" class="button-primary genesis-h2-button" value="<?php _e( 'Save Settings', 'dharma' ) ?>" style="vertical-align: top;" />
            <input type="submit" class="button genesis-h2-button" name="<?php echo ZP_SETTINGS_FIELD; ?>[reset]" value="<?php _e( 'Reset Settings', 'dharma' ); ?>" onclick="return genesis_confirm('<?php echo esc_js( __( 'Are you sure you want to reset?', 'dharma' ) ); ?>');" /></span></h2>
            
            <div class="metabox-holder">
            	<div class="postbox-container" style="<?php echo $width; ?>">
					<?php do_meta_boxes( $_zpsettings_settings_pagehook, 'main', null ); ?>
                </div>
            </div>
            
            <div class="bottom-buttons">
            <input type="submit" class="button-primary genesis-h2-button" value="<?php _e( 'Save Settings', 'dharma' ) ?>" />
            <input type="submit" class="button genesis-h2-button" name="<?php echo ZP_SETTINGS_FIELD; ?>[reset]" value="<?php _e( 'Reset Settings', 'dharma' ); ?>" onclick="return genesis_confirm('<?php echo esc_js( __( 'Are you sure you want to reset?', 'dharma' ) ); ?>');" />
            </div>  
         </form>
         </div>

	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			// postboxes setup
			postboxes.add_postbox_toggles('<?php echo $_zpsettings_settings_pagehook; ?>');
		});
		//]]>
	</script>

<?php }