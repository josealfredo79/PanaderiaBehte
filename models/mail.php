    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class mail
    {
         function datos($email,$token){
                $email=$email;
                $identy=$token;
              

                require '../mailer/Exception.php';
                require '../mailer/PHPMailer.php';
                require '../mailer/SMTP.php';

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'sucursal.bethel.01@gmail.com';                     // SMTP username
                    $mail->Password   = '$bethel2021sucursal#01';                               // SMTP password
                    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('sucursal.bethel.01@gmail.com', 'Beth-El');
                    $mail->addAddress($email);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Restablecimiento de password de tu cuenta Beth-El';
                    $mail->Body    = 'Codigo de verificación: <br <h1>'.$identy.'</h1>';
                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    echo "Error de mensaje: {$mail->ErrorInfo}";
                }

           }
     
    }
           