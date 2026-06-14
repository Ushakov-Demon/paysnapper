<?php
$section_id     = $section['pcs_section_id'] ?: uniqid();
$small_title    = $section['pcs_section_small_title'];
$title          = $section['pcs_section_title'];
$description    = $section['pcs_section_desc'];
$info_items     = $section['pcs_info_items'];
$employees_list = $section['pcs_employees_list'];
?>

<section class="section section-trust" id="<?php echo esc_attr($section_id) ?>">
    <div class="container">
        <div class="section-head">
            <?php
            if ( ! empty( $small_title ) ) :
                ?>
                <span class="eyebrow">
                    <?php echo $small_title?>
                </span>
                <?php
            endif;
            ?>

            <h2 class="display-lg"><?php echo $title?></h2>

            <?php
            if ( ! empty( $description ) ) :
                ?>
                <p class="lead" style="margin-top: 1.25rem;">
                    <?php echo $description?>
                </p>
                <?php
            endif;
            ?>
        </div>

        <?php
        if ( ! empty( $info_items ) ) :
            ?>
            <div class="trust-card">
                <h3>Company &amp; licensing</h3>

                <div class="trust-grid">
                    <?php
                    foreach( $info_items as $item ) :
                        ?>
                        <div class="trust-item">
                            <label><?php echo $item['info_item_label']?></label>

                            <div class="value"><?php echo $item['info_item_value']?></div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;

        if ( ! empty( $employees_list ) ) :
            $emp_block_title = $section['pcs_emp_block_title'];
            $emp_block_desc  = $section['pcs_emp_block_desc'];
            $footer_txt      = $section['pcs_emp_block_footer_txt'];
            $footer_lnk      = $section['pcs_emp_block_footer_link_href'];
            ?>
            <div class="trust-card">
                <?php
                if( ! empty( $emp_block_title ) ) :
                    ?>
                    <h3><?php echo $emp_block_title?></h3>
                    <?php
                endif;

                if ( ! empty( $emp_block_desc ) ) :
                    ?>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; max-width: 60ch;">
                        <?php echo $emp_block_desc ?>
                    </p>
                    <?php
                endif;
                ?>

                <div class="team-grid">
                    <?php
                    foreach ( $employees_list as $employee ) :
                        $emp_id = $employee["id"];
                        $position = carbon_get_post_meta( $emp_id, 'emp_position' );
                        $linkedin = carbon_get_post_meta( $emp_id, 'emp_linkedin' );
                        $ava_id   = get_post_thumbnail_id( $emp_id );
                        ?>
                        <div class="team-card">
                            <div class="team-photo">
                                <?php echo wp_get_attachment_image( $ava_id )?>
                            </div>

                            <div class="name">
                                <span class="placeholder-pill"><?php echo get_the_title( $emp_id )?></span>
                            </div>

                            <?php
                            if ( ! empty( $position ) ) :
                                ?>
                                <div class="title"><?php echo $position?></div>
                                <?php
                            endif;

                            if ( ! empty( $linkedin ) ) :
                                ?>
                                <a href="<?php echo esc_url( $linkedin )?>" class="linkedin">LinkedIn →</a>
                                <?php
                            endif;
                            ?>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>

                <?php
                if ( ! empty( $footer_txt ) || ! empty ( $footer_lnk ) ) :
                    $footer_lnk_lbl = $section['pcs_emp_block_footer_link_txt'] ?: $footer_lnk;
                    ?>
                    <p class="team-link-out">
                        <?php echo $footer_txt?>

                        <?php
                        if ( ! empty( $footer_lnk ) ) :
                            ?>
                            <a href="<?php echo esc_url( $footer_lnk )?>"><?php echo $footer_lnk_lbl?></a>
                            <?php
                        endif;
                        ?>
                    </p>
                    <?php
                endif;
                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>