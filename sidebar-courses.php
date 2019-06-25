<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 */
?>


    <?php if(category_description()) { ?>
        <div id="category-description" class="narrow-sidebar" role="complementary">
            <?php echo category_description(); ?>
        </div><!-- #primary .widget-area -->
    <?php } ?>
