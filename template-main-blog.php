<?php
/**
 * Template Name: Main Blog
 */

get_header();

$query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => get_option( 'posts_per_page' ),
    'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

?>
<main class="main-blog">
    <div class="container is-layout-constrained wp-block-query-is-layout-constrained">
        <h1>
            Our <span> Blog</span>
        </h1>

        <?php
        if ( $query->have_posts() ) :
            ?>
            <ul class="alignwide wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
                <?php
                    while ( $query->have_posts() ) : 
                        $query->the_post();
                        
                        get_template_part( 'template-parts/blog-post-previewe', '' );
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