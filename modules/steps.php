<?php
$steps = $section['steps_list'];

if ( empty( $steps ) ) {
    return;
}

$section_id = $section['steps_section_id'] ?: uniqid();
$section_title = $section['steps_section_title'];
$section_desc = $section['steps_section_desc'];
?>

<section class="section-steps" id="<?php echo $section_id ?>">
    <div class="container">
        <h2 class="section-title"><?php echo $section_title; ?></h2>

        <p class="section-description"><?php echo $section_desc; ?></p>

        <div class="steps-list d-flex justify-content-between flex-wrap">
            <?php
            foreach ( $steps as $key => $step ) :
                ?>
                <div class="step-item">
                    <div class="step-number">
                        <?php echo $key + 1; ?>
                    </div>

                    <h3 class="step-title">
                        <?php echo $step['step_title']; ?>
                    </h3>

                    <?php
                    if ( ! empty( $step['step_desc'] ) ) :
                        ?>
                        <p class="step-description">
                            <?php echo $step['step_desc']; ?>
                        </p>
                        <?php
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>