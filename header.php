<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<?php get_template_part('partials/head') ?>

<body <?php body_class(); ?>>

<header id="top">
  <?php get_template_part('uh-header'); ?>
  <div id="ovpa_header_mid">
    <div class="ovpa_header_mid_inner container">
      <div class="d-flex justify-content-between">
        <div class="image">
          <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
        </div>
        <div class="search-form-container">
        <?php get_search_form(); ?>
        </div>
      </div> 
    </div>
    <nav id="header_btm" role="navigation" aria-label="main navigation">
      <div class="container">
      <a class="menu-toggle" aria-expanded="false">Menu <span class="screen-reader-text">Open Mobile Menu</span></a>
      <a class="search-mobile" href="#" class="dropdown-toggle">Search <span class="fa fa-search" aria-hidden="true"></span></a>
  
      <?php if ( has_nav_menu( 'primary' ) ) : ?>

        <div id="header_btm_content" class="nav justify-content-end">
          <?php wp_nav_menu(
            array(
              'theme_location'  => 'primary',
              'menu_id'         => 'header_sitemenu',
              'container'       => false,
              'container_id'    => false,
              'depth'           => 2
            )
          ); ?>
        </div>

        <?php else : ?>

          <?php $menu = array(
            'depth'        => 1,
            'sort_column'  => 'menu_order, post_title',
            'menu_class'   => 'menu page-menu',
            'menu_id'      => 'header_btm_content',
            'echo'         => 1,
            'authors'      => '',
            'sort_column'  => 'menu_order',
            'link_before'  => '',
            'link_after'   => '',
          );

          wp_page_menu( $menu ); ?>

      <?php endif; ?>
      </div>
    </nav>
  </div>
 


  <div id="department_name" style="background-image: url(<?php header_image(); ?>)">
    <div class="container">
      <?php system2018_get_breadcrumbs(); ?>
      <h1 class="entry-title">
        <?php if ( is_post_type_archive('courses') ) { ?>
          <?php if(get_search_query()) {
            printf( __( 'Course Search Results for: %s', 'system2018' ), '<span>' . get_search_query() . '</span>' ); ?>
          <?php } else { ?>
            Search Courses
          <?php } ?>
        <?php } elseif( is_search() ) { ?>
          <?php printf( __( 'Search Results for: %s', 'system2018' ), '<span>' . get_search_query() . '</span>' ); ?>
        <?php } elseif( is_archive() ) { ?>
          <?php echo get_the_archive_title(); ?>
          <?php //echo single_term_title(); ?>
        <?php } elseif( is_page_template('page-academic-group.php') ) { ?>
          <span class="parent-title">
            <?php
            global $post;
            $direct_parent = $post->post_parent;
            ?>
            <?php echo get_the_title($direct_parent); ?>:</span> <span class="child-page-title"><?php the_title(); ?></span>
        <?php } elseif( is_404() ) { ?>
          Error 404
        <?php } else { ?>
          <?php the_title(); ?>
        <?php } ?>
      </h1>
      <?php if ( is_post_type_archive('courses') ) { ?>
        <?php get_template_part('searchform', 'courses'); ?>
      <?php } ?>
      <?php if( is_search() && !(is_post_type_archive('courses')) ) { ?>
        <a class="search-courses-link" href="<?php echo get_home_url(); ?>/courses">Search courses only</a>
      <?php } ?>
    </div>
  </div>

</header>