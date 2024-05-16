<?php
/**
 * Managing and customizing columns for our CPT Contact Entries
 */

add_filter( 'manage_wpch2_cf_entries_posts_columns', 'wpch2_cf_entries_columns' );

function wpch2_cf_entries_columns( $columns ) {

	$columns = array(
		'cb'      => $columns['cb'],
		'title'   => __( 'Title', 'wp-challenge-2-medior' ),
		'message' => __( 'Message', 'wp-challenge-2-medior' ),
		'email'   => __( 'Email', 'wp-challenge-2-medior' ),
		'date'    => __( 'Date', 'wp-challenge-2-medior' ),
	);

	return $columns;
}


add_action( 'manage_wpch2_cf_entries_posts_custom_column', 'wpch2_populate_cf_entries_columns', 10, 2 );
function wpch2_populate_cf_entries_columns( $column, $post_id ) {

	if ( $column === 'email' ) {
		echo get_post_meta( $post_id, 'email_entry', true );
	}

	if ( $column === 'message' ) {

		echo substr( get_the_content(), 0, 50 );

		if ( strlen( get_the_content() ) > 50 ) {
			echo ' ...';
		}
	}
}
