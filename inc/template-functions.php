<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Electric
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function electric_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'electric_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function electric_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'electric_pingback_header' );

// return a string of a list of posts for a specific category
// takes a post. we get the category from the post & find 5 posts in that category
function electric_posts_in_category($category_id, $class = 'posts-in-category') {
	
	$list = '';
	
	$args = array(
    'posts_per_page'   => 5,
    'category'         => $category_id,
		'exclude'          => get_the_ID(),
    'orderby'          => 'rand',
    'post_type'        => 'post'
	);

	$posts = get_posts($args);
	// echo '<pre>';
	// var_dump($posts);
	// echo '</pre>';
	
	$list = $list . '<ul class="' . $class . '">';
	
	for ($i = 0; $i < count($posts); $i++) {
		$post_id = $posts[$i]->ID;
		$post_url = get_permalink($post_id);
		$post_title = $posts[$i]->post_title;
		
		$list = $list . '<li><a href="' . $post_url . '">' . $post_title . '</a></li>';
	}
	$list = $list . '</ul">';
	
	echo $list;
	return $list;
}

function electric_posts_in_categories($class = 'posts-in-category') {
	$categories = get_the_category();
	
	// echo '<pre>';
	// var_dump($categories);
	// echo '</pre>';
	
	$category_ids = array();
	
	for ($i = 0; $i < count($categories); $i++) {
		array_push($category_ids, $categories[$i]->cat_ID);
	}
	
	return electric_posts_in_category($category_ids, $class);
	
}

// change text in the comment form

function electric_modify_text_before_comment_form($arg) {
  $arg['comment_notes_before'] = '<p>Please be respectful to other commenters. You can disagree, but not in a mean way. </p> '.
	'<p class="comment-notes">' . __( 'Your email address will not be published. ' ) . '</p>';
  return $arg;
}

add_filter('comment_form_defaults', 'electric_modify_text_before_comment_form');