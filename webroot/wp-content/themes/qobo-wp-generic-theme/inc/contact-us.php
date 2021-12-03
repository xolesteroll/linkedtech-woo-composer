<?php
/**
 * Send email
 *
 * Send email from the contact us form and provide user with
 * the feedback/redirect.
 *
 * @package Qobo_Generic_Wordpress_Theme
 */

/**
 * Send email
 *
 * @todo Cleanup variables and check for being in POST request.
 * @param string $name Name.
 * @param string $lastname Last name.
 * @param string $from From.
 * @param string $message Message.
 * @param string $url URL.
 * @param string $redirect Redirect.
 * @param string $to To.
 */
function sendEmail( $name, $lastname, $from, $message, $url, $redirect, $to ) {
	?>
	<html>
	<head></head>
	<body>
		<?php
		$field_name = $name;
		$field_lastname = $lastname;
		$field_email = $from;
		$field_message = $message;
		$field_site = $url;
		$url = $redirect;
		$field_mail_to = $to;

		$subject = 'Message from ' . $field_site . ' visitor ' . $field_name . ' ' . $field_lastname;
		$body_message = 'From: ' . $field_name . ' ' . $field_lastname . "\n";
		$body_message .= 'E-mail: ' . $field_email . "\n";
		$body_message .= "\n" . $field_message;
		$headers = 'From: ' . $field_email . "\r\n";
		$headers .= 'Reply-To: ' . $field_email . "\r\n";
		$mail_status = mail( $field_mail_to, $subject, $body_message, $headers );
		if ( $mail_status ) {
		?>
		<script language="javascript" type="text/javascript">
			alert('Thank you for the message. We will contact you shortly.');
			window.location = '<?php echo $url?>';
		</script>
	
		<?php
		} else {
		?>
		<script language="javascript" type="text/javascript">
			alert('Message failed. Please, contact system administrator.');
			window.location = '<?php echo $url?>';
		</script>

		<?php
		}
		?>
	</body>
</html>
<?php
}
?>

<?php

sendEmail( $_POST ['contact-name'], $_POST ['contact-lastname'], $_POST ['contact-email'], $_POST ['contact-message'],$_POST ['site-url'],$_POST ['redirect'],$_POST ['email-to'] );

?>
