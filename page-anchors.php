<?php
/**
 * Template Name: Left Sidebar with Anchor Links
 *
 * A custom page template without sidebar.
 *
 */

get_header(); ?>

  <main id="main_area" class="left-sidebar">
    <div id="main_content" class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <?php get_sidebar(); ?>
        </div>
        <div class="col-lg-9 col-md-8">
          <?php
          /*
           * Run the loop to output the page.
           * If you want to overload this in a child theme then include a file
           * called loop-page.php and that will be used instead.
           */
          get_template_part( 'loop', 'anchors' );
          ?>
        </div>
      </div>

<?php get_footer(); ?>
