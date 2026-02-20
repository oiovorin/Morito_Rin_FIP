<?php

session_start();

 header("Content-Type: application/json; charset=UTF-8");

spl_autoload_register(function ($class) {
    $class = str_replace('Portfolio\\', '', $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class); # needed for both
    $filepath = __DIR__ . '/../classes/' . $class . '.php';
    require_once $filepath;
});


use Portfolio\Database;

    // Error reporting, turn off when we launch
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $recipient = 'rinoiod@gmail.com';

        $subject = 'Inquiry from mydomain.com';

        $name_raw = $_POST['fullname'] ?? '';
        $email_raw = $_POST['email'] ?? '';
        $service_raw = $_POST['service'] ?? '';
        $msg_raw = $_POST['message'] ?? '';

        $name = trim(strip_tags($name_raw));

        $visitor_name = $name;

        $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));

        $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

        $service = trim(strip_tags($service_raw));

        $message = trim(strip_tags($msg_raw));

        $errors = array();

        if ($name === '') {
            $errors[] = 'name is empty.';
        }

       if ($email_raw === '') {
        $errors[] = 'email is empty.';
        } elseif (!$visitor_email) {
         $errors[] = 'invalid email format.';
        }

        if ($service === '') {
            $errors[] = 'service option is not selected';
        }

      if ($message === '') {
            $errors[] = 'message is empty.';
        }

        $errcount = count($errors);
    if ($errcount > 0) {
        $errmsg = array();
        for ($i = 0; $i < $errcount; $i++) {
            $errmsg[] = $errors[$i];
        }
        echo json_encode(array("errors" => $errmsg));
        exit;
    } else {

     $database = new Database();
        $database->query('INSERT INTO contacts 
        (name, email, service, message)
            VALUES (:name, :email, :service, :message)',
            [
                'name' => $visitor_name,
                'email' => $visitor_email,
                'service' => $service,
                'message' => $message
            ]
        );
    


        $emailBody = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$visitor_name}\r\n";
        $emailBody .= "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Service: {$service}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $fromAddress = "no-reply@yourdomain.com";

        
        $headers = "From: Your domain <{$fromAddress}>\r\n"; 
        $headers .= "Reply-To: {$visitor_email}\r\n"; 
        $headers .= "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n"; 

        $sent = mail($recipient, $subject, $emailBody, $headers);

        if(!$sent) {
            echo json_encode(["errors" => ["Email failed to send."]]);
            exit;
        } else {
            echo json_encode([
                "message" => "Form submitted successfully!"
            ]);
            exit;
        }
    }
}
?>
