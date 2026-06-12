<?php
$section_img = $section['logos_image'];

if ( empty( $section_img ) ) {
	return;
}

$section_id = $section['logos_section_id'] ?: uniqid();
$img_src = wp_get_attachment_image_url( $section_img, 'large' );
$repeat_count = (int) $section['logos_image_repeat_count'];
?>
<section class="client-logos-section" id="<?php echo $section_id?>">
	<div class="container">
		<div class="block6 d-flex justify-content-between flex-wrap">
			<div class="block6-left col-12 col-lg-6">
				<h2><?php echo $section['logos_section_title']?></h2>

				<p class="second"><?php echo $section['logos_desc']?></p>
			</div>

			<div class="block6-right col-12 col-lg-6">
				<div class="scroll-outer">
					<?php
					for( $i = 1; $i <= $repeat_count; $i++ ) :
						?>
						<img class="scroll<?php if( $i > 1 ) echo $i?>" src="<?php echo $img_src?>">
						<?php
					endfor;
					?>
				</div>
			</div>
		</div>
	</div>
</section>