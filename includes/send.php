<?php

    // Error reporting, turn off when we launch
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $recipient = 'notjustinsemail@notjustinsemail.com';

        $subject = 'Inquiry from mydomain.com';

        $name_raw = $_POST['name'] ?? '';
        $email_raw = $_POST['email'] ?? '';
        $service_raw = $_POST['service'] ?? '';
        $msg_raw = $_POST['message'] ?? '';

        $name = trim(strip_tags($name_raw));

        $visitor_name = $name;

        $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));

        $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

        $service = trim(strip_tags($service_raw));

        $message = trim(strip_tags($msg_raw));

        $fail = [];

        if ($name === '') {
            $fail[] = 'name';
        }

        if (!$visitor_email) {
            $fail[] = 'email';
        }

        if ($service === '') {
            $fail[] = 'service option';
        }

      if ($message === '') {
            $fail[] = 'message';
        }

        if (!empty($fail)) {
            $error_message = implode(', ', $fail);
            $error = urlencode("Please fix: " . $error_message);
            $name_fill = urlencode($name);
            $email_fill = urlencode($visitor_email);
            $service_fill = urlencode($service);
            $message_fill = urlencode($message);
            header("Location: ../contact.php?error=$error&name=$name_fill&email=$email_fill&service=$service_fill&message=$message_fill");
            exit();
        }

        $emailBody = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$visitor_name}\r\n";
        $emailBody .= "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Service: {$service}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $fromAddress = "no-reply@yourdomain.com";

        // Create the email headers (metadata for the message)
        $headers = "From: Your domain <{$fromAddress}>\r\n"; // Sender name and address
        $headers .= "Reply-To: {$visitor_email}\r\n"; // Where replies will go
        $headers .= "MIME-Version: 1.0\r\n"; // Email standard version
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Plain text email
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n"; // Identifies PHP mailer

        $sent = mail($recipient, $subject, $emailBody, $headers);

        if ($sent) {
            $nmessage = "\r\nYou'll get a reply within 24 hours.";
            $thankyou = urlencode("Thank you for contacting me, " .htmlspecialchars($visitor_name, ENT_QUOTES, 'UTF-8') . $nmessage);
            header("Location: ../contact.php?msg=$thankyou");
            exit();
        } else {
            $thankyou = urlencode("Sorry your message was not sent.");
            header("Location: ../contact.php?msg=$thankyou");
            exit();
        }
    } else {
        echo '<div id="error-box">
      <div> <img src="images/error.svg" alt="error icon">
      </div>
      <div>
        <p id="error-title">Error!</p>
        <p id="error-detail">Please make sure to fill up all sections</p>
      </div>
    </div>';
    }
?>
