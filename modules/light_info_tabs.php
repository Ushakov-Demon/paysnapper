<?php
$tabs = $section['lit_tabs'];

if( empty( $tabs ) ) {
	return;
}
$section_id = $section['lit_id'] ?: uniqid();
$logo_id    = $section['lit_logo'];
$logo_src   = wp_get_attachment_image_url( $logo_id, 'large' );
$title      = $section['lit_title'];
$small_txt  = $section['lit_small_txt'];
?>
<section class="light-info-tabs" id="<?php echo $section_id?>">
	<div class="container d-flex justify-content-between flex-wrap">
		<div class="block4-left col-12 col-lg-4">
			<img src="<?php echo $logo_src?>">

			<h2><?php echo $title?></h2>

			<?php
			if ( ! empty( $small_txt ) ) :
				?>
				<p class="main"><?php echo $small_txt?></p>
				<?php
			endif;
			?>
		</div>

		<div class="block4-middle col-12 col-lg-4">
			<?php
			foreach( $tabs as $key => $tab ) :
				$img_src    = wp_get_attachment_image_url( $tab['lit_tab_image'], 'large' );
				$hide_class = ( 0 < $key ) ? ' hidden' : '';
				?>
				<img src="<?php echo $img_src?>" class="<?php echo $tab['lit_tab_short_name']?><?php echo $hide_class?>">
				<?php
			endforeach;
			?>
		</div>

		<div class="block4-right col-12 col-lg-4">
			<?php
			foreach( $tabs as $key => $tab ) :
				$active_class = ( 0 == $key ) ? ' active-bulk' : '';
				?>
				<div class="block4-right-button <?php echo $active_class?>" data-name="<?php echo $tab['lit_tab_short_name']?>" role="button">
					<?php echo $tab['lit_tab_title']?>
				</div>
				<?php
			endforeach;
			?>

			<div class="d-flex align-items-end pt-5 block-4-2">
				<?php
				foreach( $tabs as $key => $tab ) :
					$active_class = ( 0 == $key ) ? ' active' : '';
					?>
					<p class="second <?php echo $tab['lit_tab_short_name']?><?php echo $active_class?>">
						<?php echo $tab['lit_tab_txt']?>
					</p>
					<?php
				endforeach;
				?>
			</div>
		</div>
	</div>
</section>