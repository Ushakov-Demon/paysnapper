<?php
$merchants_list = $section['pb_merchants_list'];

if ( empty( $merchants_list ) ) {
    return;
}

$section_id  = $section['pb_section_id'] ?: uniqid();
$small_title = $section['pb_section_small_title'];
$title       = $section['pb_section_title'];
?>

<section class="section section-coverage" id="<?php echo $section_id?>">
    <div class="container">
        <div class="section-head">
            <?php
            if ( ! empty( $small_title ) ) :
                ?>
                <span class="eyebrow"><?php echo $small_title ?></span>
                <?php
            endif;
            ?>
            <h2 class="display-lg"><?php echo $title ?></h2>
        </div>

        <div class="case-grid">
            <?php
            foreach( $merchants_list as $item ) :
                $href_selector_start = ! empty( $item['merchant_url'] ) ? "<a href='" . $item['merchant_url'] . "' class='case-card'>" : "<div class='case-card'>";
                $href_selector_end   = ! empty( $item['merchant_url'] ) ? "</a>" : "</div>";
                
                echo $href_selector_start ;
                ?>
                <div class="case-logo">
                    <image src="<?php echo $item['merchant_logo']?>" alt="<?php echo $item['merchant_name']?>" width="265" height="60"></image>
                </div>

                <span class="industry-tag"><?php echo $item['merchant_industry']?></span>

                <h3>
                    <span class="placeholder-pill"><?php echo $item['merchant_name']?></span>
                </h3>

                <?php
                if ( ! empty( $item['merchant_short_desc'] ) ) :
                    ?>
                    <p><?php echo $item['merchant_short_desc']?></p>
                    <?php
                endif;

                echo $href_selector_end;
                
            endforeach;
            ?>    
        </div>
    </div>
</section>