<?php
add_action( 'init', 'paysnapper_rigister_post_types' );
add_action( 'init', 'paysnapper_register_taxomomies' );
add_action( 'paysnapper_social_links'   , 'paysnapper_social_link_items' );
add_action( 'paysnapper_login_btn'      , 'paysnapper_login_btn' );
add_action( 'paysnapper_get_a_quote_btn', 'paysnapper_get_a_quote_btn' );
add_action( 'paysnapper_nav_items'      , 'paysnapper_nav_items' );

function paysnapper_rigister_post_types() {
    register_post_type( 'employees', [
        'label' => null,
        'labels' => [
            'name'                  => __( 'Employees' ),
            'singular_name'         => __( 'Employee' ),
            'add_new'               => __( 'Add New Employee' ),
            'add_new_item'          => __( 'Add Employee' ),
            'edit_item'             => __( 'Edit Employee' ),
            'new_item'              => __( 'New Employee' ),
            'view_item'             => __( 'View Employee' ),
            'search_items'          => __( 'Search' ),
            'not_found'             => __( 'Not Found' ),
            'not_found_in_trash'    => __( 'Not Found in Trash' ),
            'parent_item_colon'     => '',
            'menu_name'             => __( 'Employees' ),
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'show_in_nav_menus'   => true,
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 5,
        'hierarchical'        => false,
        'supports'            => ['title', 'thumbnail', 'excerpt', 'page-attributes'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'faq', [
        'label' => null,
        'labels' => [
            'name'                  => __( 'FAQ' ),
            'singular_name'         => __( 'FAQ' ),
            'add_new'               => __( 'Add New FAQ' ),
            'add_new_item'          => __( 'Add FAQ' ),
            'edit_item'             => __( 'Edit FAQ' ),
            'new_item'              => __( 'New FAQ' ),
            'view_item'             => __( 'View FAQ' ),
            'search_items'          => __( 'Search' ),
            'not_found'             => __( 'Not Found' ),
            'not_found_in_trash'    => __( 'Not Found in Trash' ),
            'parent_item_colon'     => '',
            'menu_name'             => __( 'FAQ' ),
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'show_in_nav_menus'   => true,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'       => 5,
        'hierarchical'        => false,
        'supports'            => ['title', 'editor'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function paysnapper_register_taxomomies() {
    register_taxonomy( 'faq_cat', 'faq', [
        'labels' => [
            'name'          => __( 'FAQ Categories' ),
            'singular_name' => __( 'FAQ Category' ),
            'add_new_item'  => __( 'Add New FAQ Category' ),
            'new_item_name' => __( 'New FAQ Category' ),
            'menu_name'     => __( 'FAQ Categories' ),
        ],
        'public'              => true,
        'hierarchical'        => true,
        'show_in_rest'        => false,
        'publicly_queryable'  => false,
        'rewrite'             => [ 'slug' => 'faq-category' ],
    ]);
}
/**
 * Print social media links items
 */
function paysnapper_social_link_items() {
    $networks = carbon_get_theme_option( 'social_media_links' );

    if ( ! empty( $networks ) ) :
        foreach ( $networks as $item ) :
            $icon_url = wp_get_attachment_image_url( $item['icon'] );
            ?>
            <li class="nav-item">
                <a class="nav-link social-header" href="<?php echo $item['url']; ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo $icon_url; ?>" width="25" height="25" alt="Link to <?php echo $item['platform']; ?>">
                </a>
            </li>
            <?php
        endforeach;
    endif;
}

/**
 * Print login button
 */
function paysnapper_login_btn() {
    $btn_text = carbon_get_theme_option( 'login_lnk_btn_txt' );
    $btn_url  = carbon_get_theme_option( 'login_lnk_btn_url' );
    $btn_icon = carbon_get_theme_option( 'login_lnk_btn_icon' );

    if ( empty( $btn_text ) || empty( $btn_url ) ) {
        return;
    }
    ?>
    <a class="nav-link footer-login" href="<?php echo esc_url( $btn_url ); ?>">
        <?php if ( ! empty( $btn_icon ) ) : ?>
            <img src="<?php echo esc_url( $btn_icon ); ?>" width="19" height="19" alt="Login Icon">
        <?php endif; ?>
        <?php echo esc_html( $btn_text ); ?>
    </a>
    <?php
}

/**
 * Print Get a Quote button
 */
function paysnapper_get_a_quote_btn() {
    $btn_text = carbon_get_theme_option( 'get_a_quote_btn_txt' );
    $btn_url  = carbon_get_theme_option( 'get_a_quote_btn_url' );

    if ( empty( $btn_text ) || empty( $btn_url ) ) {
        return;
    }
    ?>
    <a class="nav-link footer-get-a-quote" href="<?php echo esc_url( $btn_url ); ?>">
        <?php echo esc_html( $btn_text ); ?>
    </a>
    <?php
}

/**
 * Get navigation menu items
 *
 * @param string $nav_location Menu location identifier.
 * @return array Structured array of menu items with children.
 */
function paysnapper_nav_items( $nav_location ) {
    $items = wp_get_nav_menu_items( $nav_location );
    $out = [];

    if ( empty( $items ) ) {
        return $out;
    }

    foreach ( $items as $item ) {
        $nav_obj = [
            'id'        => $item->ID,
            'title'     => $item->title,
            'url'       => $item->url,
            'target'    => $item->target ?: '_self',
            'object_id' => $item->object_id,
        ];

        if ( $item->classes ) {
            $nav_obj['classes'] = implode( ' ', $item->classes );
        }

        if ( $item->menu_item_parent ) {
            array_push( $out[$item->menu_item_parent]['children'], $nav_obj );
            $out[$item->menu_item_parent]['classes'] = ( $out[$item->menu_item_parent]['classes'] ?? '' ) . ' has-children';
        } else {
            $nav_obj['children'] = [];
            $out[$item->ID] = $nav_obj;
        }
    }

    return $out;
}