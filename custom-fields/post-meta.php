<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'paysnapper_meta_fields' );

function paysnapper_meta_fields() {
	$features_labels = array(
	    'plural_name'   => __( 'Features' ),
	    'singular_name' => __( 'Feature' ),
	);

	$flags_labels = array(
	    'plural_name'   => __( 'Flags' ),
	    'singular_name' => __( 'Flag' ),
	);

	$buttons_labels = array(
	    'plural_name'   => __( 'Buttons' ),
	    'singular_name' => __( 'Button' ),
	);

	$sections_labels = array(
	    'plural_name'   => __( 'Sections' ),
	    'singular_name' => __( 'Section' ),
	);

	$cards_labels = array(
	    'plural_name'   => __( 'Cards' ),
	    'singular_name' => __( 'Card' ),
	);

	$tabs_labels = array(
	    'plural_name'   => __( 'Tabs' ),
	    'singular_name' => __( 'Tab' ),
	);

	$capabilities_labels = array(
	    'plural_name'   => __( 'Capabilities' ),
	    'singular_name' => __( 'Ability' ),
	);

	$contacts_labels = array(
	    'plural_name'   => __( 'Contacts' ),
	    'singular_name' => __( 'Contact' ),
	);

	$steps_labels = array(
	    'plural_name'   => __( 'Steps' ),
	    'singular_name' => __( 'Step' ),
	);

	$info_tiles_labels = array(
	    'plural_name'   => __( 'Tiles' ),
	    'singular_name' => __( 'Tile' ),
	);

	$regions_labels = array(
	    'plural_name'   => __( 'Regions' ),
	    'singular_name' => __( 'Region' ),
	);

	$gateways_labels = array(
	    'plural_name'   => __( 'Gateways' ),
	    'singular_name' => __( 'Gateway' ),
	);

	$chain_block_labels = array(
	    'plural_name'   => __( 'Chain Blocks' ),
	    'singular_name' => __( 'Chain Block' ),
	);

	$items_labels = array(
	    'plural_name'   => __( 'Items' ),
	    'singular_name' => __( 'Item' ),
	);

	$merchants_labels = array(
		'plural_name'   => __( 'Merchants' ),
	    'singular_name' => __( 'Merchant' ),
	);

	// HERO SECTION
	Container::make( 'post_meta', __( 'Hero Section' ) )
		->where( 'post_type', '=', 'page' )
		->add_fields( array(
			Field::make( 'checkbox', 'include_hero', __( 'Include Hero Section' ) )
				->set_width( 50 ),
			Field::make( 'image', 'hero_main_img', __( 'Main Image' ) )
				->set_width( 50 )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) ),
			Field::make( 'text', 'hero_title',  __( 'Title' ) )
				->set_width( 50 )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) ),	
			Field::make( 'text', 'hero_subtitle',  __( 'Subtitle' ) )
				->set_width( 50 )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) ),
			Field::make( 'textarea', 'hero_desc_txt', __( 'Description Text' ) ),	
			Field::make( 'complex', 'hero_features', __( 'Features' ) )
				->setup_labels( $features_labels )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) )
				->set_collapsed( true )
				->add_fields( array(
					Field::make( 'text', 'feature_name', __( 'Feature name' ) )
						->set_required( true )
				) )
				->set_header_template( '
				    <% if (feature_name) { %>
				        <%- feature_name %>
				    <% } %>
				' ),
			Field::make( 'textarea', 'flags_list_text', __( 'Flags Section Text' ) )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) ),
			Field::make( 'complex', 'hero_buttons', __( 'Link Buttons' ) )
				->setup_labels( $buttons_labels )
				->set_conditional_logic( array(
			        array(
			            'field' => 'include_hero',
			            'value' => '1',
			        )
			    ) )
				->set_collapsed( true )
				->add_fields( array(
					Field::make( 'text', 'link_button_src', __( 'Link href' ) )
						->set_required( true )
						->set_width( 40 ),
					Field::make( 'text', 'link_botton_label', __( 'Link Label' ) )
						->set_required( true )
						->set_width( 40 ),
					Field::make( 'checkbox', 'link_botton_blank', __( 'Target blank' ) )
						->set_width( 20 )
				) )
				->set_header_template( '
				    <% if (link_botton_label) { %>
				        <%- link_botton_label %>
				    <% } %>
				' )
		) );

	// FLEXABLE PAGE CONTENT 
	Container::make( 'post_meta', __( 'Page Content' ) )
		->where( 'post_type', '=', 'page' )
		->where( 'post_template', 'NOT IN', ['template-main-blog.php', 'template-parent-page.php'] )
		->add_fields( array(
			Field::make( 'complex', 'custom_main_content', __( 'Flexable Content' ) )
				->setup_labels( $sections_labels )
				// Double-row cards
				->add_fields( 'double_row_cards_section', array(
					Field::make( 'text', 'section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'drc_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'drc_section_title', __( 'Section Title' ) ),
					Field::make( 'textarea', 'drc_section_desc', __( 'Setion Description' ) ),	
					Field::make( 'complex', 'double_row_cards', __( 'Cards' ) )
						->setup_labels( $cards_labels )
						->set_collapsed( true )
						->add_fields( array(
							Field::make( 'select', 'card_width', __( 'Card Width' ) )
								->set_width( 25 )
								->add_options(
									array(
										'col-lg-7' => '60%',
										'col-lg-6' => '50%',
										'col-lg-5' => '40%',
									)
								)
								->set_default_value( 'col-lg-6' ),
							Field::make( 'select', 'card_text_position', __( 'Text Position' ) )
								->set_width( 25 )
								->add_options(
									array(
										'text-top' 	  => __( 'Top' ),
										'text-bottom' => __( 'Bottom' ),
									)
								),
							Field::make( 'select', 'card_text_direct', __( 'Text Direction' ) )
								->set_width( 25 )
								->add_options(
									array(
										'text-direct-mormal' 	  => __( 'Normal' ),
										'text-direct-revert' => __( 'Revert' ),
									)
								),	
							Field::make( 'select', 'card_text_color_style', __( 'Text Color Style' ) )
								->set_width( 25 )
								->add_options(
									array(
										'light' => __( 'Light' ),
										'dark'  => __( 'Dark' ),
									)
								),
							Field::make( 'text', 'card_title', __( 'Title' ) )
								->set_required( true )
								->set_width( 80 ),	
							Field::make( 'image', 'card_bg_img', __( 'Background image' ) )
								->set_width( 20 ),	
							Field::make( 'textarea', 'card_subtitle', __( 'Subtitle' ) )
								->set_width( 80 ),
							Field::make( 'image', 'card_image', __( 'Bottom image' ) )
								->set_width( 20 ),	
							Field::make( 'rich_text', 'card_content', __( 'Content' ) )
						) )
						->set_header_template( '
						    <% if (card_title) { %>
						        <%- card_title %>
						    <% } %>
						' ),
				) )

				// Variable blocks
				->add_fields( 'variable_blocks_section', array(
					Field::make( 'text', 'vbs_section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'vbs_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'vbs_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'vbs_section_desc', __( 'Section Description' ) ),
					Field::make( 'select', 'vbs_block_type', __( 'Block Type' ) )
						->add_options(
							array(
								'block_type_1' => 'Simple Blocks',
								'block_type_2' => 'Big Title Blocks',
								'block_type_3' => 'Icon Blocks',
							)
						)
						->set_width( 30 ),
					Field::make( 'select', 'vbs_block_rows', __( 'Block Rows' ) )
						->add_options(
							array(
								'double-grid' => '2 Rows',
								'triple-grid' => '3 Rows',
								'quad-grid'   => '4 Rows',
							)
						)
						->set_width( 30 ),
					Field::make( 'color', 'vbs_section_color', __( 'Section BG Color' ) )
						->set_width( 20 )
						->set_palette( array(
							'#131313',
							'#0d0d11',
							'#07070a',
						) ),
					Field::make( 'checkbox', 'vbs_iclude_chain_block', __( 'Include Chain of Events Block?' ) )
						->set_width( 20 ),
					Field::make( 'text', 'chain_block_aria_label', __( 'Chain Block ARIA Label' ) )
						->set_conditional_logic( array(
							array(
								'field' => 'vbs_iclude_chain_block',
								'value' => '1',
							)
						) ),	
					Field::make( 'complex', 'vbs_chain_block', __( 'Chain of Events Block' ) )
						->set_collapsed( true )
						->setup_labels( $chain_block_labels )
						->add_fields( array(
							Field::make( 'text', 'chain_block_title', __( 'Chain Block Title' ) )
								->set_width( 75 ),
							Field::make( 'select', 'vbs_chain_result', __( 'Chain Result' ) )
								->set_width( 25 )
								->add_options( array(
									'positive' => __( 'Is Positive' ),
									'negative' => __( 'Is Negative' ),
								) ),
							Field::make( 'text', 'chain_block_desc_before', __( 'Description Before' ) )
								->set_width( 25 ),
							Field::make( 'text', 'chain_block_desc', __( 'Description Text' ) )
								->set_width( 75 ),
							Field::make( 'complex', 'chain_items', __( 'Chain Items' ) )
								->set_collapsed( true )
								->add_fields( array(
									Field::make( 'text', 'chain_item_title', __( 'Chain Item Title' ) )
										->set_width( 75 ),
									Field::make( 'select', 'chain_item_node_class', __( 'Chain Item Marker' ) )
										->set_width( 25 )
										->add_options( array(
											'' => 'No Marker',
											'node-primary' => 'Mark Red',
											'node-success' => 'Mark Green',
										) ),
								) )
								->set_header_template( '
								    <% if (chain_item_title) { %>
								        <%- chain_item_title %>
								    <% } %>
								' )
								->setup_labels( array(
									'plural_name'   => __( 'Chain Items' ),
									'singular_name' => __( 'Chain Item' ),
								))
						) )
						->set_conditional_logic( array(
							array(
								'field' => 'vbs_iclude_chain_block',
								'value' => '1',
							)
						) )
						->set_header_template( '
						    <% if (chain_block_title) { %>
						        <%- chain_block_title %>
						    <% } %>
						' ),
					Field::make( 'complex', 'vbs_blocks', __( 'Blocks' ) )
						->set_collapsed( true )
						->setup_labels( $info_tiles_labels )
						->add_fields( array(
							Field::make( 'text', 'tile_red_marker', __( 'Red Marker Text' ) )
								->set_conditional_logic( array(
									array(
										'field'   => 'parent.vbs_block_type',
										'value'   => 'block_type_3',
										'compare' => '!=',
									)
								) ),
							Field::make( 'text', 'tile_title', __( 'Tile Title' ) )
								->set_required( true )
								->set_width( 60 ),
							Field::make( 'select', 'tile_icon_type', __( 'Tile Icon Type' ) )
								->set_width( 20 )
								->add_options( array(
									'image' => 'Image Icon',
									'svg' => 'SVG Code Icon',
								) )
								->set_conditional_logic( array(
									array(
										'field'   => 'parent.vbs_block_type',
										'value'   => 'block_type_3',
										'compare' => '=',
									)
								) ),
							Field::make( 'image', 'tile_icon', __( 'Tile Icon' ) )
								->set_conditional_logic( array(
									array(
										'field'   => 'parent.vbs_block_type',
										'value'   => 'block_type_3',
										'compare' => '=',
									),
									array(
										'field'   => 'tile_icon_type',
										'value'   => 'image',
										'compare' => '=',
									)
								) )
								->set_width( 20 ),
							Field::make( 'textarea', 'tile_icon_svg_code', __( 'Tile SVG Icon Code' ) )
								->set_conditional_logic( array(
									array(
										'field'   => 'parent.vbs_block_type',
										'value'   => 'block_type_3',
										'compare' => '=',
									),
									array(
										'field'   => 'tile_icon_type',
										'value'   => 'svg',
										'compare' => '=',
									)
								) ),
							Field::make( 'text', 'tile_lnk_href', __( 'Tile Link Href' ) )
								->set_width( 75 ),
							Field::make( 'text', 'tile_lnk_btn_label', __( 'Tile Link Button Label' ) )
								->set_width( 25 )
								->set_conditional_logic( array(
									array(
										'field'   => 'tile_lnk_href',
										'value'   => '',
										'compare' => '!=',
									)
								) ),
							Field::make( 'textarea', 'tile_txt_content', __( 'Tile Description' ) )
								->set_required( true )
					) )
					->set_header_template( '
						<% if (tile_title) { %>
							<%- tile_title %>
						<% } %>
					' ),
				) )

				// Live coverage
				->add_fields( 'live_coverage_section', array(
					Field::make( 'text', 'lc_section_id', __( 'Section ID' ) )
						->set_width( 50 ),
					Field::make( 'text', 'lc_aria_label', __( 'Widget Aria Label' ) )
						->set_width( 50 ),	
					Field::make( 'text', 'lc_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'lc_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'lc_section_desc', __( 'Section Description' ) ),
					Field::make( 'text', 'lc_widget_title', __( 'Widget Title' ) )
						->set_required( true )
						->set_width( 50 )
						->set_default_value( 'Integration status, last 30 days' ),
					Field::make( 'text', 'lc_widget_status_str', __( 'Status String' ) )
						->set_required( true )
						->set_width( 50 )
						->set_default_value( 'All systems operational' ),
					Field::make( 'text', 'lc_widget_footer_txt', __( 'Footer Text' ) )
						->set_width( 33 )
						->set_default_value( 'See all 17 integrations across 11 markets' ),
					Field::make( 'text', 'lc_widget_footer_lnk_txt', __( 'Link Text' ) )
						->set_width( 33 )
						->set_default_value( 'Full status page' ),
					Field::make( 'text', 'lc_widget_footer_lnk', __( 'Link Href' ) )
						->set_width( 33 ),
					Field::make( 'complex', 'lc_countries_list', __( 'Countries List' ) )
						->set_collapsed( true )
						->setup_labels( $regions_labels )
						->add_fields( array(
							Field::make( 'text', 'lc_country_name', __( 'Country Name' ) )
								->set_width( 40 )
								->set_required( true ),
							Field::make( 'text', 'lc_country_pay', __( 'Pay Method' ) )
								->set_width( 40 )
								->set_required( true ),	
							Field::make( 'image', 'lc_country_flag', __( 'Flag Image' ) )
								->set_width( 20 )
								->set_value_type( 'url' )
								->set_required( true )
						) )
						->set_header_template( '
						    "<%- lc_country_pay %>" <%- lc_country_name %>
						' )
				) )

				// Paysnapper Company Info
				->add_fields( 'paysnapper_company_info', array(
					Field::make( 'text', 'pcs_section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'pcs_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'pcs_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'pcs_section_desc', __( 'Setion Description' ) ),	
					Field::make( 'separator', 'pcs_company_sep', __( 'Company Info Block' ) ),
					Field::make( 'complex', 'pcs_info_items', __( 'Info Items' ) )
						->set_collapsed( true )
						->setup_labels( $items_labels )
						->add_fields( array(
							Field::make( 'text', 'info_item_label', __( 'Label' ) )
								->set_required( true ),
							Field::make( 'text', 'info_item_value', __( 'Value' ) )
								->set_required( true )	
						) )
						->set_header_template( '
							<%- info_item_label %>
						' ),
					Field::make( 'separator', 'pcs_employees_sep', __( 'Employees Block' ) ),
					Field::make( 'text', 'pcs_emp_block_title', __( 'Block Title' ) )
						->set_default_value( 'The people behind Paysnapper' ),
					Field::make( 'textarea', 'pcs_emp_block_desc', __( 'Block Description' ) ),
					Field::make( 'association', 'pcs_employees_list', __( 'Employees' ) )
						->set_types( array(
							array(
								'type'      => 'post',
								'post_type' => 'employees',
							)
						) ),
					Field::make( 'text', 'pcs_emp_block_footer_txt', __( 'Block Footer Text' ) ),
					Field::make( 'text', 'pcs_emp_block_footer_link_txt', __( 'Block Footer Link Label' ) )
						->set_width( 50 ),
					Field::make( 'text', 'pcs_emp_block_footer_link_href', __( 'Block Footer Link Href' ) )
						->set_width( 50 )
				) )

				// Paysnapper Build
				->add_fields( 'paysnapper_build', array(
					Field::make( 'text', 'pb_section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'pb_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'pb_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'complex', 'pb_merchants_list', __( 'Merchants List' ) )
						->set_collapsed( true )
						->setup_labels( $merchants_labels )
						->add_fields( array(
							Field::make( 'text', 'merchant_name', __( 'Merchant Name' ) )
								->set_required( true )
								->set_width( 40 ),
							Field::make( 'text', 'merchant_industry', __( 'Merchant Industry' ) )
								->set_required( true )
								->set_width( 40 ),
							Field::make( 'image', 'merchant_logo', __( 'Logo' ) )
								->set_required( true )
								->set_value_type( 'url' )
								->set_width( 20 ),
							Field::make( 'text', 'merchant_url', __( 'Merchant Link Href' ) ),
							Field::make( 'textarea', 'merchant_short_desc', __( 'Short Description' ) )	
						) )
						->set_header_template( '
							<%- merchant_name %> <%- merchant_industry %>
						' ),
				) )

				// Out Money
				->add_fields( 'out_money_section', array(
					Field::make( 'separator', 'om_section_sep', __( 'Left side content' ) ),
					Field::make( 'text', 'om_section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'om_section_small_title', __( 'Small Section Title' ) ),
					Field::make( 'text', 'om_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'om_section_desc', __( 'Section Description' ) ),
					Field::make( 'complex', 'om_items', __( 'Items List' ) )
						->set_collapsed( true )
						->setup_labels( $items_labels )
						->add_fields( array(
							Field::make( 'text', 'om_item_bage', __( 'Item Bage' ) )
								->set_width( 50 ),
							Field::make( 'text', 'om_item_title', __( 'Item Title' ) )
								->set_width( 50 )
								->set_required( true ),
							Field::make( 'textarea', 'om_item_desc', __( 'Item Description' ) )
						) )
						->set_header_template( '
							<% if (om_item_title) { %>
								<%- om_item_title %>
							<% } %>
						' ),
					Field::make( 'separator', 'om_section_sep_2', __( 'Right side content' ) ),
					Field::make( 'textarea', 'om_section_right_center_element', __( 'Center Element' ) ),
					Field::make( 'text', 'om_section_right_left_element', __( 'Left Element' ) )
						->set_width( 25 ),
					Field::make( 'text', 'om_section_right_right_element', __( 'Right Element' ) )
						->set_width( 25 ),
					Field::make( 'text', 'om_section_right_bottom_element', __( 'Bottom Element' ) )
						->set_width( 25 ),
					Field::make( 'text', 'om_section_right_top_element', __( 'Top Element' ) )
						->set_width( 25 )	
				) )

				// FAQ Section
				->add_fields( 'faq_section', array(
					Field::make( 'text', 'fs_section_id', __( 'Section ID' ) ),
					Field::make( 'text', 'fs_section_small_title', __( 'Small Section Title' ) )
						->set_default_value( 'FAQ' ),
					Field::make( 'text', 'fs_section_title', __( 'Section Title' ) )
						->set_default_value( 'Questions Paysnapper gets asked' )
						->set_required( true ),
					Field::make( 'association', 'faqs_list', __( 'FAQ`s' ) )
						->help_text( 'Posts from the selected categories will be selected' )
						->set_types( array(
							array(
								'type'     => 'term',
								'taxonomy' => 'faq_cat',
							),
						) )
				) )

				// Light Info Tabs
				->add_fields( 'light_info_tabs', array(
					Field::make( 'text', 'lit_id', __( 'Section ID' ) )
						->set_width( 20 ),
					Field::make( 'image', 'lit_logo', __( 'Section Logo' ) )
						->set_required( true )
						->set_width( 20 ),
					Field::make( 'textarea', 'lit_title', __( 'Section Title' ) )
						->set_required( true )
						->set_width( 80 ),
					Field::make( 'textarea', 'lit_small_txt', __( 'Small Text' ) ),
					Field::make( 'complex', 'lit_tabs', __( 'Info Tabs' ) )
						->setup_labels( $tabs_labels )
						->set_collapsed( true )
						->add_fields( array(
							Field::make( 'text', 'lit_tab_short_name', __( 'Tab Short Name' ) )
								->set_required( true )
								->set_width( 20 ),
							Field::make( 'text', 'lit_tab_title', __( 'Tab Title' ) )
								->set_required( true )
								->set_width( 60 ),
							Field::make( 'image', 'lit_tab_image', __( 'Tab Image' ) )
								->set_required( true )
								->set_width( 20 ),
							Field::make( 'textarea', 'lit_tab_txt', __( 'Tab Text Content' ) )
								->set_required( true )
						) )
						->set_header_template( '
						    <% if (lit_tab_title) { %>
						        <%- lit_tab_title %>
						    <% } %>
						' ),
				) )

				// Demonstration of Possibilities
				->add_fields( 'capabilities', array(
					Field::make( 'text', 'possibl_section_id', __( 'Section ID' ) )
						->set_width( 33 ),
					Field::make( 'image', 'possibl_main_img', __( 'Section Image' ) )
						->set_required( true )
						->set_width( 33 ),
					Field::make( 'image', 'possibl_mobile_img', __( 'Mobile Image' ) )
						->set_width( 33 ),
					Field::make( 'complex', 'capabilities_list', __( 'List Items' ) )
						->setup_labels( $capabilities_labels )
						->set_collapsed( true )
						->add_fields( array(
							Field::make( 'text', 'cap_name', __( 'Name' ) )
								->set_width( 33 )
								->set_required( true ),
							Field::make( 'text', 'cap_title', __( 'Title' ) )
								->set_width( 66 )
								->set_required( true ),
							Field::make( 'textarea', 'cap_subtitle', __( 'Subtitle' ) ),
							Field::make( 'textarea', 'cap_text', __( 'Content' ) )
								->set_required( true )		
						) )
						->set_header_template( '
						    <% if (cap_name) { %>
						        <%- cap_name %>
						    <% } %>
						' ),
				) )

				// Client logos
				->add_fields( 'client_logos', array(
					Field::make( 'text', 'logos_section_id', __( 'Section ID' ) ),
					Field::make( 'textarea', 'logos_section_title', __( 'Section title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'logos_desc', __( 'Section Description' ) )
						->set_required( true ),
					Field::make( 'image', 'logos_image', __( 'Image' ) )
						->set_width( 50 )
						->set_required( true ),
					Field::make( 'text', 'logos_image_repeat_count', __( 'Image Repeat Count' ) )
						->set_attribute( 'type', 'number' )
						->set_width( 50 )
						->set_default_value( 3 )	
				) )

				// Contact Form
				->add_fields( 'contact_form', array(
					Field::make( 'image', 'cf_logo_img', __( 'Section Logo' ) )
						->set_width( 15 ),
					Field::make( 'text', 'cf_section_id', __( 'Section Id' ) )
						->set_width( 15 ),
					Field::make( 'textarea', 'cf_title', __( 'Title Section' ) )
						->set_width( 70 )
						->set_default_value( 'Paysnapper is constantly working' )
						->set_required( true ),
					Field::make( 'textarea', 'cf_desc_txt', __( 'Description Text' ) ),
					Field::make( 'text', 'cf_form_shortcode', __( 'Form Shortcode' ) )
						->set_required( true )		
				) )

				// Contact Us
				->add_fields( 'contact_us', array(
					Field::make( 'text', 'cus_section_id', __( 'Section ID' ) )
						->set_width( 30 ),
					Field::make( 'text', 'cus_title', __( 'Title Section' ) )
						->set_required( true )
						->set_width( 70 )
						->set_default_value( 'Contact Us' ),
					Field::make( 'text', 'cus_desc', __( 'Description Text' ) )
						->set_default_value( 'You can also contact us via messengers.' ),
					Field::make( 'complex', 'cus_contacts', __( 'Contact Links' ) )
						->setup_labels( $contacts_labels )
						->set_collapsed( true )
						->add_fields( array(
							Field::make( 'text', 'cus_item_href', __( 'Href' ) )
								->set_width( 50 )
								->set_required( true ),
							Field::make( 'text', 'cus_item_label', __( 'Label' ) )
								->set_width( 50 )
								->set_required( true ),
						) )
						->set_header_template( '
						    <% if (cus_item_label) { %>
						        <%- cus_item_label %>
						    <% } %>
						' ),
				) )

				// Steps Section
				->add_fields( 'steps', array(
					Field::make( 'text', 'steps_section_id', __( 'Section ID' ) )
						->set_width( 30 ),
					Field::make( 'text', 'steps_section_title', __( 'Title Section' ) )
						->set_required( true )
						->set_width( 70 ),
					Field::make( 'textarea', 'steps_section_desc', __( 'Description Text' ) ),
					Field::make( 'complex', 'steps_list', __( 'Steps List' ) )
						->setup_labels( $steps_labels )
						->set_collapsed( true )
						->add_fields( array(
							Field::make( 'text', 'step_title', __( 'Step Title' ) )
								->set_width( 50 )
								->set_required( true ),
							Field::make( 'textarea', 'step_desc', __( 'Step Description' ) )
								->set_width( 50 )
								->set_required( true ),
						) )
						->set_header_template( '
						    <% if (step_title) { %>
						        <%- step_title %>
						    <% } %>
						' ),
				) )

				// Payment gateways by region
				->add_fields( 'payment_gateways_by_region', array(
					Field::make( 'text', 'pg_section_id', __( 'Section ID' ) )
						->set_width( 30 ),
					Field::make( 'text', 'pg_section_marker', __( 'Section Red Marker text' ) )
						->set_default_value( '- Africa & Middle East' )
						->set_width( 70 ),
					Field::make( 'text', 'pg_section_title', __( 'Section Title' ) )
						->set_required( true ),
					Field::make( 'textarea', 'pg_section_desc', __( 'Section Description' ) ),
				) )		
		) );

		Container::make( 'post_meta', __( 'Employee Details' ) )
			->where( 'post_type', '=', 'employees' )
			->add_fields( array(
				Field::make( 'text', 'emp_position', __( 'Job title' ) ),
				Field::make( 'text', 'emp_linkedin', __( 'Linkedin' ) ),
			) );

		Container::make( 'post_meta', __( 'Country Flags' ) )
			->where( 'post_type', '=', 'country' )
			->set_context( 'side' )
			->add_fields( array(
				Field::make( 'image', 'cnt_flag_icon', __( 'Main Flag Icon' ) )
					->set_required( true )
					->set_value_type( 'url' ),
				Field::make( 'image', 'cnt_round_flag_icon', __( 'Round Flag Icon' ) )
					->set_value_type( 'url' )	
			) );
			
		Container::make( 'post_meta', __( 'Country Details' ) )
			->where( 'post_type', '=', 'country' )
			->add_fields( array(
				Field::make( 'association', 'cnt_local_wallets', __( 'Wallets' ) )
					->set_duplicates_allowed( false )
					->set_types( array(
						array(
							'type'      => 'post',
							'post_type' => 'wallet',
						)
					) )
			) );
}