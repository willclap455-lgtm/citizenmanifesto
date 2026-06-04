<?php get_header(); ?>
<section class="not-found">
	<p class="eyebrow"><?php esc_html_e( '404', 'citizen-manifesto-field-notes' ); ?></p>
	<h1><?php esc_html_e( 'This record could not be found.', 'citizen-manifesto-field-notes' ); ?></h1>
	<p><?php esc_html_e( 'Try searching the archive or checking the incident index.', 'citizen-manifesto-field-notes' ); ?></p>
	<?php get_search_form(); ?>
</section>
<?php get_footer(); ?>
