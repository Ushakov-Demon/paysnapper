<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paysnapper
 */

?>

<footer>
	<div class="container d-flex justify-content-between flex-wrap">
		<div class="footer-left col-12 col-lg-5 d-flex justify-content-start align-items-center p-0">
			<?php get_template_part( 'modules/footer', 'nav' ); ?>
		</div>

		<div class="footer-middle col-12 col-lg-1 d-flex justify-content-center align-items-center">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/p-logo.png">
		</div>

		<div class="footer-right col-12 col-lg-5 d-flex justify-content-end align-items-center p-0">
			<?php do_action( 'paysnapper_get_a_quote_btn' ); ?>

			<?php do_action( 'paysnapper_login_btn' ); ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
