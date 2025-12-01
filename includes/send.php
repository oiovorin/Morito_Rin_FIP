<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $recipent = 'rinmorito@gmail.com';
        $subject =  'This mail is comming from portfolio';  // can change here
        $first_raw = $_POST['first_name'] ?? '';
        $last_raw = $_POST['last_name' ?? ''];
        $email_raw = $_POST['email'] ?? '';
        $msg_raw = $_POST['message'] ?? '';

        $first = trim(strip_tags($first_raw));
        $last = trim(strip_tags($last_raw));

        $visitor_name = trim($first.' '.$last );

        $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));

        $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

        $message = trim(strip_tags($msg_raw));

        $fail = [];

        if($first === '') {
            $fail[] = 'first_name';
        }
        if($last === '') {
            $fail[] = 'last_name';
        }
        if(!$visitor_email) {
            $fail[] = 'email';
        }
        if($message === '') {
            $fail[] = 'message';
        }
        if(!empty($fail)) {
            echo '<p><strong>Validation faild.</strong></p>';
            echo '<p>Please fix: '.htmlspecialchars(implode(', ', $fail),ENT_QUOTES, 'UTF-8').'</p>';
            exit; //if the aboces run stop the script. 
        }

        $emailBody = "You received a new inquiry: \r\n\r\n";
        $emailBody .= "Name: {$visitor_name}\r\n";
        $emailBody = "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Message: \r\n{$message}\r\n";

        $fromAddress = "no-reply@yourdomain.com";

        // Create the email headers (metadata for the message)
        $headers = "From: Your domain <{$fromAddress}>\r\n"; 
        // Sender name and address
        $headers .= "Reply-To: {$visitor_email}\r\n"; 
        // Where replies will go
        $headers .= "MIME-Version: 1.0\r\n"; 
        // Email standard version
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; 
        // Plain text email
        $headers .= "X-Mailer: PHP/"  . phpversion() . "\r\n"; 
        // Identifies PHP mailer

        $sent = mail{$recipent, $subject, $emailBody, $headers};
        
        if($sent) {
            $thankyou = urlencode("Thank you for contacting me, " .htmlspecialchars($visitor_name,ENT_QUOTES, 'UTF-8'). "You'll get a reply within 48 hours");
            header("Location: contact.php?msg=$thankyou");
            exit();
        } else {
            $thankyou = urlencode("sorry your message was not sent.");
            header("Location: contact.php?msg=$thankyou");
            exit();
        }


        // echo $first_raw;
        // echo $last_raw;
        // echo $email_raw;
        // echo $msg_raw;  just to chek if its working

    }
    else {
        echo "<p>THese are not the droids you are looking for...";
    }
?>