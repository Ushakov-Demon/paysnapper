<?php
$gataways = $section['pg_gateways_list'];

if ( empty( $gataways ) ) {
    return;
}

$section_id = $section['pg_gateways_section_id'] ?: uniqid();
?>

<section class="regions-gatawey" id="<?php echo $section_id?>">
    <div class="container">
        <div class="wrap d-flex justify-content-center align-items-screth">
            <div class="side regions-side">
                <p class="side-hending">
                    <?php echo esc_html( $section['pg_gateways_section_list_title'] ); ?>
                </p>

                <div class="regions-list">
                    <?php
                    foreach ( $gataways as $gateway ) :
                        $image_url = wp_get_attachment_image_url( $gateway['pg_gateway_region_image'], 'full' );
                        ?>
                        <div class="region-item d-flex region-item d-flex align-items-center justify-content-between">
                            <div class="region">
                                <?php
                                if ( ! empty( $gateway['pg_gatawey_region_post_link'] ) ) :
                                    ?>
                                    <a href="<?php echo esc_url( $gateway['pg_gatawey_region_post_link'] ); ?>">
                                <?php endif; ?>   
                                    <img src="<?php echo esc_url( $image_url ); ?>" width="28" height="28" alt="<?php echo esc_attr( $gateway['pg_gateway_region_name'] ); ?>">

                                    <span class="region-name">
                                        <?php echo esc_html( $gateway['pg_gateway_region_name'] ); ?>
                                    </span>
                                <?php
                                if ( ! empty( $gateway['pg_gatawey_region_post_link'] ) ) :
                                    ?>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="region-gatawey">
                                <span>
                                    <?php echo esc_html( $gateway['pg_gateway_desc'] ); ?>
                                </span>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <div class="side infos-side d-flex flex-column">
                <?php
                if ( ! empty( $section['pg_section_marker'] ) ) :
                    ?>
                    <p class="marker-red">
                        <?php echo esc_html( $section['pg_section_marker'] ); ?>
                    </p>
                    <?php
                endif;
                ?>
                
                <h2><?php echo esc_html( $section['pg_section_title'] ); ?></h2>

                <p class="second">
                    <?php echo esc_html( $section['pg_section_desc'] ); ?>
                </p>

                <?php
                if ( ! empty( $section['pg_info_tiles'] ) ) :
                    ?>
                    <div class="info-tiles d-flex justify-content-center flex-wrap">
                        <?php
                        foreach ( $section['pg_info_tiles'] as $tile ) :
                            ?>
                            <div class="info-tile">
                                <p class="tile-title">
                                    <?php echo esc_html( $tile['pg_tile_title'] ); ?>
                                </p>

                                <p class="tile-description">
                                    <?php echo esc_html( $tile['pg_tile_desc'] ); ?>
                                </p>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>