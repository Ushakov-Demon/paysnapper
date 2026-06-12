<?php
$blocks = $section['vbs_blocks'];

if ( empty( $blocks ) ) {
    return;
}

$section_id              = ! empty( $section['vbs_section_id'] ) ?: uniqid();
$section_bg_color        = $section['vbs_section_color'] ?: '#0d0d11';
$section_small_title     = $section['vbs_section_small_title'];
$section_title           = $section['vbs_section_title'];
$section_desc            = $section['vbs_section_desc'];
$section_blocks_type     = $section['vbs_block_type'];
$tile_wrapper_grid_class = $section['vbs_block_rows'];
$include_chain_block     = $section['vbs_iclude_chain_block'];
?>

<section class="section vbs-section" id="<?php echo esc_attr( $section_id ); ?>" style="background-color: <?php echo esc_attr( $section_bg_color ); ?>;">
  <div class="container">
    <div class="section-head">
      <?php
        if ( ! empty( $section_small_title ) ) :
            ?>
            <span class="eyebrow"><?php echo $section_small_title; ?></span>
            <?php
        endif;
        ?>
      <h2 class="display-lg"><?php echo $section_title; ?></h2>
        <?php
        if ( ! empty( $section_desc ) ) :
            ?>
            <p class="lead"><?php echo esc_html( $section_desc ); ?></p>
            <?php
        endif;
        ?>
    </div>

    <?php
    if ( $include_chain_block ) :
        $block_aria_label = $section['vbs_chain_block_aria_label'] ?: 'Payment flow comparison diagram';
        $vbs_chain = $section['vbs_chain_block'];

        if ( empty ( $vbs_chain ) ) {
            return;
        }
        ?>
        <div class="flow-diagram" aria-label="<?php echo esc_attr( $block_aria_label ); ?>">
            <?php
            foreach ( $vbs_chain as $chain_block ) :
                ?>
                <div class="flow-row">
                    <?php
                    if ( ! empty( $chain_block['chain_block_title']) ) :
                        ?>
                        <span class="flow-label">
                            <?php echo esc_html( $chain_block['chain_block_title'] ); ?>
                        </span>
                        <?php
                    endif;

                    if ( ! empty( $chain_block['chain_items'] ) ) :
                        $count_items = count( $chain_block['chain_items'] );
                        ?>
                        <div class="flow-chain">
                            <?php
                                foreach ( $chain_block['chain_items'] as $key => $item ) :
                                    $node_class = $item['chain_item_node_class'];
                                ?>
                                <span class="node <?php echo esc_attr( $node_class ); ?>"><?php echo esc_html( $item['chain_item_title'] ); ?></span>
                                <?php
                                    if ( $key+1 < $count_items ) :
                                        ?>
                                        <span class="arrow" aria-hidden="true">→</span>
                                        <?php
                                    endif;
                                endforeach;
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <p class="flow-takeaway">
                        <?php
                        if ( ! empty( $chain_block['chain_block_desc_before'] ) ) :
                            $before_class = $chain_block['vbs_chain_result'] === 'positive' ? 'ok' : 'bad';
                            ?>
                            <strong class="<?php echo esc_attr( $before_class ); ?>"><?php echo esc_html( $chain_block['chain_block_desc_before'] ); ?></strong> 
                            <?php
                        endif;

                        if ( ! empty( $chain_block['chain_block_desc'] ) ) :
                            echo esc_html( $chain_block['chain_block_desc'] );
                        endif;
                        ?>
                    </p>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <?php
    endif;
    ?>

    <div class="wrapper <?php echo esc_attr( $tile_wrapper_grid_class ); ?> d-flex">
        <?php
        foreach ( $blocks as $block ) :
            $selector_open = ! empty( $block['tile_lnk_href'] ) ? '<a href="' . esc_url( $block['tile_lnk_href'] ) . '" class="single-tile">' : '<div class="single-tile">';
            $selector_close = ! empty( $block['tile_lnk_href'] ) ? '</a>': '</div>';
            $link_btn = ! empty( $block['tile_lnk_href'] ) && ! empty( $block['tile_lnk_btn_label'] ) ? '<span class="link-btn">' . esc_html( $block['tile_lnk_btn_label'] ) . '</span>' : '';

            echo $selector_open;
                if ( ! empty( $block['tile_red_marker'] ) ) :
                    $marcker_class = $section_blocks_type === 'block_type_2' ? ' large-marker' : '';
                    ?>
                    <div class="red-marker<?php echo $marcker_class; ?>">
                        <?php echo esc_html( $block['tile_red_marker'] ); ?>
                    </div>
                    <?php
                endif;

                if ( $section_blocks_type === 'block_type_3' ) :
                    $icon_type = $block['tile_icon_type'];
                    ?>
                    <div class="tile-icon">
                        <?php
                            if ( $icon_type === 'image' && ! empty( $block['tile_icon'] ) ) :
                                $icon_url = wp_get_attachment_image_url( $block['tile_icon'], 'full' );
                                ?>
                                <img src="<?php echo esc_url( $icon_url ); ?>" alt="" aria-hidden="true" style="width: 36px; height: 36px; margin-bottom: 0.75rem;">
                                <?php
                            elseif ( $icon_type === 'svg' && ! empty( $block['tile_icon_svg_code'] )  ) :
                                echo $block['tile_icon_svg_code'];    
                            endif;
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <h3><?php echo $block['tile_title']; ?></h3>

                <p>
                    <?php echo esc_html( $block['tile_txt_content'] ); ?>
                </p>
            <?php
                echo $link_btn;

            echo $selector_close;
        endforeach;
        ?>  
    </div>
  </div>
</section>