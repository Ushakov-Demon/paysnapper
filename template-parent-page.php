<?php
/**
 * Template Name: Parent Page Template
 * @package PaySnapper
 */

$id = get_queried_object_id();

$children = new WP_Query( [
        'post_type'      => 'page',
        'post_parent'    => $id,
        'post_status'    => 'publish',
        'posts_per_page' => get_option( 'posts_per_page' ),
        'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    ]
);

include_once  get_template_directory() . '/modules/hero.php';
?>
<main class="main-content">
    <div class="container is-layout-constrained wp-block-query-is-layout-constrained">
        <?php
        if ( empty( carbon_get_post_meta( $id, 'include_hero' ) ) ):
            echo '<h1>' . get_the_title() . '</h1>';
        endif;

        if ( ! empty( get_the_content() ) ) :
            ?>
            <section class="content">
                <?php
                echo apply_filters( 'the_content', get_the_content() );
                ?>
            </section>
            <?php
        endif;

        if ( $children->have_posts() ) :
            ?>
            <ul class="alignwide wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
                <?php
                    while ( $children->have_posts() ) :
                        $children->the_post();
                        
                        include get_template_directory() . '/template-parts/blog-post-previewe.php';
                    endwhile;
                ?>
            </ul>
            <?php
        endif;

        wp_reset_postdata();
        ?>
    </div>
</main>
<?php
get_footer();