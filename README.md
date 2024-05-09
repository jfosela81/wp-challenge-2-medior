# Shortcode of contact form in WordPress

Simple shortcode for WordPress to add a contact form to your posts or pages

## Use

1. Activate the plugin and copy the shortcode `[contact_form]` in the content of some page or post where you want to show the form.

2. The form includes the following fields by default: email, subject and message

3. You can extend and add more text/textarea fields using "wpch2_form_fields" filter. Example:

add_filter( 'wpch2_form_fields', 'wpch2_add_form_fields' );
function wpch2_add_form_fields( $fields ) {

	$fields['name'] = array(
		'type'  => 'text',
		'name'  => 'name',
		'label' => __( 'Name', 'textdomain' ),
	);

	return $fields;
}

4. This shortcode will be processed and show a basic validation. The message will be sent by using wp_mail function.
