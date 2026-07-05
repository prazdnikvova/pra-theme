<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$pra_count = get_comments_number();
			/* translators: %s: number of comments */
			printf( esc_html( _n( '%s comment', '%s comments', $pra_count, 'pra-theme' ) ), esc_html( number_format_i18n( $pra_count ) ) );
			?>
		</h2>

		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol' ) ); ?>
		</ol>

		<?php the_comments_navigation(); ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pra-theme' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
