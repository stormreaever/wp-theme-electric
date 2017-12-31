<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Electric
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-footer-sections">
			<section class="site-info">
				<p>Quisque eget malesuada elit. Mauris id molestie erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat lacus. Cras pharetra sodales dui, sed vehicula leo malesuada vitae. </p>
				<div class="social-icons">
					<a class="twitter-icon" href="https://twitter.com/kathrynhartog"><?php include (get_template_directory() . '/assets/img/icon-twitter.svg'); ?></a>
					<a class="github-icon" href="https://github.com/stormreaever"><?php include (get_template_directory() . '/assets/img/icon-github.svg'); ?></a>
					<a class="email-icon" href="mailto:kat.danger.ev@gmail.com"><?php include (get_template_directory() . '/assets/img/icon-email.svg'); ?></a>
				</div>
			</section><!-- .site-info -->
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
			<?php endif; ?>
		</div>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<?php dynamic_sidebar( 'footer-2' ); ?>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
