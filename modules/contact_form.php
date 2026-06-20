<?php
$shortcode = $section['cf_form_shortcode'];

if ( empty( $shortcode ) ) {
	return;
}

$section_id = $section['cf_section_id'] ?: uniqid();
?>
<section class="form-section" id="<?php echo $section_id?>">
	<div class="container d-flex justify-content-center flex-wrap">
		<?php
		if ( ! empty( $section['cf_logo_img'] ) ) :
			?>
			<img src="<?php echo wp_get_attachment_image_url( $section['cf_logo_img'], 'full' )?>">
			<?php
		endif;
		?>

		<h2><?php echo $section['cf_title']?></h2>

		<?php
		if (  empty( $section['cf_desc_txt'] ) ) :
			?>
			<p class="main"><?php echo $section['cf_desc_txt']?></p>
			<?php
		endif;
		?>

		<div id="contacts" class="form container">
			<?php echo do_shortcode( $shortcode )?>
		</div>
	</div>
</section>
