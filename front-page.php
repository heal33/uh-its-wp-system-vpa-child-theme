<?php
/**
 * Template for displaying the home page
 */

get_header(); ?>

  <main id="main_area">

    <div class="featured-image">
      <?php if (get_theme_mod('home_banner') !='') : ?>
        <img src="<?php echo get_theme_mod('home_banner'); ?>" alt="UH students">
      <?php endif; ?>
      <div class="featured-links">
        <div class="container">
          <div class="left-link">
            <a href="<?php echo get_theme_mod('home-link-1-url'); ?>" title="go to <?php echo get_theme_mod('home-link-1'); ?>">
              <?php echo get_theme_mod('home-link-1'); ?>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
          <div class="right-link">
            <a href="<?php echo get_theme_mod('home-link-2-url'); ?>" title="go to <?php echo get_theme_mod('home-link-2'); ?>">
              <?php echo get_theme_mod('home-link-2'); ?>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div id="page-title" class="full-width-section">
      <div class="container page-title-wrapper">
          <h2>Welcome to the Office of Procurement Management</h2>
          <span>The central system office for procurement policy, guidance, and process</span>
        </div>
    </div><!-- section -->

    <div id="main_content">
      <div class="container">
        <div id="content" role="main">

          <?php if ( have_posts() ) {
            while ( have_posts() ) :
              the_post();
            ?>

            <?php //the_content(); ?>

          <?php endwhile;
          }; // end of the loop. ?>

          <?php if ( is_active_sidebar( 'homepage-widget-area-2' ) ) : ?>

            <div class="row homepage-widgets-featured">
              <?php dynamic_sidebar( 'homepage-widget-area-2' ); ?>
            </div>

          <?php endif; // end widget area 2 ?>

          <?php if ( is_active_sidebar( 'homepage-widget-area' ) ) : ?>

             <ul class="xoxo homepage-widgets">
             <?php dynamic_sidebar( 'homepage-widget-area' ); ?>
             </ul>

          <?php endif; // end primary widget area ?>


        </div><!-- #content -->
      </div>
    </div>

<?php get_footer(); ?>
