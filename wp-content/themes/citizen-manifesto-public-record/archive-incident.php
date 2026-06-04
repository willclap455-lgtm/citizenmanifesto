<?php get_header(); ?>
<header class="archive-header incident-archive">
	<p class="eyebrow"><?php esc_html_e( 'Incident archive', 'citizen-manifesto-public-record' ); ?></p>
	<h1><?php esc_html_e( 'Documented police incidents', 'citizen-manifesto-public-record' ); ?></h1>
	<p><?php esc_html_e( 'Browse incident files by date, place, jurisdiction, status, and source documentation.', 'citizen-manifesto-public-record' ); ?></p>
</header>
<?php if ( have_posts() ) : ?>
	<div class="post-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'post-card' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="post-card__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'citizen-manifesto-public-record-card' ); ?></a>
				<?php endif; ?>
				<div class="post-card__body">
					<div class="post-card__meta"><?php esc_html_e( 'Incident file', 'citizen-manifesto-public-record' ); ?></div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php citizen_manifesto_public_record_incident_facts(); ?>
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Incident pagination', 'citizen-manifesto-public-record' ); ?>">
		<?php the_posts_pagination(); ?>
	</nav>
<?php else : ?>
	<section class="not-found"><h1><?php esc_html_e( 'No incident files have been published yet.', 'citizen-manifesto-public-record' ); ?></h1></section>
<?php endif; ?>
<?php get_footer(); ?>
