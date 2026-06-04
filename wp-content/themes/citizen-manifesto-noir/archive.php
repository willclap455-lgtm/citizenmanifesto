<?php get_header(); ?>
<header class="archive-header">
	<p class="eyebrow"><?php esc_html_e( 'Archive', 'citizen-manifesto-noir' ); ?></p>
	<h1><?php the_archive_title(); ?></h1>
	<?php the_archive_description( '<p>', '</p>' ); ?>
</header>
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
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Archive pagination', 'citizen-manifesto-noir' ); ?>">
		<?php the_posts_pagination(); ?>
	</nav>
<?php else : ?>
	<section class="not-found"><h1><?php esc_html_e( 'Nothing filed here yet.', 'citizen-manifesto-noir' ); ?></h1></section>
<?php endif; ?>
<?php get_footer(); ?>
