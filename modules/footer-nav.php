<?php
$nav_items = wp_get_nav_menu_items( 'menu-1' );
if ( empty( $nav_items ) ) :
    get_template_part( 'modules/footer', 'nav-static' );
else :
?>
<ul class="footer-menu">
    <?php foreach ( $nav_items as $nav_item ) : ?>
        <li>
            <a href="<?php echo esc_url( $nav_item->url ); ?>" target="<?php echo esc_attr( $nav_item->target ) ?? '_self'; ?>">
                <?php echo esc_html( $nav_item->title ); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php
endif;