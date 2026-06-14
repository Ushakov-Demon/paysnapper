<?php
$small_title = $section['om_section_small_title'];
$section_desc = $section['om_section_desc'];
$left_items = $section['om_items'];
?>

<section class="section om-section" id="<?php echo esc_attr( $section_id ); ?>">
    <div class="container">
        <div class="settlement-grid">
            <div class="side">
                <?php
                if ( ! empty( $small_title ) ) :
                    ?>
                    <span class="eyebrow"><?php echo $small_title?></span>
                    <?php
                endif;
                ?>

                <h2 class="display-lg" style="margin-top: 1rem;">
                    <?php echo $section['om_section_title']?>
                </h2>

                <p class="lead" style="margin-top: 1.5rem;">
                    <?php echo $section_desc?>
                </p>

                <?php
                if ( ! empty( $left_items ) ) :
                    ?>
                    <div class="settlement-list">
                        <?php
                        foreach ( $left_items as $item ) :
                            ?>
                            <div class="settle-item">
                                <?php
                                if ( ! empty( $item['om_item_bage'] ) ) :
                                    ?>

                                    <span class="settle-tag"><?php echo $item['om_item_bage']?></span>

                                    <?php
                                endif;
                                ?>
                                <div>
                                    <h3><?php echo $item['om_item_title']?></h3>

                                    <?php
                                    if ( ! empty( $item['om_item_desc'] ) ) :
                                        ?>

                                        <p><?php echo $item['om_item_desc']?></p>

                                        <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <div class="side currency-orbit" aria-hidden="true">
                <div class="currency-ring outer"></div>

                <div class="currency-ring"></div>

                <?php
                if ( ! empty( $section['om_section_right_center_element'] ) ) :
                    ?>
                    <div class="currency-center"><?php echo wpautop( $section['om_section_right_center_element'] )?></div>
                    <?php
                endif;

                if ( ! empty( $section['om_section_right_right_element'] ) ) :
                    ?>
                    <div class="currency-bubble right"><?php echo $section['om_section_right_right_element']?></div>
                    <?php
                endif;

                if ( ! empty( $section['om_section_right_bottom_element'] ) ) :
                    ?>
                    <div class="currency-bubble bottom"><?php echo $section['om_section_right_bottom_element']?></div>
                    <?php
                endif;

                if ( ! empty( $section['om_section_right_left_element'] ) ) :
                    ?>
                    <div class="currency-bubble left">USDT</div>
                    <?php
                endif;

                if ( ! empty( $section['om_section_right_top_element'] ) ) :
                    ?>
                    <div class="currency-bubble top"><?php echo $section['om_section_right_top_element']?></div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>