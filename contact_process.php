<?php

// Send contact form messages to Dr. Venu Battula
	$to = "venujee911@gmail.com";

	// Basic sanitization
	$from = isset($_REQUEST['email']) ? strip_tags(trim($_REQUEST['email'])) : '';
	$name = isset($_REQUEST['name']) ? strip_tags(trim($_REQUEST['name'])) : 'Website Visitor';
	$cmessage = isset($_REQUEST['message']) ? strip_tags(trim($_REQUEST['message'])) : '';

	$headers = "From: " . ($from ? $from : 'no-reply@yourdomain.com') . "\r\n";
	if ($from) {
		$headers .= "Reply-To: " . $from . "\r\n";
	}
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$subject = "Website Contact: Message from " . $name;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Contact Message</title></head><body>";
	$body .= "<h2>New contact form message</h2>";
	$body .= "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
	$body .= "<p><strong>Email:</strong> " . htmlspecialchars($from) . "</p>";
	$body .= "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($cmessage)) . "</p>";
	$body .= "</body></html>";

	// Send mail
	$send = mail($to, $subject, $body, $headers);

	if ($send) {
		header('Location: contact.html?success=1');
		exit;
	} else {
		header('Location: contact.html?error=1');
		exit;
	}

?>