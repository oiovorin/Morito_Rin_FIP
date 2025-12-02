<?php

    // Error reporting, turn off when we launch
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $recipent = 'notjustinsemail@notjustinsemail.com';

        $subject = 'Inquiry from mydomain.com';

        $first_raw = $_POST['first_name'] ?? '';
        $last_raw = $_POST['last_name'] ?? '';
        $email_raw = $_POST['email'] ?? '';
        $msg_raw = $_POST['message'] ?? '';

        $first = trim(strip_tags($first_raw));
        $last = trim(strip_tags($last_raw));

        $visitor_name = trim($first.' '.$last);

        $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));

        $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

        $message = trim(strip_tags($msg_raw));

        $fail = [];

        if ($first === '') {
            $fail[] = 'first_name';
        }

        if ($last === '') {
            $fail[] = 'last_name';
        }

        if (!$visitor_email) {
            $fail[] = 'email';
        }

        if ($message === '') {
            $fail[] = 'message';
        }

        if (!empty($fail)) {
            $error = urlencode(implode(', ', $fail));
            header("Location: ../contact.php?error=$error");
            exit();
        }

        $emailBody = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$visitor_name}\r\n";
        $emailBody .= "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $fromAddress = "no-reply@yourdomain.com";

        // Create the email headers (metadata for the message)
        $headers = "From: Your domain <{$fromAddress}>\r\n"; // Sender name and address
        $headers .= "Reply-To: {$visitor_email}\r\n"; // Where replies will go
        $headers .= "MIME-Version: 1.0\r\n"; // Email standard version
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Plain text email
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n"; // Identifies PHP mailer

        $sent = mail($recipent, $subject, $emailBody, $headers);

        if ($sent) {
            $thankyou = urlencode("Thank you for contacting me, " . htmlspecialchars($visitor_name,ENT_QUOTES, 'UTF-8'). "You'll get a reply within 24 hours.");
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
