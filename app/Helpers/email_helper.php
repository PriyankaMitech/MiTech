<?php
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;;

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';




function testemail()
{
    $email = 'siddheshkadge214@gmail.com';
    $subject = 'for text';
    $body = 'This is the body of the email.';

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'siddheshkadgemitech@gmail.com';
        $mail->Password = 'lxnpuyvyefpbcukr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('siddheshkadgemitech@gmail.com', 'MI-Tech');
        $mail->addAddress($email, 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body); // Optional: Plain text version of the email body

        // Send email
        $mail->send();
        echo 'Email has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function leaveemail($from_date, $to_date, $rejoining_date, $reason, $sender_name, $handovername, $admin_data, $sender_email)
{
    $subject = 'Leave Application';
    $body = "Dear [Recipient's Name],

    I hope this email finds you well. I am writing to inform you of my need to take a leave of absence from $from_date to $to_date due to $reason. I have taken all necessary steps to ensure that my duties are covered during my absence, and I am fully committed to completing any pending tasks before my departure.
    
    I have arranged for $handovername to handle my responsibilities while I am away. My anticipated rejoining date is $rejoining_date.
    
    I kindly request your approval of this leave request and would appreciate any guidance or instructions you may have regarding the process. Thank you for your understanding and support.
    
    Best Regards,
    
    $sender_name";

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'siddheshkadgemitech@gmail.com';
        $mail->Password = 'lxnpuyvyefpbcukr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('siddheshkadgemitech@gmail.com', 'MI-Tech');
        
        if (!empty($admin_data)) {
            $firstAdmin = array_shift($admin_data);
            $mail->addAddress($firstAdmin->emp_email, $firstAdmin->emp_name); // First admin as recipient
        
            foreach ($admin_data as $admin) {
                $mail->addCC($admin->emp_email, $admin->emp_name); // Other admins as CC
            }
        } else {
            // Fallback if no admin data is provided
            $mail->addAddress('default@domain.com', 'Default Recipient');
        }
        

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($body); // Converts new lines to <br> tags for HTML format
        $mail->AltBody = strip_tags($body); // Optional: Plain text version of the email body

        // Send email
        $mail->send();
        echo 'Email has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}





