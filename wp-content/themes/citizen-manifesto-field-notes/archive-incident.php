<?php get_header(); ?>
<header class="archive-header incident-archive">
	<p class="eyebrow"><?php esc_html_e( 'Incident archive', 'citizen-manifesto-field-notes' ); ?></p>
	<h1><?php esc_html_e( 'Documented police incidents', 'citizen-manifesto-field-notes' ); ?></h1>
	<p><?php esc_html_e( 'Browse incident files by date, place, jurisdiction, status, and source documentation.', 'citizen-manifesto-field-notes' ); ?></p>
</header>
<?php if ( have_posts() ) : ?>
	<div class="post-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'post-card' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="post-card__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'citizen-manifesto-field-notes-card' ); ?></a>
				<?php endif; ?>
				<div class="post-card__body">
					<div class="post-card__meta"><?php esc_html_e( 'Incident file', 'citizen-manifesto-field-notes' ); ?></div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php citizen_manifesto_field_notes_incident_facts(); ?>
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Incident pagination', 'citizen-manifesto-field-notes' ); ?>">
		<?php the_posts_pagination(); ?>
	</nav>
<?php else : ?>
	<section class="not-found"><h1><?php esc_html_e( 'No incident files have been published yet.', 'citizen-manifesto-field-notes' ); ?></h1></section>
<?php endif; ?>
<?php get_footer(); ?>
