<?php
/**
 * Template for displaying directory page
 */

get_header(); ?>

  <main id="main_area" class="full-width">
    <div id="main_content" class="container">


      <div id="content" role="main">

          <?php if ( have_posts() ) : ?>
            <?php get_template_part( 'loop', 'course-search' ); ?>
          <?php else : ?>
            <div id="post-0" class="post no-results not-found">
              <h2 class="entry-title"><?php _e( 'No Courses Found', 'uhm_catalog' ); ?></h2>
              <div class="entry-content">
                <p><?php _e( 'Sorry, but no courses matched your search criteria. Please try again with some different keywords.', 'uhm_catalog' ); ?></p>
              </div><!-- .entry-content -->
            </div><!-- #post-0 -->
          <?php endif; ?>

      </div><!-- #content -->

<?php get_sidebar('courses'); ?>
<?php get_footer(); ?>
