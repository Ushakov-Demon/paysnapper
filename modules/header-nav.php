<?php
$nav_items = apply_filters( 'paysnapper_nav_items', 'menu-1' );
if ( empty( $nav_items ) ) :
    get_template_part( 'template-parts/head-menu-static', false );
else :
?>
<ul class="navbar-nav m-auto">
    <?php
    foreach ( $nav_items as $nav_item ) :
        ?>
        <li class="nav-item <?php echo ! empty( $nav_item['children'] ) ? 'dropdown ' : ''; ?><?php echo isset( $nav_item['classes'] ) ? trim( $nav_item['classes'] ) : ''; ?>" data-item="<?php echo $nav_item['object_id']?>">
            <a class="nav-link" href="<?php echo esc_url( $nav_item['url'] ); ?>" target="<?php echo esc_attr( $nav_item['target'] ) ?: '_self'; ?>">
                <?php echo esc_html( $nav_item['title'] ); ?>
            </a>

            <?php
            if ( ! empty( $nav_item['children'] ) ) :
                ?>
                <ul class="dropdown-menu">
                    <?php
                    foreach ( $nav_item['children'] as $child ) :
                        ?>
                        <li class="<?php echo isset( $child['classes'] ) ? trim( $child['classes'] ) : ''; ?>" data-item="<?php echo $child['object_id']?>">
                            <a class="dropdown-item" href="<?php echo esc_url( $child['url'] ); ?>" target="<?php echo esc_attr( $child['target'] ) ?: '_self'; ?>">
                                <?php echo esc_html( $child['title'] ); ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
                <?php
            endif;
            ?>    
        </li>
        <?php
    endforeach;
    ?>
</ul>
<?php
endif;