<?php
$double_row_cards = $section['double_row_cards'];
$section_id       = $section['section_id'] ?: uniqid();

if ( empty( $double_row_cards ) ) {
	return;
}
?>
<section class="cards-section" id="<?php echo $section_id?>">
	<div class="container">
		<div class="row g-3">
			<?php
			foreach( $double_row_cards as $key => $item ) :
				$bg_id 			   = $item['card_bg_img'];
				$bg_src 		   = wp_get_attachment_image_url( $bg_id, 'full' );
				$card_image        = $item['card_image'];
				$horizontal_direct = ( $key % 2 == 0 ) ? 'left' : 'right';
				$width_class       = $item['card_width'];
				$color_class       = $item['card_text_color_style'];
				$cont_direct_class = $item['card_text_direct'];
				$cont_pos_class    = empty( $item['card_image'] ) ? $item['card_text_position'] : '';
				?>
				<div class="card-item col block-<?php echo $horizontal_direct;?> <?php echo $width_class?> <?php echo $cont_pos_class?> <?php echo $color_class?>"
					 style="--card-bg-image: url( <?php echo $bg_src ?> );">
					<div class="card-content d-flex <?php echo $cont_direct_class?>">
						<h2>
							<?php echo $item['card_title'];?>
						</h2>

						<?php
						if ( ! empty( $item['card_subtitle'] ) ) :
							?>
							<p class="main">
								<?php echo $item['card_subtitle'];?>
							</p>
							<?php
						endif;

						if ( ! empty( $item['card_content'] ) ) :
							?>
							<p class="second">
								<?php echo $item['card_content'];?>
							</p>
							<?php
						endif;
						?>
					</div>

					<?php
					if ( ! empty( $card_image ) ) :
						$card_image_src = wp_get_attachment_image_url( $card_image, 'large' );
						?>
						<div class="paysnapper">
							<img src="<?php echo $card_image_src?>">
						</div>
						<?php
					endif;
					?>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>
</section>