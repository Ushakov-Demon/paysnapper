<?php
/**
 * Template part for displaying blog post or pages previews.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Paysnapper
 */

$post_type = get_post_type();
?>

<li class="wp-block-post post-1 post type-post status-publish format-standard has-post-thumbnail hentry category-1">
    <div class="wp-block-group">
        <?php
        if ( has_post_thumbnail() ) :
            $post_img = get_post_thumbnail_id( get_the_ID() );
            ?>
            <div class="post-img is-layout-constrained wp-block-group-is-layout-constrained">
                <figure style="margin-top:calc(1.75 * var(--wp--style--block-gap));">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                            echo wp_get_attachment_image(
                                $post_img,
                                'full',
                                false,
                                [
                                    'class' => 'wp-post-image',
                                    'style' => 'object-fit:cover;',
                                ]
                            );
                        ?>
                    </a>
                </figure>
            </div>
            <?php
        endif;
        ?>

        <div class="post-text">
            <h2 class="alignwide wp-block-post-title has-var-wp-custom-typography-font-size-huge-clamp-2-25-rem-4-vw-2-75-rem-font-size">
                <a href="<?php the_permalink(); ?>" target="_self">
                    <?php the_title(); ?>
                </a>
            </h2>

            <?php
            if ( has_excerpt() ) :
                ?>
                <div class="wp-block-post-excerpt">
                    <p class="wp-block-post-excerpt__excerpt">
                        <?php the_excerpt(); ?>
                    </p>
                </div>
                <?php
            endif;

            if ( 'page' !== $post_type ) :
                ?>
                <div class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
                    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:650px">
                        <div style="font-style:italic;font-weight:400;" class="wp-block-post-date has-small-font-size">
                            <time datetime="2024-11-05T17:37:44+03:00">
                                <?php echo get_the_date(); ?>
                            </time>
                        </div>
                    </div>

                    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow"></div>
                </div>
                <?php
            endif;
            ?>
        </div>

        <div style="height:112px" aria-hidden="true" class="wp-block-spacer"></div>
    </div>
</li>