<?php
/**
 * The loop that displays a single course
 *
 */
?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) :
    the_post();
  ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="entry-meta">
        <?php manoa2018_categories();

          // Check if any term exists
          if ( ! empty( $terms ) && is_array( $terms ) ) {
              // Run a loop and print them all
              foreach ( $terms as $term ) { ?>
                  <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                      <?php echo $term->name; ?>
                  </a><?php
              }
          } ?>
      </div><!-- .entry-meta -->

      <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(
          array(
            'before' => '<div class="page-link">' . __( 'Pages:', 'manoa2018' ),
            'after'  => '</div>',
          )
        );
        ?>
      </div><!-- .entry-content -->

      <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries ?>
        <div id="entry-author-info">
          <div id="author-avatar">
            <?php
            /** This filter is documented in author.php */
            echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'manoa2018_author_bio_avatar_size', 60 ) );
            ?>
          </div><!-- #author-avatar -->
          <div id="author-description">
            <h2><?php printf( __( 'About %s', 'manoa2018' ), get_the_author() ); ?></h2>
            <?php the_author_meta( 'description' ); ?>
            <div id="author-link">
              <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'manoa2018' ), get_the_author() ); ?>
              </a>
            </div><!-- #author-link -->
          </div><!-- #author-description -->
        </div><!-- #entry-author-info -->
      <?php endif; ?>

      <div class="entry-utility">
        <?php $gened_tags = get_the_term_list('','gened-tags','','');
          echo $gened_tags; ?>
        <?php manoa2018_posted_in(); ?>
      </div><!-- .entry-utility -->
      <?php edit_post_link( __( 'Edit', 'manoa2018' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- #post-## -->

    <div id="nav-below" class="navigation">
      <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'manoa2018' ) . '</span> %title' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'manoa2018' ) . '</span>' ); ?></div>
    </div><!-- #nav-below -->

    <?php //comments_template( '', true ); ?>

  <?php endwhile;
}; // end of the loop. ?>
