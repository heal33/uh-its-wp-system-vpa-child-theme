<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 */
?>

  <div id="primary" class="widget-area" role="complementary">
    <?php global $post; // Setup the global variable $post

    if ( is_page() && $post->post_parent && !( is_page_template('page-academic-group-main.php') ) ) {
      // Make sure we are on a page and that the page is a parent.
      $kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0&link_before=<span class="fa fa-chevron-left" aria-hidden="true"></span>' );
    } else {
      $kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0&link_before=<span class="fa fa-chevron-left" aria-hidden="true"></span>' );
    }
    if ( $kiddies ) {
      echo '<ul class="secondary">';
        if(is_page_template('page-academic-group-main.php')) { ?>
          <li class="school-parent current_page_item"><a href="#content"><?php the_title(); ?></a></li>
        <?php }
        if(is_page_template('page-academic-group.php')) {
          global $post;
          $direct_parent_url = get_permalink($post->post_parent);
          $direct_parent_title = get_the_title($post->post_parent); ?>
          <li class="school-parent"><a href="<?php echo $direct_parent_url; ?>"><?php echo $direct_parent_title; ?></a></li>
        <?php }
        echo $kiddies;
      echo '</ul>';
    } ?>

    <?php if( ! ( is_page_template('page-academic-group-main.php') || is_page_template('page-academic-group.php') ) ) : ?>
      <ul class="xoxo">
        <?php
        if ( ! dynamic_sidebar( 'primary-widget-area' ) ) :
          ?>

        <?php endif; // end primary widget area ?>
      </ul>
    <?php else : ?>

    <?php endif; ?>
  </div><!-- #primary .widget-area -->
