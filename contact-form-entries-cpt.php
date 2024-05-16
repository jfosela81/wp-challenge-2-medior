<?php

function wpch2_create_cpt() {
	register_post_type(
		'wpch2_cf_entries',
		array(
			'labels'      => array(
				'name'          => __( 'Contact Entries', 'wp-challenge-2-medior' ),
				'singular_name' => __( 'Contact Entry', 'wp-challenge-2-medior' ),
			),
			'public'      => true,
			'has_archive' => true,
		)
	);
}
add_action( 'init', 'wpch2_create_cpt' );
