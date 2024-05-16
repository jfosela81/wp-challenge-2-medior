<?php
/**
 * Template for the contact form and action
 */

$display_errors = '';

$form_fields = wpch2_get_the_form_fields();

if ( isset( $_SERVER['REQUEST_METHOD'] ) && $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$form_errors = array();

	foreach ( $form_fields as $field ) {
		if ( isset( $_POST[ $field['name'] ] ) && $_POST[ $field['name'] ] !== '' ) {
			$field_name  = $field['name'];
			$$field_name = $_POST[ $field['name'] ];
		} else {
			$form_errors[] = $field['label'] . ' is required';
		}
	}

	if ( empty( $form_errors ) ) {
		$mail_body = '
		<html>
			<body>
				<h2>You have new message:</h2>
		';

		foreach ( $form_fields as $field ) {
			$mail_body .= '<p>' . $field['label'] . ': ' . $_POST[ $field['name'] ] . '</p>';
		}

		$mail_body .= '
			</body>
		</html>
		';

		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		echo '<p class="success">' . esc_html__( 'Message sent successfully!', 'jorge-contact-form' ) . '</p>';

		$args['post_type']    = 'wpch2_cf_entries';
		$args['post_title']   = isset( $subject ) ? $subject : 'no-title';
		$args['post_content'] = isset( $message ) ? $message : 'no-content';

		$new_entry_id = wp_insert_post( $args );

		if ( $new_entry_id ) {
			add_post_meta( $new_entry_id, 'email_entry', isset( $email ) ? $email : 'no-email' );

			foreach ( $form_fields as $field ) {
				if ( in_array( $field['name'], array( 'email', 'subject', 'message' ) ) ) {
					continue;
				}

				add_post_meta( $new_entry_id, $field['name'] . '_entry', $_POST[ $field['name'] ] );
			}
		}

		wp_mail(
			'jfosela81+wpchallenge2@gmail.com',
			'Jorge Contact Form',
			$mail_body,
			$headers
		);
	} else {
		foreach ( $form_errors as $form_error ) {
			$display_errors .= '<p class="error">' . $form_error . '</p>';
		}
	}
}
?>

<div class="jorge-contact-form-wrapper">
	<?php echo wp_kses( $display_errors, 'post' ); ?>
	<form class="jorge-contact-form" action="" method="post">
		<?php

		do_action( 'wpch2_before_render_fields' );
		foreach ( $form_fields as $field ) {
			echo wpch2_render_form_field( $field );
		}
		do_action( 'wpch2_after_render_fields' );

		?>
		<div class="row submit">
			<span></span>
			<input type="submit" value="Send message" />
		</div>
	</form> <!-- .jorge-contact-form -->
</div> <!-- .jorge-contact-form-wrapper -->
