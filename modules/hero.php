<?php
$include_hero  = carbon_get_post_meta( $id, 'include_hero' );

if ( ! $include_hero ) {
	return;
};
	
$hero_title    = carbon_get_post_meta( $id, 'hero_title' );
$hero_subtitle = carbon_get_post_meta( $id, 'hero_subtitle' );
$hero_desc     = carbon_get_post_meta( $id, 'hero_desc_txt' );
$hero_image    = carbon_get_post_meta( $id, 'hero_main_img' );
$hero_features = carbon_get_post_meta( $id, 'hero_features' );
$hero_buttons  = carbon_get_post_meta( $id, 'hero_buttons' );
$networks      = carbon_get_theme_option( 'social_media_links' );

$countries = new WP_Query( array(
	'post_type'   => 'country',
	'post_status' => 'publish',
	'fields'      => 'ids'
) );
?>

<section class="title">
	<div class="container">
		<?php
			// Feautures
			if ( ! empty( $hero_features ) ) :
				$feat_count = count( $hero_features );
				?>
				<div class="hero-trust">
					<?php
					foreach ( $hero_features as $key => $feature ) :
						$check_class = ( 0 == $key ) ? ' __web-inspector-hide-shortcut__' : '';
						?>
						<span>
							<span class="check-icon<?php echo $check_class?>">
								<svg viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
									<polyline points="5 12 10 17 19 8"></polyline>
								</svg>
							</span>
							
							<?php echo $feature['feature_name']?>
						</span>
						<?php
					endforeach;
					?>
				</div>
				<?php
			endif; 
		?>
		<div class="title-left-right d-flex justify-content-between flex-wrap">
			<div class="title-left col-12 col-lg-7 d-flex justify-content-start flex-wrap">
				<h1 class="display-xl">
					<?php
					// Hending
					if ( !empty( $hero_title ) ) :
						echo $hero_title;
					endif;

					// Subtitle
					if ( !empty( $hero_subtitle ) ) :
						?>
						<br>
						<span class="accent">
							<?php echo $hero_subtitle?>
						</span>
						<?php
					endif;
					?>
				</h1>

				<?php
				if ( ! empty( $hero_desc ) ) :
				?>
				<p class="hero-subhead">
					<?php echo $hero_desc?>
				</p>
				<?php
				endif;
				// Flags
				if ( $countries->have_posts() ) :
					$flags_text = carbon_get_post_meta( $id, 'flags_list_text' );
					$show_items_count = 6;
					$countries_count = $countries->found_posts;
					$diff_count = ( $countries_count - $show_items_count );
					?>
					<div class="hero-flags">
						<div class="flag-stack d-flex">
							<?php
							$items_count = 0;
							foreach( $countries->posts as $key => $item ) :
								if ( $show_items_count >= ( $key + 1 ) ) :
									++$items_count;
									$flag_image = carbon_get_post_meta( $item, 'cnt_flag_icon' );
									$country_title = get_the_title( $item );
								?>
								<span class="flag-pill" title="<?php echo esc_attr( $country_title )?>">
									<img width="28" height="28" src="<?php echo esc_url( $flag_image ) ?>">
								</span>
								<?php
								endif;
							endforeach;

							if ( $items_count < $countries_count ) :
								?>
								<span class="flag-pill" title="And more">+<?php echo $diff_count ?></span>
								<?php
							endif;	
							?>
						</div>

						<?php
						if ( ! empty( $flags_text ) ) :
							?>
							<span class="hero-flags-label"><?php echo $flags_text?></span>
							<?php
						endif;
						?>
					</div>

					<?php
					if ( ! empty( $hero_buttons ) ) :
						?>
						<div class="hero-cta">
							<?php
							foreach ( $hero_buttons as $i => $item ) :
								$blank = '0' == $item['link_botton_blank'] ? " target='_blank'": "";
								$second_class = ( 0 === $i ) ? ' btn-primary' : ' btn-ghost';
								?>
								<a class="btn<?php echo $second_class?>" href="<?php echo $item['link_button_src']?>"<?php echo $blank?>>
									<?php echo $item['link_botton_label']?>
								</a>
								<?php
							endforeach;
							?>
						</div>
						<?php
					endif;
				endif;

				wp_reset_postdata();
				?>
			</div>

			<div class="title-rigth col-12 col-lg-5 d-flex">
				<?php
				if ( ! empty( $hero_image ) ) :
					$hero_image_src = wp_get_attachment_url( $hero_image );
					?>
					<img src="<?php echo $hero_image_src?>">
					<?php
					else:
						include_once( __DIR__ . '/phone-fraime.php' );
				endif;
				?>
			</div>
	
		</div>
	</div>
</section>