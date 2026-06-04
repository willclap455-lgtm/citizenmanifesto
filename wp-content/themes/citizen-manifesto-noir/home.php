<?php get_header(); ?>
<section class="home-intro">
	<p class="eyebrow">Citizen Manifesto</p>
	<h1>Evidence belongs in public view.</h1>
	<p>A severe, document-forward theme built for source notes, redacted records, incident archives, and accountability coverage.</p>
	<div class="issue-strip" aria-label="<?php esc_attr_e( 'Editorial focus areas', 'citizen-manifesto-noir' ); ?>">
		<div><span><?php esc_html_e( 'Focus', 'citizen-manifesto-noir' ); ?></span><strong><?php esc_html_e( 'Police misconduct', 'citizen-manifesto-noir' ); ?></strong></div>
		<div><span><?php esc_html_e( 'Method', 'citizen-manifesto-noir' ); ?></span><strong><?php esc_html_e( 'Records plus witnesses', 'citizen-manifesto-noir' ); ?></strong></div>
		<div><span><?php esc_html_e( 'Archive', 'citizen-manifesto-noir' ); ?></span><strong><?php esc_html_e( 'Incidents by place', 'citizen-manifesto-noir' ); ?></strong></div>
	</div>
</section>

<?php if ( have_posts() ) : ?>
	<div class="post-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'post-card' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="post-card__image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'citizen-manifesto-noir-card' ); ?></a>
				<?php endif; ?>
				<div class="post-card__body">
					<div class="post-card__meta"><?php citizen_manifesto_noir_posted_on(); ?></div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'citizen-manifesto-noir' ); ?>">
		<?php the_posts_pagination(); ?>
	</nav>
<?php else : ?>
	<section class="not-found">
		<h1><?php esc_html_e( 'No reports published yet.', 'citizen-manifesto-noir' ); ?></h1>
		<p><?php esc_html_e( 'Start with a sourced report, public record, or documented incident.', 'citizen-manifesto-noir' ); ?></p>
	</section>
<?php endif; ?>
<?php get_footer(); ?>
