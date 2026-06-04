<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<header class="single-header">
		<p class="eyebrow"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></p>
		<h1><?php the_title(); ?></h1>
		<div class="single-meta"><?php citizen_manifesto_signal_posted_on(); ?></div>
	</header>
	<div class="single-layout">
		<article <?php post_class( 'single-content' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</article>
		<aside class="single-sidebar" aria-label="<?php esc_attr_e( 'Article context', 'citizen-manifesto-signal' ); ?>">
			<section class="sidebar-card">
				<h2><?php esc_html_e( 'Report context', 'citizen-manifesto-signal' ); ?></h2>
				<p><?php esc_html_e( 'Use categories, tags, and source links to keep allegations transparent and traceable.', 'citizen-manifesto-signal' ); ?></p>
				<?php the_category( ', ' ); ?>
				<?php the_tags( '<p>', ', ', '</p>' ); ?>
			</section>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-area"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
			<?php endif; ?>
		</aside>
	</div>
	<?php the_post_navigation(); ?>
	<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>
