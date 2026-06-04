<?php
/**
 * Theme functions for Citizen Manifesto Field Notes.
 *
 * @package CitizenManifestoFieldNotes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function citizen_manifesto_field_notes_setup() {
	load_theme_textdomain( 'citizen-manifesto-field-notes', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'citizen-manifesto-field-notes' ),
			'footer'  => __( 'Footer Menu', 'citizen-manifesto-field-notes' ),
		)
	);
	add_image_size( 'citizen-manifesto-field-notes-card', 960, 640, true );
}
add_action( 'after_setup_theme', 'citizen_manifesto_field_notes_setup' );

function citizen_manifesto_field_notes_enqueue_assets() {
	wp_enqueue_style( 'citizen-manifesto-field-notes-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'citizen_manifesto_field_notes_enqueue_assets' );

function citizen_manifesto_field_notes_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Article Sidebar', 'citizen-manifesto-field-notes' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets shown beside posts, pages, and incident records.', 'citizen-manifesto-field-notes' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'citizen_manifesto_field_notes_widgets_init' );

function citizen_manifesto_field_notes_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'citizen_manifesto_field_notes_excerpt_more' );

function citizen_manifesto_field_notes_posted_on() {
	printf(
		'<span>%1$s</span> <time datetime="%2$s">%3$s</time>',
		esc_html__( 'Filed', 'citizen-manifesto-field-notes' ),
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

function citizen_manifesto_field_notes_incident_facts( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	if ( 'incident' !== get_post_type( $post_id ) ) {
		return;
	}

	$facts = array(
		__( 'Date', 'citizen-manifesto-field-notes' )          => get_post_meta( $post_id, '_cmt_incident_date', true ),
		__( 'Location', 'citizen-manifesto-field-notes' )      => get_post_meta( $post_id, '_cmt_city_state', true ),
		__( 'Coordinates', 'citizen-manifesto-field-notes' )   => trim( get_post_meta( $post_id, '_cmt_latitude', true ) . ', ' . get_post_meta( $post_id, '_cmt_longitude', true ), ', ' ),
		__( 'Source URL', 'citizen-manifesto-field-notes' )    => get_post_meta( $post_id, '_cmt_source_url', true ),
		__( 'Record note', 'citizen-manifesto-field-notes' )   => get_post_meta( $post_id, '_cmt_record_note', true ),
	);

	$facts = array_filter( $facts );
	if ( empty( $facts ) ) {
		return;
	}
	?>
	<ul class="incident-facts">
		<?php foreach ( $facts as $label => $value ) : ?>
			<li>
				<span><?php echo esc_html( $label ); ?></span>
				<?php if ( 'Source URL' === $label ) : ?>
					<a href="<?php echo esc_url( $value ); ?>" rel="nofollow ugc noopener"><?php echo esc_html( wp_parse_url( $value, PHP_URL_HOST ) ? wp_parse_url( $value, PHP_URL_HOST ) : $value ); ?></a>
				<?php else : ?>
					<strong><?php echo esc_html( $value ); ?></strong>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}
