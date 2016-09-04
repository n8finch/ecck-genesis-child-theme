// Script to Upload Image

jQuery( function( $ ){



	$( '.postbox-container' ).on( 'click', '.remove_button', function(e) {

		$(this).parents( 'p' ).find( 'input[type="text"]' ).val( '' );

		$(this).parents( 'p' ).find( '.button' ).show();

		$( this ).parents( 'p' ).find( '.upload_preview img' ).attr( 'src', '' );

	});



	$( '.postbox-container' ).on( 'click', '.upload_button', function() {

		//console.log('here');

		var old_send_to_editor = wp.media.editor.send.attachment;

		var input = this;

		wp.media.editor.send.attachment = function( props, attachment ) {

			//props.size = 'medium';

			props = wp.media.string.props( props, attachment );

			props.align = null;

			$(input).parents( 'p' ).find( 'input[type="text"]' ).val( props.src );

			$( input ).parents( 'p' ).find( '.upload_preview img' ).attr( 'src', props.src );

			wp.media.editor.send.attachment = old_send_to_editor;

		}

		wp.media.editor.open( input );

	} );
	
	/* Toogle Option */
	$('.slider_option').hide();	
	$('.video_option').hide();
	
	var value = $( '#zp-settings\\[zp_default_page_header\\] option:selected' ).val();
	
	if('slider' == value ){
		$('.slider_option').show();	
		$('.video_option').hide();
	}
		
	if( 'video' == value ){
		$('.slider_option').hide();	
		$('.video_option').show();
	}
	
	
	/* open option on change */
	$( '#zp-settings\\[zp_default_page_header\\]' ).change(function(){
		value = $(this).val();
		
		if('slider' == value ){
			$('.slider_option').show();	
			$('.video_option').hide();	
		}else if( 'video' == value ){
			$('.slider_option').hide();	
			$('.video_option').show();
		}else{
			$('.slider_option').hide();	
			$('.video_option').hide();
		}
	});
	
	/* Map option */
	$('.map_option').hide();
	if( $( '#zp-settings\\[zp_footer_map\\]' ).is(':checked') ){
		$('.map_option').show();
	}
	
	$( '#zp-settings\\[zp_footer_map\\]' ).click(function(){
		$('.map_option').toggle();
	});
} );

