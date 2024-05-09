<?php
/**
 * This is the file for the shortcode
 */

add_shortcode( 'jorge-contact-form', 'jorge_render_contact_form' );
function jorge_render_contact_form( $att, $content ) {

	ob_start();
	require_once plugin_dir_path( __FILE__ ) . '/jorge-contact-form-template.php';
	return ob_get_clean();
}

add_action( 'wp_enqueue_scripts', 'jorge_contact_form_styles' );
function jorge_contact_form_styles() {

	global $post;

	if ( has_shortcode( $post->post_content, 'jorge-contact-form' ) ) {
		wp_enqueue_style(
			'jorge-contact-form-css',
			plugin_dir_url( __FILE__ ) . 'style.css',
			array(),
			'1.0'
		);
	}
}
