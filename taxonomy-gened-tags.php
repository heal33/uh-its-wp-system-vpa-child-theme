<?php
/**
 * Template for displaying Archive pages
 */

get_header(); ?>

  <main id="main_area" class="full-width">
    <div id="main_content" class="container">

      <div id="content" role="main">

        <?php
        if ( have_posts() ) {
          the_post();
        }
        ?>

        <?php get_sidebar('courses'); ?>
        <br />
          <?php
            /*
             * Since we called the_post() above, we need to
             * rewind the loop back to the beginning that way
             * we can run the loop properly, in full.
             */
            rewind_posts();

            /*
             * Run the loop for the archives page to output the posts.
             * If you want to overload this in a child theme then include a file
             * called loop-archive.php and that will be used instead.
             */
            get_template_part( 'loop', 'courses' );
          ?>

      </div><!-- #content -->
<?php get_footer(); ?>
