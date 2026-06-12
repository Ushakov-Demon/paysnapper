<?php
get_header();
?>
<main class="wp-block-group post-single is-layout-flow wp-block-group-is-layout-flow">
    <div class="wp-block-group">
        <div class="container is-layout-constrained wp-block-group-is-layout-constrained">
            <h1 style="margin-bottom:var(--wp--custom--spacing--medium, 6rem);" class="alignwide wp-block-post-title">
                <?php the_title(); ?>
            </h1>

            <figure style="margin-bottom:var(--wp--custom--spacing--medium, 6rem);" class="alignwide wp-block-post-featured-image">
                <?php
                    if ( has_post_thumbnail() ) :
                        $img_id = get_post_thumbnail_id();

                        echo wp_get_attachment_image(
                            $img_id,
                            'full',
                            false,
                            [
                                'class' => 'attachment-post-thumbnail size-post-thumbnail wp-post-image',
                                'style' => 'object-fit:cover;',
                            ]
                        );
                    endif;
                ?>
            </figure>
        </div>
    </div>

    <div class="container">
        <div entry-content wp-block-post-content is-layout-constrained wp-block-post-content-is-layout-constrained>
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
             ?>
        </div>
    </div>
    
    <div class="container">
        <div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained">
            <div class="wp-block-group date-time-outer is-layout-flex wp-block-group-is-layout-flex">
                <div class="wp-block-post-date has-small-font-size" style="font-style:italic;font-weight:400;">
                    <time datetime="<?php echo get_the_date( 'c' ); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                </div>
            </div>
        </div>
    </div>

    <div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>
</main>
<?php
get_footer();