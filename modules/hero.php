<?php
$include_hero  = carbon_get_post_meta( $id, 'include_hero' );

if ( $include_hero ) : ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php	
	$hero_title    = carbon_get_post_meta( $id, 'hero_title' );
	$hero_subtitle = carbon_get_post_meta( $id, 'hero_subtitle' );
	$hero_image    = carbon_get_post_meta( $id, 'hero_main_img' );
	$hero_features = carbon_get_post_meta( $id, 'hero_features' );
	$flags_list    = carbon_get_post_meta( $id, 'hero_flags' );
	$hero_buttons  = carbon_get_post_meta( $id, 'hero_buttons' );
	$networks      = carbon_get_theme_option( 'social_media_links' );
?>

<section class="title">
	<div class="container">
		<nav id="navbar" class="navbar navbar-expand-lg">
		  	<?php get_template_part( 'modules/main', 'logo' ); ?>
		  
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <?php get_template_part( 'modules/header', 'nav' ); ?>
		  </div>

		   <ul class="navbar-nav buttons-title ml-auto">
		      <?php
				do_action( 'paysnapper_social_links' );
			  ?>

		       <li class="nav-item">
					<?php do_action( 'paysnapper_login_btn' ); ?>
				</li>
		    </ul>
		</nav>

		<?php
			// Feautures
			if ( ! empty( $hero_features ) ) :
				$feat_count = count( $hero_features );
				?>
				<div class="title-left-menu d-flex justify-content-center align-items-center">
					<?php
					foreach ( $hero_features as $key => $feature ) :
						?>
						<p class="d-flex justify-content-center align-items-center">
							<span class="dot"></span>

							<?php echo $feature['feature_name']?>
						</p>
						<?php
					endforeach;
					?>
				</div>
				<?php
			endif; 
		?>
		<div class="title-left-right d-flex justify-content-between flex-wrap">
			<div class="title-left col-12 col-lg-7 d-flex justify-content-start flex-wrap">
				<?php
				// Hending
				if ( !empty( $hero_title ) ) :
					?>
					<h1>
						<?php echo $hero_title?>
					</h1>
					<?php
				endif;

				// Subtitle
				if ( !empty( $hero_subtitle ) ) :
					?>
					<p class="subtitle">
						<?php echo $hero_subtitle?>
					</p>
					<?php
				endif;
				
				// Flags
				if ( ! empty( $flags_list ) ) :
					$flags_text = carbon_get_post_meta( $id, 'flags_list_text' );
					?>
					<div class="flags d-flex justify-content-start align-items-center">
						<div class="flags-inner">
							<?php
							foreach( $flags_list as $key => $item ) :
								?>
								<img class="flag<?php echo $key+1?>" src="<?php echo $item['flag_image']?>">
								<?php
							endforeach;
							?>
						</div>

						<?php
						if ( ! empty( $flags_text ) ) :
							?>
							<p>
								<?php echo $flags_text?>
							</p>
							<?php
						endif;
						?>
					</div>

					<?php
					if ( ! empty( $hero_buttons ) ) :
						?>
						<div class="buttons d-flex justify-content-between">
							<?php
							foreach ( $hero_buttons as $item ) :
								$blank = '0' == $item['link_botton_blank'] ? " target='_blank'": "";
								?>
								<a href="<?php echo $item['link_button_src']?>"<?php echo $blank?>><?php echo $item['link_botton_label']?></a>
								<?php
							endforeach;
							?>
						</div>
						<?php
					endif;
				endif;
				?>
			</div>

			<?php
			if ( ! empty( $hero_image ) ) :
				$hero_image_src = wp_get_attachment_url( $hero_image );
				?>
				<div class="title-rigth col-12 col-lg-5 d-flex align-items-end">
					<img src="<?php echo $hero_image_src?>">
				</div>
				<?php
			endif;
			?>
		</div>
	</div>
</section>
<?php
else :
	// If hero is not included, just show the header
	include_once  get_template_directory() . '/header.php';
endif;