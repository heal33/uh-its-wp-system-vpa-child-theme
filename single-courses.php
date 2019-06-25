<?php
/**
 * Template for displaying all single posts
 *
 */

get_header(); ?>
  <main id="main_area" class="one-column">
    <div id="main_content" class="container">
        <div id="content" role="main">

          <?php
          /*
           * Run the loop to output the post.
           * If you want to overload this in a child theme then include a file
           * called loop-single.php and that will be used instead.
           */
          get_template_part( 'loop', 'course' );
          ?>

        </div><!-- #content -->

<?php get_footer(); ?>
