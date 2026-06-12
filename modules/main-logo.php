<a class="navbar-brand" href="<?php echo home_url(); ?>">
    <?php
    if ( has_custom_logo() ) :
        the_custom_logo(); 
    else:
        ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/paysnapper6.png" width="206" height="37">
        <?php
    endif;
    ?>
</a>