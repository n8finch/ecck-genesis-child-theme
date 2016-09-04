(function() {		
   tinymce.create('tinymce.plugins.ZPShortcodes', {
	  ZPShortcodes: function(editor, url) {
	  	editor.addButton( 'zp_button', {
            title: 'ZP Shortcodes',
            type: 'menubutton',
            icon: 'icon zp_shortcode_icon',
            menu: [
  				{ // Accordion Shortcode
					text: zp_shortcode_label.accordion.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.accordion.header_title,
							minWidth: 500,
							height: 400,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id1',
                                label: zp_shortcode_label.accordion.content.id1.label,
								tooltip: zp_shortcode_label.accordion.content.id1.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title1',
                                label: zp_shortcode_label.accordion.content.title1.label,
								tooltip: zp_shortcode_label.accordion.content.title1.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content1',
                                label: zp_shortcode_label.accordion.content.content1.label,
								tooltip: zp_shortcode_label.accordion.content.content1.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id2',
                                label: zp_shortcode_label.accordion.content.id2.label,
								tooltip: zp_shortcode_label.accordion.content.id2.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title2',
                                label: zp_shortcode_label.accordion.content.title2.label,
								tooltip: zp_shortcode_label.accordion.content.title2.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content2',
                                label: zp_shortcode_label.accordion.content.content2.label,
								tooltip: zp_shortcode_label.accordion.content.content2.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id3',
                                label: zp_shortcode_label.accordion.content.id3.label,
								tooltip: zp_shortcode_label.accordion.content.id3.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title3',
                                label: zp_shortcode_label.accordion.content.title3.label,
								tooltip: zp_shortcode_label.accordion.content.title3.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content3',
                                label: zp_shortcode_label.accordion.content.content3.label,
								tooltip: zp_shortcode_label.accordion.content.content3.tooltip,						
							},
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[accordion_wrap][accordion id="'+e.data.id1+'" title="'+e.data.title1+'"]'+e.data.content1+'[/accordion][accordion id="'+e.data.id2+'" title="'+e.data.title2+'"]'+e.data.content2+'[/accordion][accordion id="'+e.data.id3+'" title="'+e.data.title3+'"]'+e.data.content3+'[/accordion][/accordion_wrap]');
                            }
                        });
                    }	
				},
				{ // Alert Text Shortcode
					text: zp_shortcode_label.alertbox.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.alertbox.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'class',
                                label: zp_shortcode_label.alertbox.content.class.label,
								tooltip: zp_shortcode_label.alertbox.content.class.tooltip,
								'values': [
                                    {text: zp_shortcode_label.alertbox.content.class.values[0], value: 'alert-success'},
                                    {text: zp_shortcode_label.alertbox.content.class.values[1], value: 'alert-info'},
									{text: zp_shortcode_label.alertbox.content.class.values[2], value: 'alert-warning'},
									{text: zp_shortcode_label.alertbox.content.class.values[3], value: 'alert-danger'}
                                ]					
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'text',
                                label: zp_shortcode_label.alertbox.content.text.label,
								tooltip: zp_shortcode_label.alertbox.content.text.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[alert class="'+e.data.class+'" ]'+e.data.text+'[/alert]');
                            }
                        });
                    }	
				},
				{ // Blog Shortcode
					text: zp_shortcode_label.blog.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.blog.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'columns',
                                label: zp_shortcode_label.blog.content.columns.label,
								tooltip: zp_shortcode_label.blog.content.columns.tooltip,
								'values': [
                                    {text: zp_shortcode_label.blog.content.columns.values[0], value: '2'},
                                    {text: zp_shortcode_label.blog.content.columns.values[1], value: '3'}
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'items',
                                label: zp_shortcode_label.blog.content.items.label,
								tooltip: zp_shortcode_label.blog.content.items.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'category',
                                label: zp_shortcode_label.blog.content.category.label,
								tooltip: zp_shortcode_label.blog.content.category.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'exclude_ids',
                                label: zp_shortcode_label.blog.content.exclude_ids.label,
								tooltip: zp_shortcode_label.blog.content.exclude_ids.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[blog_section columns="'+e.data.columns+'" items="'+e.data.items+'" category="'+e.data.category+'" exclude_ids="'+e.data.exclude_ids+'" ][/blog_section]');
                            }
                        });
                    }	
				},
				{ // Buttons
					text: zp_shortcode_label.buttons.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.buttons.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'class',
                                label: zp_shortcode_label.buttons.content.class.label,
								tooltip: zp_shortcode_label.buttons.content.class.tooltip,
								'values': [
                                    {text: zp_shortcode_label.buttons.content.class.values[0], value: 'btn-default'},
                                    {text: zp_shortcode_label.buttons.content.class.values[1], value: 'btn-primary'},
									{text: zp_shortcode_label.buttons.content.class.values[2], value: 'btn-success'},
									{text: zp_shortcode_label.buttons.content.class.values[3], value: 'btn-info'},
									{text: zp_shortcode_label.buttons.content.class.values[4], value: 'btn-warning'},
									{text: zp_shortcode_label.buttons.content.class.values[5], value: 'btn-danger'},
									{text: zp_shortcode_label.buttons.content.class.values[6], value: 'btn-inverse'}
                                ]					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'size',
                                label: zp_shortcode_label.buttons.content.size.label,
								tooltip: zp_shortcode_label.buttons.content.size.tooltip,
								'values': [
                                    {text: zp_shortcode_label.buttons.content.size.values[0], value: 'btn-hg'},
                                    {text: zp_shortcode_label.buttons.content.size.values[1], value: 'btn-lg'},
									{text: zp_shortcode_label.buttons.content.size.values[2], value: ''},
									{text: zp_shortcode_label.buttons.content.size.values[3], value: 'btn-sm'},
									{text: zp_shortcode_label.buttons.content.size.values[4], value: 'btn-xs'}
                                ]					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'inline',
                                label: zp_shortcode_label.buttons.content.inline.label,
								tooltip: zp_shortcode_label.buttons.content.inline.tooltip,
								'values': [
                                    {text: zp_shortcode_label.buttons.content.inline.values[0], value: 'true'},
                                    {text: zp_shortcode_label.buttons.content.inline.values[1], value: 'false'}
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'button_link',
                                label: zp_shortcode_label.buttons.content.button_link.label,
								tooltip: zp_shortcode_label.buttons.content.button_link.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'button_label',
                                label: zp_shortcode_label.buttons.content.button_label.label,
								tooltip: zp_shortcode_label.buttons.content.button_label.tooltip,						
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'button_target',
                                label: zp_shortcode_label.buttons.content.button_target.label,
								tooltip: zp_shortcode_label.buttons.content.button_target.tooltip,
								'values': [
                                    {text: zp_shortcode_label.buttons.content.button_target.values[0], value: '_blank'},
                                    {text: zp_shortcode_label.buttons.content.button_target.values[1], value: '_self'},
									{text: zp_shortcode_label.buttons.content.button_target.values[2], value: '_top'},
									{text: zp_shortcode_label.buttons.content.button_target.values[3], value: '_parent'}
                                ]						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[button class="'+e.data.class+'" size="'+e.data.size+'" inline="'+e.data.inline+'" link="'+e.data.button_link+'" target="'+e.data.button_target+'"]'+e.data.button_label+'[/button]');
                            }
                        });
                    }	
				},
				{ // Client Carousel
					text: zp_shortcode_label.client_carousel.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.client_carousel.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'name',
                                label: zp_shortcode_label.client_carousel.content.name.label,
								tooltip: zp_shortcode_label.client_carousel.content.name.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[client_carousel name="'+e.data.name+'"][/client_carousel]');
                            }
                        });
                    }	
				},
				{ // Columns
					text: zp_shortcode_label.columns.menu,
                    menu: [
                        {
                            text: zp_shortcode_label.columns.submenu.one_half,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[one_half]CONTENT_HERE[/one_half]<br>[one_half]CONTENT_HERE[/one_half]<br>[/column_wrapper]');
							}       
                        },
                        {
                            text: zp_shortcode_label.columns.submenu.one_third,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[one_third]CONTENT_HERE[/one_third]<br>[one_third]CONTENT_HERE[/one_third]<br>[one_third]CONTENT_HERE[/one_third]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.one_fourth,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[one_fourth]CONTENT_HERE[/one_fourth]<br>[one_fourth]CONTENT_HERE[/one_fourth]<br>[one_fourth]CONTENT_HERE[/one_fourth]<br>[one_fourth]CONTENT_HERE[/one_fourth]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_1,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_1]CONTENT_HERE[/column_grid_1]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_2,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_2]CONTENT_HERE[/column_grid_2]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_3,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_3]CONTENT_HERE[/column_grid_3]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_4,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_4]CONTENT_HERE[/column_grid_4]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_5,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_5]CONTENT_HERE[/column_grid_5]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_6,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_6]CONTENT_HERE[/column_grid_6]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_7,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_7]CONTENT_HERE[/column_grid_7]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_8,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_8]CONTENT_HERE[/column_grid_8]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_9,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_9]CONTENT_HERE[/column_grid_9]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_10,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_10]CONTENT_HERE[/column_grid_10]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_11,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_11]CONTENT_HERE[/column_grid_11]<br>[/column_wrapper]');
							}       
                        },
						{
                            text: zp_shortcode_label.columns.submenu.column_grid_12,
                            onclick: function() {
								editor.insertContent( '[column_wrapper]<br>[column_grid_12]CONTENT_HERE[/column_grid_12]<br>[/column_wrapper]');
							}       
                        },
                    ]
				},
				{ // Contact Shortcode
					text: zp_shortcode_label.contact.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.contact.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content',
                                label: zp_shortcode_label.contact.content.content.label,
								tooltip: zp_shortcode_label.contact.content.content.tooltip,						
							}],
                            onsubmit: function( e ) {
								editor.insertContent( '[contact_section]'+e.data.content+'[/contact_section]');
                            }
                        });
                    }	
				},
				{ // Dismissable Text Shortcode
					text: zp_shortcode_label.dismissable.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.dismissable.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'class',
                                label: zp_shortcode_label.dismissable.content.class.label,
								tooltip: zp_shortcode_label.dismissable.content.class.tooltip,
								'values': [
                                    {text: zp_shortcode_label.dismissable.content.class.values[0], value: 'alert-success'},
                                    {text: zp_shortcode_label.dismissable.content.class.values[1], value: 'alert-info'},
									{text: zp_shortcode_label.dismissable.content.class.values[2], value: 'alert-warning'},
									{text: zp_shortcode_label.dismissable.content.class.values[3], value: 'alert-danger'}
                                ]					
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'text',
                                label: zp_shortcode_label.dismissable.content.text.label,
								tooltip: zp_shortcode_label.dismissable.content.text.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[dismissable_alert class="'+e.data.class+'" ]'+e.data.text+'[/dismissable_alert]');
                            }
                        });
                    }	
				},
				{ // Image Section
					text: zp_shortcode_label.image_section.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.image_section.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'image_url',
                                label: zp_shortcode_label.image_section.content.image_url.label,
								tooltip: zp_shortcode_label.image_section.content.image_url.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'image_link',
                                label: zp_shortcode_label.image_section.content.image_link.label,
								tooltip: zp_shortcode_label.image_section.content.image_link.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title',
                                label: zp_shortcode_label.image_section.content.title.label,
								tooltip: zp_shortcode_label.image_section.content.title.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'desc',
                                label: zp_shortcode_label.image_section.content.desc.label,
								tooltip: zp_shortcode_label.image_section.content.desc.tooltip					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'position',
                                label: zp_shortcode_label.image_section.content.position.label,
								tooltip: zp_shortcode_label.image_section.content.position.tooltip,
								'values': [
                                    {text: zp_shortcode_label.image_section.content.position.values[0], value: 'left'},
                                    {text: zp_shortcode_label.image_section.content.position.values[1], value: 'right'},
                                ]					
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content',
                                label: zp_shortcode_label.image_section.content.content.label,
								tooltip: zp_shortcode_label.image_section.content.content.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[image_section  image_url="'+e.data.image_url+'" link="'+e.data.image_link+'" title="'+e.data.title+'" desc="'+e.data.desc+'" image_position="'+e.data.position+'" ]'+e.data.content+'[/image_section]');
                            }
                        });
                    }	
				},
				{ // Lead Text Shortcode
					text: zp_shortcode_label.lead.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.lead.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'text',
                                label: zp_shortcode_label.lead.content.text.label,
								tooltip: zp_shortcode_label.lead.content.text.tooltip,						
							}],
                            onsubmit: function( e ) {
								editor.insertContent( '[lead_text]'+e.data.text+'[/lead_text]');
                            }
                        });
                    }	
				},
				{ // Modal Box
					text: zp_shortcode_label.modal.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.modal.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'modal_name',
                                label: zp_shortcode_label.modal.content.modal_name.label,
								tooltip: zp_shortcode_label.modal.content.modal_name.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'btn_label',
                                label: zp_shortcode_label.modal.content.btn_label.label,
								tooltip: zp_shortcode_label.modal.content.btn_label.tooltip,						
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'btn_class',
                                label: zp_shortcode_label.modal.content.btn_class.label,
								tooltip: zp_shortcode_label.modal.content.btn_class.tooltip,
								'values': [
                                    {text: zp_shortcode_label.modal.content.btn_class.values[0], value: 'btn-default'},
                                    {text: zp_shortcode_label.modal.content.btn_class.values[1], value: 'btn-primary'},
									{text: zp_shortcode_label.modal.content.btn_class.values[2], value: 'btn-success'},
									{text: zp_shortcode_label.modal.content.btn_class.values[3], value: 'btn-info'},
									{text: zp_shortcode_label.modal.content.btn_class.values[4], value: 'btn-warning'},
									{text: zp_shortcode_label.modal.content.btn_class.values[5], value: 'btn-danger'},
									{text: zp_shortcode_label.modal.content.btn_class.values[6], value: 'btn-inverse'}
                                ]					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'btn_size',
                                label: zp_shortcode_label.modal.content.btn_size.label,
								tooltip: zp_shortcode_label.modal.content.btn_size.tooltip,
								'values': [
                                    {text: zp_shortcode_label.modal.content.btn_size.values[0], value: 'btn-hg'},
                                    {text: zp_shortcode_label.modal.content.btn_size.values[1], value: 'btn-lg'},
									{text: zp_shortcode_label.modal.content.btn_size.values[2], value: ''},
									{text: zp_shortcode_label.modal.content.btn_size.values[3], value: 'btn-sm'},
									{text: zp_shortcode_label.modal.content.btn_size.values[4], value: 'btn-xs'}
                                ]					
							},							
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'modal_title',
                                label: zp_shortcode_label.modal.content.modal_title.label,
								tooltip: zp_shortcode_label.modal.content.modal_title.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'modal_content',
                                label: zp_shortcode_label.modal.content.modal_content.label,
								tooltip: zp_shortcode_label.modal.content.modal_content.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'modal_footer',
                                label: zp_shortcode_label.modal.content.modal_footer.label,
								tooltip: zp_shortcode_label.modal.content.modal_footer.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[modal modal_name="'+e.data.modal_name+'" btn_label="'+e.data.btn_label+'" btn_size="'+e.data.btn_size+'" btn_class="'+e.data.btn_class+'"][modal_header title="'+e.data.modal_title+'"][/modal_header][modal_content]'+e.data.modal_content+'[/modal_content][modal_footer]'+e.data.modal_footer+'[/modal_footer][/modal]');
                            }
                        });
                    }	
				},
				{ // Pricing Shortcode
					text: zp_shortcode_label.pricing.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.pricing.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
                                name: 'columns',
                                label: zp_shortcode_label.pricing.content.columns.label,
								tooltip: zp_shortcode_label.pricing.content.columns.tooltip,
								minWidth: 310,
								'values': [
                                    {text: zp_shortcode_label.pricing.content.columns.values[0], value: '2'},
                                    {text: zp_shortcode_label.pricing.content.columns.values[1], value: '3'},
                                    {text: zp_shortcode_label.pricing.content.columns.values[2], value: '4'},
                                ]
							}],
                            onsubmit: function( e ) {
								editor.insertContent( '[pricing columns="'+e.data.columns+'"][/pricing]');
                            }
                        });
                    }	
				},
				{ // Popover
					text: zp_shortcode_label.popover.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.popover.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'position',
                                label: zp_shortcode_label.popover.content.position.label,
								tooltip: zp_shortcode_label.popover.content.position.tooltip,
								'values': [
                                    {text: zp_shortcode_label.popover.content.position.values[0], value: 'top'},
                                    {text: zp_shortcode_label.popover.content.position.values[1], value: 'bottom'},
									{text: zp_shortcode_label.popover.content.position.values[2], value: 'left'},
									{text: zp_shortcode_label.popover.content.position.values[3], value: 'right'}
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title',
                                label: zp_shortcode_label.popover.content.title.label,
								tooltip: zp_shortcode_label.popover.content.title.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'label',
                                label: zp_shortcode_label.popover.content.label.label,
								tooltip: zp_shortcode_label.popover.content.label.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'text',
                                label: zp_shortcode_label.popover.content.text.label,
								tooltip: zp_shortcode_label.popover.content.text.tooltip					
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[popover position="'+e.data.position+'" title="'+e.data.title+'" label="'+e.data.label+'"]'+e.data.text+'[/popover]');
                            }
                        });
                    }	
				},
				{ // Portfolio
					text: zp_shortcode_label.portfolio.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.portfolio.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'preselect_cat',
                                label: zp_shortcode_label.portfolio.content.preselect_cat.label,
								tooltip: zp_shortcode_label.portfolio.content.preselect_cat.tooltip					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'lightbox',
                                label: zp_shortcode_label.portfolio.content.lightbox.label,
								tooltip: zp_shortcode_label.portfolio.content.lightbox.tooltip,
								'values': [
                                    {text: zp_shortcode_label.portfolio.content.lightbox.values[0], value: 'true'},
                                    {text: zp_shortcode_label.portfolio.content.lightbox.values[1], value: 'false'}
                                ]					
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[zp_portfolio columns="'+e.data.columns+'" preselect_cat="'+e.data.preselect_cat+'" lightbox="'+e.data.lightbox+'" ]');
                            }
                        });
                    }	
				},
				{ // Service
					text: zp_shortcode_label.services.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.services.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'columns',
                                label: zp_shortcode_label.services.content.columns.label,
								tooltip: zp_shortcode_label.services.content.columns.tooltip,
								'values': [
                                    {text: zp_shortcode_label.services.content.columns.values[0], value: '2'},
                                    {text: zp_shortcode_label.services.content.columns.values[1], value: '3'},
									{text: zp_shortcode_label.services.content.columns.values[2], value: '4'},
                                ]					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'align',
                                label: zp_shortcode_label.services.content.align.label,
								tooltip: zp_shortcode_label.services.content.align.tooltip,
								'values': [
                                    {text: zp_shortcode_label.services.content.align.values[0], value: 'center'},
                                    {text: zp_shortcode_label.services.content.align.values[1], value: 'left'},
									{text: zp_shortcode_label.services.content.align.values[2], value: 'right'},
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'items',
                                label: zp_shortcode_label.services.content.items.label,
								tooltip: zp_shortcode_label.services.content.items.tooltip					
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[services columns="'+e.data.columns+'" align="'+e.data.align+'" items="'+e.data.items+'"]');
                            }
                        });
                    }	
				},
				{ // Slider Section
					text: zp_shortcode_label.slider_section.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.slider_section.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'slidename',
                                label: zp_shortcode_label.slider_section.content.slidename.label,
								tooltip: zp_shortcode_label.slider_section.content.slidename.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'slideshow',
                                label: zp_shortcode_label.slider_section.content.slideshow.label,
								tooltip: zp_shortcode_label.slider_section.content.slideshow.tooltip					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'caption',
                                label: zp_shortcode_label.slider_section.content.caption.label,
								tooltip: zp_shortcode_label.slider_section.content.caption.tooltip,
								'values': [
                                    {text: zp_shortcode_label.slider_section.content.caption.values[0], value: 'true'},
                                    {text: zp_shortcode_label.slider_section.content.caption.values[1], value: 'false'},
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title',
                                label: zp_shortcode_label.slider_section.content.title.label,
								tooltip: zp_shortcode_label.slider_section.content.title.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'desc',
                                label: zp_shortcode_label.slider_section.content.desc.label,
								tooltip: zp_shortcode_label.slider_section.content.desc.tooltip					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'position',
                                label: zp_shortcode_label.slider_section.content.position.label,
								tooltip: zp_shortcode_label.slider_section.content.position.tooltip,
								'values': [
                                    {text: zp_shortcode_label.slider_section.content.position.values[0], value: 'left'},
                                    {text: zp_shortcode_label.slider_section.content.position.values[1], value: 'right'},
                                ]					
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content',
                                label: zp_shortcode_label.slider_section.content.content.label,
								tooltip: zp_shortcode_label.slider_section.content.content.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[slider_section  slidename="'+e.data.slidename+'" slideshow="'+e.data.slideshow+'" caption="'+e.data.caption+'" title="'+e.data.title+'" desc="'+e.data.desc+'" slider_position="'+e.data.position+'" ]'+e.data.content+'[/slider_section]');
                            }
                        });
                    }	
				},
				{ // Social Icons Shortcode
					text: zp_shortcode_label.social.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.social.header_title,
							minWidth: 500,
							height: 400,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
                                name: 'align',
                                label: zp_shortcode_label.social.content.align.label,
								tooltip: zp_shortcode_label.social.content.align.tooltip,
								minWidth: 310,
								'values': [
                                    {text: zp_shortcode_label.social.content.align.values[0], value: 'left'},
                                    {text: zp_shortcode_label.social.content.align.values[1], value: 'right'}
                                ]						
							},
							{
								type: 'listbox',
                                name: 'target',
                                label: zp_shortcode_label.social.content.target.label,
								tooltip: zp_shortcode_label.social.content.target.tooltip,
								minWidth: 310,
								'values': [
                                    {text: zp_shortcode_label.social.content.target.values[0], value: '_blank'},
                                    {text: zp_shortcode_label.social.content.target.values[1], value: '_self'},
									{text: zp_shortcode_label.social.content.target.values[2], value: '_parent'},
                                    {text: zp_shortcode_label.social.content.target.values[3], value: '_top'}
                                ]						
							},
							{
								type: 'textbox',
								name: 'dribbble',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.dribbble.label,
								tooltip: zp_shortcode_label.social.content.dribbble.tooltip,						
							},
							{
								type: 'textbox',
								name: 'flickr',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.flickr.label,
								tooltip: zp_shortcode_label.social.content.flickr.tooltip,						
							},
							{
								type: 'textbox',
								name: 'github',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.github.label,
								tooltip: zp_shortcode_label.social.content.github.tooltip,						
							},
							{
								type: 'textbox',
								name: 'pinterest',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.pinterest.label,
								tooltip: zp_shortcode_label.social.content.pinterest.tooltip,						
							},
							{
								type: 'textbox',
								name: 'twitter',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.twitter.label,
								tooltip: zp_shortcode_label.social.content.twitter.tooltip,						
							},
							{
								type: 'textbox',
								name: 'facebook',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.facebook.label,
								tooltip: zp_shortcode_label.social.content.facebook.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'google',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.google.label,
								tooltip: zp_shortcode_label.social.content.google.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'skype',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.skype.label,
								tooltip: zp_shortcode_label.social.content.skype.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'tumblr',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.tumblr.label,
								tooltip: zp_shortcode_label.social.content.tumblr.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'vimeo',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.vimeo.label,
								tooltip: zp_shortcode_label.social.content.vimeo.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'youtube',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.youtube.label,
								tooltip: zp_shortcode_label.social.content.youtube.tooltip,						
							},							,
							{
								type: 'textbox',
								name: 'linkedin',
								minWidth: 310,
                                label: zp_shortcode_label.social.content.linkedin.label,
								tooltip: zp_shortcode_label.social.content.linkedin.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[social_icons align="'+e.data.align+'"][social name="dribbble" link="'+e.data.dribbble+'" label="Dribbble" target="'+e.data.target+'"][/social][social name="flickr" link="'+e.data.flickr+'" label="Flickr" target="'+e.data.target+'"][/social][social name="github" link="'+e.data.github+'" label="Github" target="'+e.data.target+'"][/social][social name="pinterest" link="'+e.data.pinterest+'" label="Pinterest" target="'+e.data.target+'"][/social][social name="twitter" link="'+e.data.twitter+'" label="Twitter" target="'+e.data.target+'"][/social][social name="facebook" link="'+e.data.facebook+'" label="Facebook" target="'+e.data.target+'"][/social][social name="google+" link="'+e.data.google+'" label="Google+" target="'+e.data.target+'"][/social][social name="skype" link="'+e.data.skype+'" label="Skype" target="'+e.data.target+'"][/social][social name="tumblr" link="'+e.data.tumblr+'" label="Tumblr" target="'+e.data.target+'"][/social][social name="vimeo" link="'+e.data.vimeo+'" label="Vimeo" target="'+e.data.target+'"][/social][social name="youtube" link="'+e.data.youtube+'" label="Youtube" target="'+e.data.target+'"][/social][social name="linkedin" link="'+e.data.linkedin+'" label="LinkedIn" target="'+e.data.target+'"][/social][/social_icons]');
                            }
                        });
                    }	
				},
				{
				// Tab Shortcode
					text: zp_shortcode_label.tab.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.tab.header_title,
							minWidth: 500,
							height: 400,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id1',
                                label: zp_shortcode_label.tab.content.id1.label,
								tooltip: zp_shortcode_label.tab.content.id1.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title1',
                                label: zp_shortcode_label.tab.content.title1.label,
								tooltip: zp_shortcode_label.tab.content.title1.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content1',
                                label: zp_shortcode_label.tab.content.content1.label,
								tooltip: zp_shortcode_label.tab.content.content1.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id2',
                                label: zp_shortcode_label.tab.content.id2.label,
								tooltip: zp_shortcode_label.tab.content.id2.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title2',
                                label: zp_shortcode_label.tab.content.title2.label,
								tooltip: zp_shortcode_label.tab.content.title2.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content2',
                                label: zp_shortcode_label.tab.content.content2.label,
								tooltip: zp_shortcode_label.tab.content.content2.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'id3',
                                label: zp_shortcode_label.tab.content.id3.label,
								tooltip: zp_shortcode_label.tab.content.id3.tooltip,						
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title3',
                                label: zp_shortcode_label.tab.content.title3.label,
								tooltip: zp_shortcode_label.tab.content.title3.tooltip,						
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content3',
                                label: zp_shortcode_label.tab.content.content3.label,
								tooltip: zp_shortcode_label.tab.content.content3.tooltip,						
							},
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[tab ids="'+e.data.id1+','+e.data.id2+','+e.data.id3+'" nav="'+e.data.title1+','+e.data.title2+','+e.data.title3+'"][tabpane id="'+e.data.id1+'"]'+e.data.content1+'[/tabpane][tabpane id="'+e.data.id2+'"]'+e.data.content2+'[/tabpane][tabpane id="'+e.data.id3+'"]'+e.data.content3+'[/tabpane][/tab]');
                            }
                        });
                    }	
				},
				{ // Team Shortcode
					text: zp_shortcode_label.team.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.team.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'columns',
                                label: zp_shortcode_label.team.content.columns.label,
								tooltip: zp_shortcode_label.team.content.columns.tooltip,
								'values': [
                                    {text: zp_shortcode_label.team.content.columns.values[0], value: '2'},
                                    {text: zp_shortcode_label.team.content.columns.values[1], value: '3'},
									{text: zp_shortcode_label.team.content.columns.values[2], value: '4'},
                                ]					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'align',
                                label: zp_shortcode_label.team.content.align.label,
								tooltip: zp_shortcode_label.team.content.align.tooltip,
								'values': [
                                    {text: zp_shortcode_label.team.content.align.values[0], value: 'center'},
                                    {text: zp_shortcode_label.team.content.align.values[1], value: 'left'},
									{text: zp_shortcode_label.team.content.align.values[2], value: 'right'},
                                ]					
							},
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[team columns="'+e.data.columns+'" align="'+e.data.align+'" ][/team]');
                            }
                        });
                    }	
				},
				{ // Testimonial Shortcode
					text: zp_shortcode_label.testimonial.menu,
                    onclick: function() {
						editor.insertContent( '[testimonial_section][/testimonial_section]');
                    }	
				},
				{ // Tooltip
					text: zp_shortcode_label.tooltip.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.tooltip.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'position',
                                label: zp_shortcode_label.tooltip.content.position.label,
								tooltip: zp_shortcode_label.tooltip.content.position.tooltip,
								'values': [
                                    {text: zp_shortcode_label.tooltip.content.position.values[0], value: 'top'},
                                    {text: zp_shortcode_label.tooltip.content.position.values[1], value: 'bottom'},
									{text: zp_shortcode_label.tooltip.content.position.values[2], value: 'left'},
									{text: zp_shortcode_label.tooltip.content.position.values[3], value: 'right'}
                                ]					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title',
                                label: zp_shortcode_label.tooltip.content.title.label,
								tooltip: zp_shortcode_label.tooltip.content.title.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'text',
                                label: zp_shortcode_label.tooltip.content.text.label,
								tooltip: zp_shortcode_label.tooltip.content.text.tooltip					
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[tooltip position="'+e.data.position+'" title="'+e.data.title+'" ]'+e.data.text+'[/tooltip]');
                            }
                        });
                    }	
				},
				{ // Video Section
					text: zp_shortcode_label.video_section.menu,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: zp_shortcode_label.video_section.header_title,
							minWidth: 500,
							popup_css: false,
							scrollbars: true,
                            body: [
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'src',
                                label: zp_shortcode_label.video_section.content.src.label,
								tooltip: zp_shortcode_label.video_section.content.src.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'title',
                                label: zp_shortcode_label.video_section.content.title.label,
								tooltip: zp_shortcode_label.video_section.content.title.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'height',
                                label: zp_shortcode_label.video_section.content.height.label,
								tooltip: zp_shortcode_label.video_section.content.height.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'width',
                                label: zp_shortcode_label.video_section.content.width.label,
								tooltip: zp_shortcode_label.video_section.content.width.tooltip					
							},
							{
								type: 'textbox',
								minWidth: 310,
                                name: 'desc',
                                label: zp_shortcode_label.video_section.content.desc.label,
								tooltip: zp_shortcode_label.video_section.content.desc.tooltip					
							},
							{
								type: 'listbox',
								minWidth: 310,
                                name: 'position',
                                label: zp_shortcode_label.video_section.content.position.label,
								tooltip: zp_shortcode_label.video_section.content.position.tooltip,
								'values': [
                                    {text: zp_shortcode_label.video_section.content.position.values[0], value: 'left'},
                                    {text: zp_shortcode_label.video_section.content.position.values[1], value: 'right'},
                                ]					
							},
							{
								type: 'textbox',
								multiline: true,
								minHeight: 100,
								minWidth: 310,
                                name: 'content',
                                label: zp_shortcode_label.video_section.content.content.label,
								tooltip: zp_shortcode_label.video_section.content.content.tooltip,						
							}
							],
                            onsubmit: function( e ) {
								editor.insertContent( '[video_section src="'+e.data.src+'" title="'+e.data.title+'" desc="'+e.data.desc+'" video_position="'+e.data.position+'" height="'+e.data.height+'" width="'+e.data.width+'"]'+e.data.content+'[/video_section]');
                            }
                        });
                    }	
				}
           ]
        });
	  }
});

// Register plugin using the add method
tinymce.PluginManager.add('zp_button', tinymce.plugins.ZPShortcodes);
})();