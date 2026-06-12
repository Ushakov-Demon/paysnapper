<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'paysnapper_theme_options' );

function paysnapper_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'complex', 'social_media_links', 'Social Media Links' )
                ->set_collapsed( true )
                ->setup_labels( array(
                    'plural_name'   => __( 'Social Media Links' ),
                    'singular_name' => __( 'Social Media Link' ),
                ) )
                ->add_fields( array(
                    Field::make( 'text', 'url', 'URL' )
                        ->set_required( true ),
                    Field::make( 'text', 'platform', 'Platform Name' )
                        ->set_required( true )
                        ->set_width( 80 ),
                    Field::make( 'image', 'icon', 'Icon' )
                        ->set_required( true )
                        ->set_width( 20 ),
                ))
                ->set_header_template( '
				    <% if (platform) { %>
				        <%- platform %>
				    <% } %>
				'),
            Field::make( 'separator', 'global_link_btn_sep', 'Global Link Button' ),
            Field::make( 'text', 'login_lnk_btn_txt', 'Login Button Text' )
                ->set_width( 40 )
                ->set_default_value( 'Login' ),
            Field::make( 'text', 'login_lnk_btn_url', 'Login Button URL' )
                ->set_width( 40 )
                ->set_default_value( 'https://paysnapper.tech' ),
            Field::make( 'image', 'login_lnk_btn_icon', 'Login Button Icon' )
                ->set_width( 20 )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'get_a_quote_btn_txt', 'Get a Quote Button Text' )
                ->set_width( 50 )
                ->set_default_value( 'Get a Quote' ),
            Field::make( 'text', 'get_a_quote_btn_url', 'Get a Quote Button URL' )
                ->set_width( 50 )
                ->set_default_value( home_url() . '#contacts' ),
        ) );   
}
