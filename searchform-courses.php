<?php
/**
 * Template for displaying courses search form
 */
?>
<form role="search" method="get" class="search-form" id="courses-search-container" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="hidden assistive-text screen-reader-text" for="courses-search"><?php echo _e( 'Search courses:', 'label' ); ?>
	</label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_e( 'Enter search terms', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="courses-search" />
	<input type="hidden" name="post_type" value="courses" />
	<button type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Search', 'submit button' ); ?>"><span class="screen-reader-text">Search all courses</span><i class="fa fa-search"></i></button>
</form>