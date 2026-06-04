<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2><?php printf( esc_html( _nx( 'One response', '%1$s responses', get_comments_number(), 'comments title', 'citizen-manifesto-signal' ) ), number_format_i18n( get_comments_number() ) ); ?></h2>
		<ol class="comment-list"><?php wp_list_comments(); ?></ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
