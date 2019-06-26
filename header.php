<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- for mobile display -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) {
    echo " | $site_description";
}

    // Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
    echo esc_html( ' | ' . sprintf( __( 'Page %s', 'system2018' ), max( $paged, $page ) ) );
}

    ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- get favicon -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png" />
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- load google fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
<!-- load font awesome icons -->
<script src="https://use.fontawesome.com/bfcbe1540c.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="top">
  <?php get_template_part('uh-header'); ?>
  <div id="header_mid">
    <div class="container">
      <a class="site-name-description" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <div class="image">
          <img id="header-seal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/UH-logo.svg" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/UH-logo.svg 1x, <?php echo get_stylesheet_directory_uri(); ?>/images/UH-logo.svg 2x" alt="University of Hawai&#699;i at M&#257;noa" />
        </div>
        <h1 id="header_sitename">
          <div class="uhm-title"><span class="uh">University of Hawai&#8216;i</span><span class="registered-trademark">&reg;</span> <span class="manoa">System</span></div>
          <div class="site-title"><?php bloginfo( 'name' ); ?></div>
        </h1>
      </a>
    </div>
  </div>
  <nav id="header_btm" role="navigation" aria-label="main navigation">
    <div class="container">
      <a class="menu-toggle" aria-expanded="false">Menu <span class="screen-reader-text">Open Mobile Menu</span></a>
      <a class="search-mobile" href="#" class="dropdown-toggle">Search <span class="fa fa-search" aria-hidden="true"></span></a>
      <div class="search-form-container container">
        <?php get_search_form(); ?>
      </div>
      <?php if ( has_nav_menu( 'primary' ) ) : ?>

        <div id="header_btm_content">
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

