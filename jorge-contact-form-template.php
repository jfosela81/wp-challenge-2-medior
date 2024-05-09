<?php
/**
 * Template for the contact form and action
 */

$display_errors = '';

if ( isset( $_SERVER['REQUEST_METHOD'] ) && $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$form_errors = array();

	if ( isset( $_POST['subject'] ) && $_POST['subject'] !== '' ) {
		$subject = sanitize_text_field( wp_unslash( $_POST['subject'] ) );
	} else {
		$form_errors[] = esc_html__( 'Subject is required', 'jorge-contact-form' );
	}

	if ( isset( $_POST['email'] ) && $_POST['email'] !== '' ) {
		$email = sanitize_email( wp_unslash( $_POST['email'] ) );
	} else {
		$form_errors[] = esc_html__( 'Email is required', 'jorge-contact-form' );
	}

	if ( isset( $_POST['message'] ) && $_POST['message'] !== '' ) {
		$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ) );
	} else {
		$form_errors[] = esc_html__( 'Message is required', 'jorge-contact-form' );
	}

	if ( empty( $form_errors ) ) {
		$mail_body = '
		<html>
			<body>
				<h2>You have new message:</h2>
				<p>Subject: ' . $subject . '</p>
				<p>Email: ' . $email . '</p>
				<p>Message: ' . $message . '</p>
			</body>
		</html>
		';

		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		echo '<p class="success">' . esc_html__( 'Message sent successfully!', 'jorge-contact-form' ) . '</p>';

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
		<div class="row">
			<label for="subject">Subject</label>
			<input type="text" name="subject" id="subject" value="<?php echo isset( $_POST['subject'] ) ? $_POST['subject'] : ''; ?>" />
		</div>
		<div class="row">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" value="<?php echo isset( $_POST['email'] ) ? $_POST['email'] : ''; ?>" />
		</div>
		<div class="row">
			<label for="message">Message</label>
			<textarea name="message" id="message"><?php echo isset( $_POST['message'] ) ? $_POST['message'] : ''; ?></textarea>
		</div>
		<div class="row submit">
			<span></span>
			<input type="submit" value="Send message" />
		</div>
	</form> <!-- .jorge-contact-form -->
</div> <!-- .jorge-contact-form-wrapper -->
