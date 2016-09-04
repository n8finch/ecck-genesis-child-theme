<?php
/* Shortcode String Translations */

function zp_shortcode_label(){

$zp_shortcode_label  = array(
	// pricing table
	'pricing' => array(
		'menu' => __( 'Pricing','dharma' ),
		'header_title' => __( 'Insert Pricing Shortcode','dharma' ),
		'content' => array(
			'columns' => array(
				'label' => __( 'Columns','dharma' ),
				'tooltip' => __( 'Pricing Table Column. Option: 2, 3, 4','dharma' ),
				'values' => array( 'Two', 'Three', 'Four' )
			)
		)
	),
	// Lead Text
	'lead' => array(
		'menu' => __('Lead Text','dharma' ),
		'header_title' => __( 'Insert Lead Text Shortcode','dharma'),
		'content' => array(
			'text' => array(
				'label' => __( 'Content here','dharma' ),
				'tooltip' => __( 'Styled paragragh text','dharma' )
			)
		)
	),
	// Social Icons
	'social' => array(
		'menu' => __('Social Icons','dharma' ),
		'header_title' => __( 'Insert Social Icons Shortcode','dharma'),
		'content' => array(
			'align' => array(
				'label' => __( 'Alignment','dharma' ),
				'tooltip' => __( 'Select social alignment','dharma' ),
				'values' => array( 'Left', 'Right' )
			),
			'target' => array(
				'label' => __( 'Link Target','dharma' ),
				'tooltip' => __( 'Select link target','dharma' ),
				'values' => array( '_blank', '_self', '_parent', '_top' )
			),
			'dribbble' => array(
				'label' => __( 'Dribbble','dharma' ),
				'tooltip' => __( 'Add dribbble url','dharma' )
			),
			'flickr' => array(
				'label' => __( 'Flickr','dharma' ),
				'tooltip' => __( 'Add flickr url','dharma' )
			),
			'github' => array(
				'label' => __( 'Github','dharma' ),
				'tooltip' => __( 'Add github url','dharma' )
			),
			'pinterest' => array(
				'label' => __( 'Pinterest','dharma' ),
				'tooltip' => __( 'Add pinterest url','dharma' )
			),
			'twitter' => array(
				'label' => __( 'Twitter','dharma' ),
				'tooltip' => __( 'Add twitter url','dharma' )
			),
			'facebook' => array(
				'label' => __( 'Facebook','dharma' ),
				'tooltip' => __( 'Add facebook url','dharma' )
			),
			'google' => array(
				'label' => __( 'Google+','dharma' ),
				'tooltip' => __( 'Add google+ url','dharma' )
			),
			'skype' => array(
				'label' => __( 'Skype','dharma' ),
				'tooltip' => __( 'Add skype url','dharma' )
			),
			'tumblr' => array(
				'label' => __( 'Tumblr','dharma' ),
				'tooltip' => __( 'Add tumblr url','dharma' )
			),
			'vimeo' => array(
				'label' => __( 'Vimeo','dharma' ),
				'tooltip' => __( 'Add vimeo url','dharma' )
			),
			'youtube' => array(
				'label' => __( 'Youtube','dharma' ),
				'tooltip' => __( 'Add youtube url','dharma' )
			),
			'linkedin' => array(
				'label' => __( 'LinkedIn','dharma' ),
				'tooltip' => __( 'Add linkedin url','dharma' )
			),
		)
	),
	// Contact
	'contact' => array(
		'menu' => __('Contact','dharma' ),
		'header_title' => __( 'Insert Contact Shortcode','dharma'),
		'content' => array(
			'content' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'Add some contact form shortcodes here. You can also use any other shortcodes here.','dharma' )
			)
		)
	),
	// Blog
	'blog' => array(
		'menu' => __('Blog','dharma' ),
		'header_title' => __( 'Insert Blog Shortcode','dharma'),
		'content' => array(
			'columns' => array(
				'label' => __( 'Columns','dharma' ),
				'tooltip' => __( 'Select blog section columns.','dharma' ),
				'values' => array( 'Two', 'Three', 'Four' )
			),
			'items' => array(
				'label' => __( 'Items','dharma' ),
				'tooltip' => __( 'How many items to display.','dharma' )
			),
			'category' => array(
				'label' => __( 'Category','dharma' ),
				'tooltip' => __( 'Select a post category to display. Leave empty to display all.','dharma' )
			),
			'exclude_ids' => array(
				'label' => __( 'Exclude_ids','dharma' ),
				'tooltip' => __( 'List the ids of the category to exclude in the query.','dharma' )
			)
		)
	),
	// Team
	'team' => array(
		'menu' => __('Team','dharma' ),
		'header_title' => __( 'Insert Team Shortcode','dharma'),
		'content' => array(
			'columns' => array(
				'label' => __( 'Columns','dharma' ),
				'tooltip' => __( 'Select team section columns.','dharma' ),
				'values' => array( 'Two', 'Three', 'Four' )
			),
			'align' => array(
				'label' => __( 'Align','dharma' ),
				'tooltip' => __( 'Select content alignment.','dharma' ),
				'values' => array( 'Center', 'Left', 'Right' )
			),
		)
	),
	// Dismissable Text
	'dismissable' => array(
		'menu' => __('Dismissable Text','dharma' ),
		'header_title' => __( 'Insert Dismissable Text Shortcode','dharma'),
		'content' => array(
			'class' => array(
				'label' => __( 'Contextual Class','dharma' ),
				'tooltip' => __( 'Select class for dismissable alert box.','dharma' ),
				'values' => array( 'alert-success', 'alert-info', 'alert-warning', 'alert-danger' )
			),
			'text' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'You can add text or a shortcode here.','dharma' )
			),
		)
	),
	// Alert 
	'alertbox' => array(
		'menu' => __('Alert','dharma' ),
		'header_title' => __( 'Insert Alert Shortcode','dharma'),
		'content' => array(
			'class' => array(
				'label' => __( 'Contextual Class','dharma' ),
				'tooltip' => __( 'Select class for alert box.','dharma' ),
				'values' => array( 'alert-success', 'alert-info', 'alert-warning', 'alert-danger' )
			),
			'text' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'You can add text or a shortcode here.','dharma' )
			),
		)
	),
	// Acccordion 
	'accordion' => array(
		'menu' => __('Accordion','dharma' ),
		'header_title' => __( 'Insert Accordion Shortcode','dharma'),
		'content' => array(
			'id1' => array(
				'label' => __( 'First Tab ID','dharma' ),
				'tooltip' => __( 'Add first tab ID. This must be unique and one word only.','dharma' )
			),
			'title1' => array(
				'label' => __( 'First Tab Title','dharma' ),
				'tooltip' => __( 'Add first tab title.','dharma' )
			),
			'content1' => array(
				'label' => __( 'First Tab Content','dharma' ),
				'tooltip' => __( 'Add first tab content.','dharma' )
			),
			'id2' => array(
				'label' => __( 'Second Tab ID','dharma' ),
				'tooltip' => __( 'Add second tab ID. This must be unique and one word only.','dharma' )
			),
			'title2' => array(
				'label' => __( 'Second Tab Title','dharma' ),
				'tooltip' => __( 'Add second tab title.','dharma' )
			),
			'content2' => array(
				'label' => __( 'Second Tab Content','dharma' ),
				'tooltip' => __( 'Add second tab content.','dharma' )
			),
			'id3' => array(
				'label' => __( 'Third Tab ID','dharma' ),
				'tooltip' => __( 'Add third tab ID. This must be unique and one word only.','dharma' )
			),
			'title3' => array(
				'label' => __( 'Third Tab Title','dharma' ),
				'tooltip' => __( 'Add third tab title.','dharma' )
			),
			'content3' => array(
				'label' => __( 'Third Tab Content','dharma' ),
				'tooltip' => __( 'Add third tab content.','dharma' )
			),
			
		)
	),
	// Buttons 
	'buttons' => array(
		'menu' => __('Button','dharma' ),
		'header_title' => __( 'Insert Button Shortcode','dharma'),
		'content' => array(
			'class' => array(
				'label' => __( 'Class','dharma' ),
				'tooltip' => __( 'Select class for buttons.','dharma' ),
				'values' => array( 'btn-default', 'btn-primary', 'btn-success', 'btn-info','btn-warning','btn-danger','btn-inverse' )
			),
			'size' => array(
				'label' => __( 'Size','dharma' ),
				'tooltip' => __( 'Select button size.','dharma' ),
				'values' => array( 'Extra Large', 'Large', 'Medium', 'Small','Extra Small' )
			),
			'inline' => array(
				'label' => __( 'Inline Button','dharma' ),
				'tooltip' => __( 'Select true if the button should work inline.','dharma' ),
				'values' => array( 'True', 'False')
			),
			'button_link' => array(
				'label' => __( 'Button Link','dharma' ),
				'tooltip' => __( 'Add button link.','dharma' )
			),
			'button_label' => array(
				'label' => __( 'Button Name','dharma' ),
				'tooltip' => __( 'Add button name.','dharma' )
			),
			'button_target' => array(
				'label' => __( 'Link Target','dharma' ),
				'tooltip' => __( 'Select button link target.','dharma' ),
				'values' => array( '_blank', '_self', '_top', '_parent' )
			)
		)
	),
	// Portfolio 
	'portfolio' => array(
		'menu' => __('Portfolio','dharma' ),
		'header_title' => __( 'Insert Portfolio Shortcode','dharma'),
		'content' => array(
			'preselect_cat' => array(
				'label' => __( 'Pre-select Category','dharma' ),
				'tooltip' => __( 'Category that will be loaded first in portfolio section. Leave empty to display all items.','dharma' ),
			),
			'lightbox' => array(
				'label' => __( 'Enable Lightbox','dharma' ),
				'tooltip' => __( 'Select true to enable portfolio lightbox, false to enable portfolio link.','dharma' ),
				'values' => array( 'True', 'False')
			)
		)
	),
	// Testimonial 
	'testimonial' => array(
		'menu' => __('Testimonial','dharma' ),
		'header_title' => __( 'Insert Testimonial Shortcode','dharma'),
		'content' => array()
	),
	// Video Section 
	'video_section' => array(
		'menu' => __('Video Section','dharma' ),
		'header_title' => __( 'Insert Video Section Shortcode','dharma'),
		'content' => array(
			'src' => array(
				'label' => __( 'Video URL','dharma' ),
				'tooltip' => __( 'Add video URL. e.g. //player.vimeo.com/video/82495711','dharma' ),
			),
			'title' => array(
				'label' => __( 'Section Title','dharma' ),
				'tooltip' => __( 'This will be s section title.','dharma' )
			),
			'height' => array(
				'label' => __( 'Video container height.','dharma' ),
				'tooltip' => __( 'Set video container height. e.g. 200','dharma' )
			),
			'width' => array(
				'label' => __( 'Video container width.','dharma' ),
				'tooltip' => __( 'Set video container width. e.g. 300','dharma' )
			),
			'desc' => array(
				'label' => __( 'Short Description','dharma' ),
				'tooltip' => __( 'Video Section Description','dharma' )
			),
			'position' => array(
				'label' => __( 'Video Position.','dharma' ),
				'tooltip' => __( 'Alignment of the video','dharma' ),
				'values' => array( 'Left', 'Right')
			),
			'content' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'Video section content. Works also with shortcodes','dharma' )
			),
		)
	),
	// Slider Section 
	'slider_section' => array(
		'menu' => __('Slider Section','dharma' ),
		'header_title' => __( 'Insert Slider Section Shortcode','dharma'),
		'content' => array(
			'slidename' => array(
				'label' => __( 'Slider Name','dharma' ),
				'tooltip' => __( 'Name of the slider. This serves as a slider ID. This must be unique and one word only.','dharma' ),
			),
			'slideshow' => array(
				'label' => __( 'Slideshow','dharma' ),
				'tooltip' => __( 'This is a slide category. You can see the slideshows in Dashboard -> Slide -> Slideshows. You must use the slug.','dharma' )
			),
			'caption' => array(
				'label' => __( 'Enable Caption?','dharma' ),
				'tooltip' => __( 'Select true to display caption on top of the slide images','dharma' ),
				'values' => array( 'True', 'False')
			),
			'title' => array(
				'label' => __( 'Section Title','dharma' ),
				'tooltip' => __( 'This is the section title','dharma' )
			),
			'desc' => array(
				'label' => __( 'Short Description','dharma' ),
				'tooltip' => __( 'Slider Section Description','dharma' )
			),
			'position' => array(
				'label' => __( 'Slider Position.','dharma' ),
				'tooltip' => __( 'Position of the Slider','dharma' ),
				'values' => array( 'Left', 'Right')
			),
			'content' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'Slider section content. Works also with shortcodes','dharma' )
			),
		)
	),
	// Image Section 
	'image_section' => array(
		'menu' => __('Image Section','dharma' ),
		'header_title' => __( 'Insert Image Section Shortcode','dharma'),
		'content' => array(
			'image_url' => array(
				'label' => __( 'Image URL','dharma' ),
				'tooltip' => __( 'Paste Image URL here.','dharma' ),
			),
			'image_link' => array(
				'label' => __( 'Link','dharma' ),
				'tooltip' => __( 'Place here the link where you want to go when the image is clicked. If empty, it will be in lightbox.','dharma' )
			),
			'title' => array(
				'label' => __( 'Section Title','dharma' ),
				'tooltip' => __( 'This is the section title','dharma' )
			),
			'desc' => array(
				'label' => __( 'Short Description','dharma' ),
				'tooltip' => __( 'Add short description to the section','dharma' )
			),
			'position' => array(
				'label' => __( 'Image Position.','dharma' ),
				'tooltip' => __( 'Position of the image','dharma' ),
				'values' => array( 'Left', 'Right')
			),
			'content' => array(
				'label' => __( 'Content','dharma' ),
				'tooltip' => __( 'Image section content. Works also with shortcodes.','dharma' )
			),
		)
	),
	// Services 
	'services' => array(
		'menu' => __('Service','dharma' ),
		'header_title' => __( 'Insert Service Shortcode','dharma'),
		'content' => array(
			'columns' => array(
				'label' => __( 'Columns','dharma' ),
				'tooltip' => __( 'Select columns','dharma' ),
				'values' => array( 'Two', 'Three', 'Four')
			),
			'align' => array(
				'label' => __( 'Alignment','dharma' ),
				'tooltip' => __( 'Select content alignment.','dharma' ),
				'values' => array( 'Center', 'Left', 'Right')
			),
			'items' => array(
				'label' => __( 'Number of Items','dharma' ),
				'tooltip' => __( 'Number of items to display.','dharma' ),
			)
		)
	),
	// Columns 
	'columns' => array(
		'menu' => __('Columns','dharma' ),
		'header_title' => __( 'Insert column Shortcode','dharma'),
		'content' => array(	),
		'submenu' => array(
			'one_half' => __('One Half','dharma' ),
			'one_third' => __('One Third','dharma' ),
			'one_fourth' => __('One Fourth','dharma' ),
			'column_grid_1' => __('Column Grid 1','dharma' ),
			'column_grid_2' => __('Column Grid 2','dharma' ),
			'column_grid_3' => __('Column Grid 3','dharma' ),
			'column_grid_4' => __('Column Grid 4','dharma' ),
			'column_grid_5' => __('Column Grid 5','dharma' ),
			'column_grid_6' => __('Column Grid 6','dharma' ),
			'column_grid_7' => __('Column Grid 7','dharma' ),
			'column_grid_8' => __('Column Grid 8','dharma' ),
			'column_grid_9' => __('Column Grid 9','dharma' ),
			'column_grid_10' => __('Column Grid 10','dharma' ),
			'column_grid_11' => __('Column Grid 11','dharma' ),
			'column_grid_12' => __('Column Grid 12','dharma' ),
		)

	),
	// Tooltip 
	'tooltip' => array(
		'menu' => __('Tooltip','dharma' ),
		'header_title' => __( 'Insert Tooltip Shortcode','dharma'),
		'content' => array(
			'position' => array(
				'label' => __( 'Tooltip Position','dharma' ),
				'tooltip' => __( 'Select tooltip position.','dharma' ),
				'values' => array( 'Top', 'Bottom', 'Left', 'Right' )
			),
			'title' => array(
				'label' => __( 'Tooltip','dharma' ),
				'tooltip' => __( 'Text that will appear in tooltip.','dharma' )
			),
			'text' => array(
				'label' => __( 'Text','dharma' ),
				'tooltip' => __( 'Text that will have a tooltip.','dharma' ),
			)
		)
	),
	// Popover 
	'popover' => array(
		'menu' => __('Popover','dharma' ),
		'header_title' => __( 'Insert Popover Shortcode','dharma'),
		'content' => array(
			'position' => array(
				'label' => __( 'Popover Position','dharma' ),
				'tooltip' => __( 'Select popover position.','dharma' ),
				'values' => array( 'Top', 'Bottom', 'Left', 'Right' )
			),
			'title' => array(
				'label' => __( 'Popover Title','dharma' ),
				'tooltip' => __( 'Popover Title.','dharma' )
			),
			'label' => array(
				'label' => __( 'Popover Content','dharma' ),
				'tooltip' => __( 'Content in the popover.','dharma' )
			),
			'text' => array(
				'label' => __( 'Text','dharma' ),
				'tooltip' => __( 'Text that will have a tooltip.','dharma' ),
			)
		)
	),
	// Tabs 
	'tab' => array(
		'menu' => __('Tab','dharma' ),
		'header_title' => __( 'Insert Tab Shortcode','dharma'),
		'content' => array(
			'id1' => array(
				'label' => __( 'First Tab ID','dharma' ),
				'tooltip' => __( 'Add first tab ID. This must be unique and one word only.','dharma' )
			),
			'title1' => array(
				'label' => __( 'First Tab Title','dharma' ),
				'tooltip' => __( 'Add first tab title.','dharma' )
			),
			'content1' => array(
				'label' => __( 'First Tab Content','dharma' ),
				'tooltip' => __( 'Add first tab content.','dharma' )
			),
			'id2' => array(
				'label' => __( 'Second Tab ID','dharma' ),
				'tooltip' => __( 'Add second tab ID. This must be unique and one word only.','dharma' )
			),
			'title2' => array(
				'label' => __( 'Second Tab Title','dharma' ),
				'tooltip' => __( 'Add second tab title.','dharma' )
			),
			'content2' => array(
				'label' => __( 'Second Tab Content','dharma' ),
				'tooltip' => __( 'Add second tab content.','dharma' )
			),
			'id3' => array(
				'label' => __( 'Third Tab ID','dharma' ),
				'tooltip' => __( 'Add third tab ID. This must be unique and one word only.','dharma' )
			),
			'title3' => array(
				'label' => __( 'Third Tab Title','dharma' ),
				'tooltip' => __( 'Add third tab title.','dharma' )
			),
			'content3' => array(
				'label' => __( 'Third Tab Content','dharma' ),
				'tooltip' => __( 'Add third tab content.','dharma' )
			),
			
		)
	),
	// Modal 
	'modal' => array(
		'menu' => __('Modal Box','dharma' ),
		'header_title' => __( 'Insert Modal Shortcode','dharma'),
		'content' => array(
			'modal_name' => array(
				'label' => __( 'Modal Name/ID.','dharma' ),
				'tooltip' => __( 'This serves as the modal ID. This must be unique. Note: Use underscore (_) for a long word name.','dharma' )
			),
			'btn_label' => array(
				'label' => __( 'Modal Trigger Label','dharma' ),
				'tooltip' => __( 'Modal Trigger/Button Label.','dharma' )
			),
			'btn_size' => array(
				'label' => __( 'Modal Trigger/Button Size','dharma' ),
				'tooltip' => __( 'Select trigger/button size.','dharma' ),
				'values' => array( 'Extra Large', 'Large', 'Medium', 'Small','Extra Small' )
			),
			'btn_class' => array(
				'label' => __( 'Modal Trigger/Button Class','dharma' ),
				'tooltip' => __( 'Select trigger/button class.','dharma' ),
				'values' => array( 'btn-default', 'btn-primary', 'btn-success', 'btn-info','btn-warning','btn-danger','btn-inverse' )
			),
			'modal_title' => array(
				'label' => __( 'Modal Title','dharma' ),
				'tooltip' => __( 'Modal box title.','dharma' )
			),
			'modal_content' => array(
				'label' => __( 'Modal Content','dharma' ),
				'tooltip' => __( 'Add modal content here. Also work with shortcode.','dharma' )
			),
			'modal_footer' => array(
				'label' => __( 'Modal Footer','dharma' ),
				'tooltip' => __( 'Add modal footer content here. Also work with shortcode.','dharma' )
			)			
		)
	),
	// Client Carousel
	'client_carousel' => array(
		'menu' => __('Client Carousel','dharma' ),
		'header_title' => __( 'Insert Client Carousel Shortcode','dharma'),
		'content' => array(
			'name' => array(
				'label' => __( 'Add Carousel Name','dharma' ),
				'tooltip' => __( 'This serves as carousel ID. It must be unique and avoid using spaces. Ex. "client_carousel".','dharma' )
			)			
		)
	),
);

return $zp_shortcode_label;
}