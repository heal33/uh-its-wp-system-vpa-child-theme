<?php
/**
Template Name: Academic Group Main
 *
 * A custom page template for pages with the sidebar on the left.
 *
 */
get_header();
$children = get_pages( array( 'child_of' => $post->ID ) );
?>

  <main id="main_area" class="<?php if( count( $children ) == 0 ) {
        echo 'one-column'; } else { echo 'left-sidebar'; } ?>">
    <div id="main_content" class="container">


        <?php if( count( $children ) == 0 ) { } else { ; ?>
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <?php get_sidebar(); ?>
            </div>
        <?php } ?>

        <?php if( count( $children ) == 0 ) { } else { ; ?>
          <div class="col-lg-9 col-md-8">
        <?php } ?>
          <?php
          /*
           * Run the loop to output the page.
           * If you want to overload this in a child theme then include a file
           * called loop-page.php and that will be used instead.
           */
          get_template_part( 'loop', 'academic-group-main' );
          ?>
        <?php if( count( $children ) == 0 ) { } else { ; ?></div>
          </div>
        <?php } ?>

<?php get_footer(); ?>
