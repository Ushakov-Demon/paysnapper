<?php
/**
 * Template Name: Flexable Template
 * Slug: child-theme/php-home
 */

$id             = get_queried_object_id();
$fields_content = carbon_get_post_meta( $id, 'custom_main_content' );

include_once  get_template_directory() . '/modules/hero.php';

if ( ! empty( $fields_content ) ):
	foreach( $fields_content as $section ) :
		$type = $section['_type'];
		$file = get_template_directory() . "/modules/{$type}.php";

		if ( file_exists($file) ) :
			include $file;
		endif;	
	endforeach;	
endif;

get_footer();