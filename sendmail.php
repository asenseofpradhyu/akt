<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class sendmail
{
    public $mail_params;

    function sendMail()
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = email_host;                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = email_user;                     // SMTP username
            $mail->Password   = email_pass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(email_from, email_name);
            if (!empty($this->mail_params['tousers'])) {
                foreach ($this->mail_params['tousers'] as $key => $user) {
                    $mail->addAddress($user['email'], $user['name']);     // Add a recipient
                }
            }
            $mail->addReplyTo('info@store.com', 'Information');
            if (isset($this->mail_params['cc'])) {
                $mail->addCC($this->mail_params['cc']);
            }
            if (isset($this->mail_params['bcc'])) {
                $mail->addBCC($this->mail_params['bcc']);
            }

            // Attachments
            if (isset($this->mail_params['attechment'])) {
                foreach ($this->mail_params['attechment'] as $key => $att) {
                    $mail->addAttachment($att['path'], $att['name']);    // Optional name
                }
            }

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->mail_params['subject'];
            $mail->Body    = $this->mail_params['body'];
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// die(print_r($mail));
            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
