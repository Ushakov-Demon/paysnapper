<?php
$tax_list = $section['faqs_list'];

if ( empty( $tax_list ) ) {
    return;
}

$faq_query = new WP_Query( array(
	'post_type'      => 'faq',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'tax_query'      => array(
		array(
			'taxonomy' => 'faq_cat',
			'field'    => 'term_id',
			'terms'    => array_map( 'intval', array_column( $tax_list, 'id' ) ),
		),
	),
) );

if ( ! $faq_query->have_posts() ) {
    return;
}

$section_id  = $section['fs_section_id'] ?: uniqid();
$small_title = $section['fs_section_small_title'];
$title       = $section['fs_section_title'];
?>

<section class="section section-faq" id="<?php echo $section_id?>">
    <div class="container">
        <div class="section-head" style="text-align: center; margin-inline: auto;">
            <?php
            if ( ! empty( $small_title ) ) :
            ?>
            <span class="eyebrow" style="text-align:center;"><?php echo $small_title?></span>
            <?php
            endif;
            ?>

            <h2 class="display-lg"><?php echo $title?></h2>
        </div>

        <div class="faq-list">
            <?php
            while ( $faq_query->have_posts() ) :
                $faq_query->the_post();
                ?>
                <details class="faq-item">
                    <summary>
                        <?php the_title()?> <span class="faq-toggle">+</span>
                    </summary>

                    <div class="faq-answer"><?php the_content()?></div>
                </details>
                <?php
            endwhile;
            ?>
        </div>
    </div>
</section>