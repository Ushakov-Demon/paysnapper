<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paysnapper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="wp-block-template-part">
		<div class="title">
			<div class="container">
				<nav id="navbar" class="navbar navbar-expand-lg">	   
					<?php get_template_part( 'modules/main', 'logo' ); ?>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php get_template_part( 'modules/header', 'nav' ); ?>
					</div>

					<ul class="navbar-nav buttons-title ml-auto">
						<li class="nav-item">
							<?php do_action( 'paysnapper_get_a_quote_btn' ); ?>
						</li>

						<li class="nav-item">
							<?php do_action( 'paysnapper_login_btn' ); ?>
						</li>
					</ul>
				</nav>
			</div>
		</div>	
	</header>