<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Electric
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	
	<h2 class="comments-title">
		Comments
	</h2><!-- .comments-title -->
	
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'electric_comments'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'electric' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields = array(

  'author' =>
    '<div class="comment-form-element comment-form-author"><label for="author"><span class="comment-form-element-label">' . __( 'Name', 'domainreference' ) . 
    '</span><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></label></div>',

  'email' =>
    '<div class="comment-form-element comment-form-email"><label for="email"><span class="comment-form-element-label">' . __( 'Email', 'domainreference' ) .
    '</span><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></label></div>'
	);
	
	$comment_field = '<div class="comment-form-element comment-form-comment"><label for="comment"><span class="comment-form-element-label">' . _x( 'Comment', 'electric' ) .
    '</span><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></label></div>';
	
	comment_form( array(
		'fields' => $fields,
		'comment_field' => $comment_field
	) );
	
	
	?>

</div><!-- #comments -->
