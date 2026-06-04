<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<header class="single-header">
		<p class="eyebrow"><?php esc_html_e( 'Page', 'citizen-manifesto-public-record' ); ?></p>
		<h1><?php the_title(); ?></h1>
	</header>
	<div class="single-layout">
		<article <?php post_class( 'single-content' ); ?>>
			<?php the_content(); ?>
		</article>
		<aside class="single-sidebar">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-area"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
			<?php else : ?>
				<section class="sidebar-card"><h2><?php esc_html_e( 'Citizen Manifesto', 'citizen-manifesto-public-record' ); ?></h2><p><?php esc_html_e( 'Publish corrections, sourcing policies, contact instructions, and safety guidance here.', 'citizen-manifesto-public-record' ); ?></p></section>
			<?php endif; ?>
		</aside>
	</div>
	<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>
