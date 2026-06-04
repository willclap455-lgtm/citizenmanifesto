<?php
/**
 * Plugin Name: Citizen Manifesto Toolkit
 * Description: Adds incident records, accountability taxonomies, incident metadata, safety-minded headers, and editorial shortcodes for Citizen Manifesto.
 * Version: 1.0.0
 * Requires at least: 6.7
 * Requires PHP: 7.2
 * Author: Citizen Manifesto
 * License: GPL-2.0-or-later
 * Text Domain: citizen-manifesto-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cmt_register_content_types() {
	register_post_type(
		'incident',
		array(
			'labels'       => array(
				'name'          => __( 'Incidents', 'citizen-manifesto-toolkit' ),
				'singular_name' => __( 'Incident', 'citizen-manifesto-toolkit' ),
				'add_new_item'  => __( 'Add New Incident', 'citizen-manifesto-toolkit' ),
				'edit_item'     => __( 'Edit Incident', 'citizen-manifesto-toolkit' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-shield-alt',
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'incidents' ),
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'revisions', 'custom-fields' ),
		)
	);

	$taxonomies = array(
		'incident_type'   => array( 'Incident Types', 'Incident Type', 'incident-type' ),
		'jurisdiction'    => array( 'Jurisdictions', 'Jurisdiction', 'jurisdiction' ),
		'incident_status' => array( 'Incident Statuses', 'Incident Status', 'incident-status' ),
	);

	foreach ( $taxonomies as $taxonomy => $data ) {
		register_taxonomy(
			$taxonomy,
			array( 'incident', 'post' ),
			array(
				'labels'       => array(
					'name'          => __( $data[0], 'citizen-manifesto-toolkit' ),
					'singular_name' => __( $data[1], 'citizen-manifesto-toolkit' ),
				),
				'public'       => true,
				'hierarchical' => true,
				'show_in_rest' => true,
				'rewrite'      => array( 'slug' => $data[2] ),
			)
		);
	}
}
add_action( 'init', 'cmt_register_content_types' );

function cmt_activation() {
	cmt_register_content_types();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'cmt_activation' );

function cmt_deactivation() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'cmt_deactivation' );

function cmt_add_incident_meta_box() {
	add_meta_box(
		'cmt_incident_details',
		__( 'Incident details', 'citizen-manifesto-toolkit' ),
		'cmt_render_incident_meta_box',
		'incident',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'cmt_add_incident_meta_box' );

function cmt_render_incident_meta_box( $post ) {
	wp_nonce_field( 'cmt_save_incident_details', 'cmt_incident_nonce' );
	$fields = array(
		'_cmt_incident_date' => __( 'Incident date', 'citizen-manifesto-toolkit' ),
		'_cmt_city_state'    => __( 'City, state/country', 'citizen-manifesto-toolkit' ),
		'_cmt_latitude'      => __( 'Latitude', 'citizen-manifesto-toolkit' ),
		'_cmt_longitude'     => __( 'Longitude', 'citizen-manifesto-toolkit' ),
		'_cmt_source_url'    => __( 'Primary source URL', 'citizen-manifesto-toolkit' ),
		'_cmt_record_note'   => __( 'Record or anonymity note', 'citizen-manifesto-toolkit' ),
	);
	?>
	<div class="cmt-incident-fields">
		<?php foreach ( $fields as $key => $label ) : ?>
			<p>
				<label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong></label><br>
				<input class="widefat" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" type="text" value="<?php echo esc_attr( get_post_meta( $post->ID, $key, true ) ); ?>">
			</p>
		<?php endforeach; ?>
	</div>
	<?php
}

function cmt_save_incident_details( $post_id ) {
	if ( ! isset( $_POST['cmt_incident_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cmt_incident_nonce'] ) ), 'cmt_save_incident_details' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( '_cmt_incident_date', '_cmt_city_state', '_cmt_latitude', '_cmt_longitude', '_cmt_source_url', '_cmt_record_note' );
	foreach ( $fields as $field ) {
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}
		$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
		if ( '_cmt_source_url' === $field ) {
			$value = esc_url_raw( $value );
		}
		update_post_meta( $post_id, $field, $value );
	}
}
add_action( 'save_post_incident', 'cmt_save_incident_details' );

function cmt_add_image_sizes() {
	add_image_size( 'citizen-manifesto-evidence', 1600, 1000, false );
	add_image_size( 'citizen-manifesto-card', 960, 640, true );
}
add_action( 'after_setup_theme', 'cmt_add_image_sizes' );

function cmt_security_headers() {
	if ( headers_sent() || is_admin() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'X-Frame-Options: SAMEORIGIN' );
}
add_action( 'send_headers', 'cmt_security_headers' );

function cmt_incidents_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'count' => 6,
		),
		$atts,
		'citizen_manifesto_incidents'
	);

	$query = new WP_Query(
		array(
			'post_type'      => 'incident',
			'posts_per_page' => absint( $atts['count'] ),
		)
	);

	if ( ! $query->have_posts() ) {
		return '<p>' . esc_html__( 'No incident files have been published yet.', 'citizen-manifesto-toolkit' ) . '</p>';
	}

	ob_start();
	?>
	<div class="citizen-manifesto-incident-list">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<article class="citizen-manifesto-incident-list__item">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo esc_html( get_post_meta( get_the_ID(), '_cmt_city_state', true ) ); ?></p>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
	</div>
	<?php
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'citizen_manifesto_incidents', 'cmt_incidents_shortcode' );
