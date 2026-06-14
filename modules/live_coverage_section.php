<?php
$list = $section['lc_countries_list'];

if ( empty( $list ) ) {
    return;
}

$section_id             = $section['lc_section_id'] ?: uniqid();
$section_aria_label     = $section['lc_aria_label'];
$small_title            = $section['lc_section_small_title'];
$title                  = $section['lc_section_title'];
$description            = $section['lc_section_desc'];
$widget_title           = $section['lc_widget_title'];
$widget_status_str      = $section['lc_widget_status_str'];
$widget_footer_txt      = $section['lc_widget_footer_txt'];
$widget_footer_lnk_txt  = $section['lc_widget_footer_lnk_txt'];
$widget_footer_lnk      = $section['lc_widget_footer_lnk'];
?>

<section class="section section-status" id="<?php echo $section_id?>">
    <div class="container">
        <div class="section-head">
            <?php
            if ( ! empty( $small_title ) ) :
                ?>
                <span class="eyebrow"><?php echo $small_title?></span>
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

        <div class="status-widget" role="region" aria-label="<?php echo $section_aria_label ?>">
            <div class="status-widget-header">
                <span class="status-widget-title">
                    <span class="dot success"></span>
                    <?php echo $widget_title?>
                </span>

                <span class="status-overall">
                    <span class="dot success"></span> <?php echo $widget_status_str ?>
                </span>
            </div>

            <div class="status-rows">
                <?php
                foreach ( $list as $item ) :
                    $stat_num = number_format( mt_rand( 9900, 10000 ) / 100, 2 );
                ?>
                <div class="status-row">
                    <div class="status-row-left">
                        <span style="font-size:1.3rem;">
                            <img src="<?php echo esc_url( $item['lc_country_flag'] )?>" width="28" height="28" alt="<?php echo $item['lc_country_name']?>">
                        </span>

                        <div>
                            <div class="status-row-name">
                                <?php echo $item['lc_country_pay']?>
                            </div>

                            <div class="status-row-country">
                                <?php echo $item['lc_country_name']?>
                            </div>
                        </div>
                    </div>

                    <div class="status-row-bar">
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                        <span class="bar-tick"></span>
                    </div>

                    <div class="status-row-right">
                        <strong><?php echo $stat_num ?>%</strong> uptime
                    </div>
                </div>
                    <?php
                endforeach;
                ?>
            </div>

            <?php
            if ( ! empty( $widget_footer_lnk ) ) :
                ?>
                <div class="status-footer">
                    <?php
                    if ( ! empty( $widget_footer_txt ) ) :
                        ?>
                        <span><?php echo $widget_footer_txt?></span>
                        <?php
                    endif;
                    ?>

                    <a href="<?php echo $widget_footer_lnk?>"><?php echo $widget_footer_lnk_txt?> →</a>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>