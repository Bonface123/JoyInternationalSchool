
<?php

// 1. Include PHPMailer using Composer's autoloader (assuming you've installed PHPMailer)
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// 2. Create a new PHPMailer instance (optional: enable exceptions)
$mail = new PHPMailer(true);

// 3. Configure Email Settings (replace with your details)
$mail->isSMTP();                                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                           // Specify your SMTP server address
$mail->SMTPAuth = true;                                         // Enable SMTP authentication
$mail->Username = 'ondusobonface9@gmail.com';                   // Your SMTP username
$mail->Password = 'uzfa dwmr vezu adkh';                             // Your SMTP password
//$mail->SMTPSecure = 'ssl';                 // Optional, set encryption if needed
$mail->Port = 25;                                             // Replace with your SMTP server port (usually 587)

// 4. Set Sender Detailscomposer install

$mail->setFrom('ondusobonface9@gmail.com', 'Bonface Onduso');       // Sender's email address and name

// 5. Add Recipient(s)
$mail->addAddress($_POST ["email"]);            // Recipient's email address (can add more with addAddress())

// 6. Set Email Subject and Body
$mail->Subject = ' "Joy International School Client Inquiry';              // Email subject line
$mail->Body = 'This is to inform you that some client has made an appointment with you through Onduso Bonface Personal Website.'; // Plain text email body
$mail->isHTML(true);                                           // Set email format to HTML (optional)

// 7. Optional: Set Alternative Text for Plain Text Clients
$mail->AltBody = 'This is the plain text version of the email body.'; // Optional for non-HTML clients

// 8. Send the Email and Handle Response
if ($mail->send()) {
    echo 'Message has been sent successfully!';
} else {
    echo 'Error sending message: ' . $mail->ErrorInfo;
}

