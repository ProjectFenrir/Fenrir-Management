// This function is executed during processing the login form
// Instead of sending the password in plain text,
// a hidden field is created to store the password in a hex format
function formhash(form, password) {
	var hexField = document.createElement('input');

	form.appendChild(hexField);
	hexField.name = 'hexField';
	hexField.type = 'hidden';
	hexField.value = hex_sha512(password.value);

	// Visible field is cleared, protect the plain-text
	password.value = '';

	form.submit();
}