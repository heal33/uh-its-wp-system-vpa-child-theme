<?php
/**
 * The loop that displays posts
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div id="nav-above" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manoa2018' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manoa2018' ) ); ?></div>
  </div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
  <div id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e( 'Not Found', 'manoa2018' ); ?></h1>
    <div class="entry-content">
      <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'manoa2018' ); ?></p>
      <?php get_search_form(); ?>
    </div><!-- .entry-content -->
  </div><!-- #post-0 -->
<?php endif; ?>

<?php
while ( have_posts() ) :
  the_post();
?>

  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-content">
      <div class="entry-title-container">
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_title(); ?>
            <?php //manoa2018_posted_on(); ?>
            <?php
            if(basename(get_page_template()) === 'page-academic-group.php') {
              /*foreach (get_the_category() as $category){
                echo "<span> | ";
                echo $category->name;
                echo "</span>";
              }*/ ?>
              <span class="parent-title"> |
                <?php $direct_parent = $post->post_parent; ?>
                <?php echo get_the_title($direct_parent); ?>
              </span>
            <?php } ?>

          </a>
          <small> <?php echo get_post_type(); ?></small>
        </h2>
          <?php $dtags = get_the_term_list('','gened-tags','','');
          if ($dtags) { ?>
            <div class="dtags">
              <?php echo $dtags; ?>
            </div>
          <?php } ?>
      </div>

      <div class="entry-content">
        <?php if( !('courses' == get_post_type())) { ?>
          <?php the_excerpt(); ?>
        <?php } else {
          the_content();
        } ?>
        <div class="entry-meta">
          <?php if( 'courses' == get_post_type()) : ?>
            <?php manoa2018_categories(); ?>
          <?php endif; ?>
        </div>
        <?php
        wp_link_pages(
          array(
            'before' => '<div class="page-link">' . __( 'Pages:', 'manoa2018' ),
            'after'  => '</div>',
          )
        );
        ?>
      </div><!-- .entry-content -->
    </div>

  </div><!-- #post-## -->

  <?php //comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div id="nav-below" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manoa2018' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manoa2018' ) ); ?></div>
  </div><!-- #nav-below -->
<?php endif; ?>
