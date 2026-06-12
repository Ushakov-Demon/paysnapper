<?php
$countries = $section['pg_counries_list'];

if ( empty( $countries ) ) {
    return;
}

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
        foreach ( $countries as $country ) :
            if ( ! empty( $country['pg_gatawey_region_post_link'] ) ) {
                $region_selector_start = '<a href="' . esc_url( $country['pg_gatawey_region_post_link'] ) . '" class="country-cell">';
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
                            <img src="<?php echo esc_url( $country['pg_gateway_region_image'] ); ?>" width="28" height="28" alt="<?php echo esc_attr( $country['pg_gateway_region_name'] ); ?>">
                        </span>

                        <span class="country-name"><?php echo esc_html( $country['pg_gateway_region_name'] ); ?></span>
                    <?php echo $region_selector_end; ?>
                </td>

                <td>
                    <div class="wallet-list">
                    <?php
                    foreach ( $country['pg_region_gateway_list'] as $gateway ) :
                        $method_selector = ! empty( $gateway['pg_gateway_lnk'] ) ? '<a href="' . esc_url( $gateway['pg_gateway_lnk'] ) . '" class="wallet-tag">' : '<span class="wallet-tag">';
                        $method_selector_end = ! empty( $gateway['pg_gateway_lnk'] ) ? '</a>' : '</span>';
                        ?>
                            <?php echo $method_selector; ?>
                                <?php echo esc_html( $gateway['pg_gateway_name'] ); ?>
                            <?php echo $method_selector_end; ?>
                        <?php
                    endforeach;
                    ?>
                    </div>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
        </tbody>
      </table>
    </div>
  </div>
</section>