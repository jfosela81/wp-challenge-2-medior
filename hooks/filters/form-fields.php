<?php
/**
 * Function for filtering the fields of the form
 */

function wpch2_get_the_form_fields() {

	$form_fields = array(
		'email'   => array(
			'type'  => 'email',
			'name'  => 'email',
			'label' => __( 'Email', 'wp-challenge-2-medior' ),
		),
		'subject' => array(
			'type'  => 'text',
			'name'  => 'subject',
			'label' => __( 'Subject', 'wp-challenge-2-medior' ),
		),
		'message' => array(
			'type'  => 'textarea',
			'name'  => 'message',
			'label' => __( 'Message', 'wp-challenge-2-medior' ),
		),
	);

	return apply_filters( 'wpch2_form_fields', $form_fields );
}
