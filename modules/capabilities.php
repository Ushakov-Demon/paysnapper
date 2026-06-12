<?php
$items = $section['capabilities_list'];

if ( empty( $items ) ) {
	return;
}

$section_id = $section['possibl_section_id'] ?: uniqid();
$main_img   = $section['possibl_main_img'];
$mobile_img = ! empty( $section['possibl_mobile_img'] ) ? $section['possibl_mobile_img'] : $section['possibl_main_img'];
?>
<section class="possibilities-section" id="<?php echo $section_id?>">
	<div class="container d-flex justify-content-between flex-wrap">
		<div class="block5-left col-12 col-lg-6 d-flex justify-content-between flex-wrap">
			<?php
			foreach( $items as $key => $cap ) :
				$active_class = ( 0 == $key ) ? ' solution-active': '';
				?>
				<div class="cap-btn<?php echo $active_class?>" data-name="<?php echo $cap['cap_name']?>" role="button">
					<?php echo $cap['cap_name']?>
				</div>
				<?php
			endforeach;
			?>

			<div class="block5-outer">
				<?php
				foreach( $items as $key => $cap ) :
					$cont_active_class = ( 0 == $key ) ? ' active': '';
					?>
					<div class="cap-content <?php echo $cap['cap_name']?><?php echo $cont_active_class?>">
						<h2><?php echo $cap['cap_title']?></h2>

						<?php
						if ( ! empty( $cap['cap_subtitle'] ) ) :
							?>
							<p class="main"><?php echo $cap['cap_subtitle']?></p>
							<?php
						endif;
						?>
						<p class="second"><?php echo $cap['cap_text']?></p>
					</div>
					<?php
				endforeach;
				?>
			</div>
		</div>

		<div class="col-12 overview-outer mobile">
			<img class="overview mobile" src="<?php echo wp_get_attachment_image_url( $mobile_img, 'medium' )?>">
		</div>
	</div>
	<img class="overview desktop over-hidden" src="<?php echo wp_get_attachment_image_url( $main_img, 'large' )?>">
</section>