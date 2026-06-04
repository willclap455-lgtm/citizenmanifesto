<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<header class="single-header">
		<p class="eyebrow"><?php esc_html_e( 'Incident file', 'citizen-manifesto-signal' ); ?></p>
		<h1><?php the_title(); ?></h1>
		<p class="single-header__deck"><?php esc_html_e( 'Documented incident record with source notes, location details, and public-interest context.', 'citizen-manifesto-signal' ); ?></p>
		<?php citizen_manifesto_signal_incident_facts(); ?>
	</header>
	<div class="single-layout">
		<article <?php post_class( 'single-content' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>
			<?php the_content(); ?>
		</article>
		<aside class="single-sidebar" aria-label="<?php esc_attr_e( 'Incident context', 'citizen-manifesto-signal' ); ?>">
			<section class="sidebar-card">
				<h2><?php esc_html_e( 'Incident taxonomy', 'citizen-manifesto-signal' ); ?></h2>
				<?php echo get_the_term_list( get_the_ID(), 'incident_type', '<p>', ', ', '</p>' ); ?>
				<?php echo get_the_term_list( get_the_ID(), 'jurisdiction', '<p>', ', ', '</p>' ); ?>
				<?php echo get_the_term_list( get_the_ID(), 'incident_status', '<p>', ', ', '</p>' ); ?>
			</section>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-area"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
			<?php endif; ?>
		</aside>
	</div>
	<?php the_post_navigation(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
