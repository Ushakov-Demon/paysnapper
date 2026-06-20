<?php
$countries = new WP_Query( array(
	'post_type'   => 'country',
	'post_status' => 'publish',
) );

if ( ! $countries->have_posts() ) {
    return;
}

$link_wrap = false;

$section_id = $section['pg_section_id'] ?: uniqid();
$small_title = $section['pg_section_marker'];
$title = $section['pg_section_title'];
$description = $section['pg_section_desc'];
?>

<section class="section vbs-section section-coverage" id="<?php echo $section_id; ?>">
  <div class="container">
    <div class="section-head">
    <?php
        if ( ! empty( $small_title ) ) :
        ?>
        <span class="eyebrow"><?php echo $small_title; ?></span>
        <?php
    endif;
    ?>

      <h2 class="display-lg"><?php echo $title; ?></h2>

    <?php
    if ( ! empty( $description ) ) :
        ?>
        <p class="lead"><?php echo esc_html( $description ); ?></p>
        <?php
    endif;
    ?>
    </div>

    <div class="coverage-table-wrap">
      <table class="coverage-table">
        <thead>
          <tr>
            <th>Country</th>

            <th>Local wallets</th>
          </tr>
        </thead>

        <tbody>
        <?php
        while ( $countries->have_posts() ) :
            $countries->the_post();

            $cId     = get_the_ID( $cId );
            $c_title = get_the_title( $cId );
            $flag    = carbon_get_post_meta( $cId, 'cnt_flag_icon' );
            $walets  = carbon_get_post_meta( $cId, 'cnt_local_wallets' );

            if ( $link_wrap ) {
                $region_selector_start = '<a href="' . esc_url( get_the_permalink( $cId ) ) . '" class="country-cell">';
                $region_selector_end = '</a>';
            } else {
                $region_selector_start = '<div class="country-cell">';
                $region_selector_end = '</div>';
            }
            ?>
            <tr>
                <td>
                    <?php echo $region_selector_start; ?>
                        <span class="country-flag">
                            <img src="<?php echo esc_url( $flag ); ?>" width="28" height="28" alt="<?php echo esc_attr( $c_title ); ?>">
                        </span>

                        <span class="country-name"><?php echo esc_html( $c_title ); ?></span>
                    <?php echo $region_selector_end; ?>
                </td>

                <td>
                    <div class="wallet-list">
                    <?php
                    foreach ( $walets as $walet ) :
                        $method_selector = $link_wrap ? '<a href="' . esc_url( get_the_permalink( $walet['id'] ) ) . '" class="wallet-tag">' : '<span class="wallet-tag">';
                        $method_selector_end = $link_wrap ? '</a>' : '</span>';
                        ?>
                            <?php echo $method_selector; ?>
                                <?php echo get_the_title( $walet['id'] ) ; ?>
                            <?php echo $method_selector_end; ?>
                        <?php
                    endforeach;
                    ?>
                    </div>
                </td>
            </tr>
            <?php
        endwhile;

        wp_reset_postdata();
        ?>
        </tbody>
      </table>
    </div>
  </div>
</section>