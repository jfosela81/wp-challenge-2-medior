<?php
/**
 * Function for rendering form fields
 */

function wpch2_render_form_field( $field ) {

	$field_value = isset( $_POST[ $field['name'] ] ) ? $_POST[ $field['name'] ] : '';

	switch ( $field['type'] ) {
		case 'text':
		case 'email':
		case 'number':
		case 'password':
			$html_field = '
			<input type="' . $field['type'] . '"
						 name="' . $field['name'] . '"
						 id="' . $field['name'] . '"
						 value="' . $field_value . '" />
			';
			break;
		case 'textarea':
			$html_field = '<textarea name="' . $field['name'] . '" id="' . $field['name'] . '">' . $field_value . '</textarea>';
			break;
		default:
			$html_field = '';
	}
	return '
	<div class="row">
		<label for="' . $field['name'] . '">' . $field['label'] . '</label>
		' . $html_field . '
	</div>
	';
}
