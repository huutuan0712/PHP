<?php

require __DIR__ . "/../vendor/autoload.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Create an instance; passing `true` enables exceptions

function sendEmail($email, $token) {
    $mail = new PHPMailer(true);
    try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tuan071220@gmail.com';                     //SMTP username
    $mail->Password   = 'huutuan0712';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress($email);     //Add a recipient
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Xác nhận email';
    $mail->Body    = ' <a href="http://localhost/QLBH1/assets/email/verifi_email.php?token='. $token.'">Verify Email!</a>';
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<pre>';
        print_r($e);
    echo '</pre>';die;
}
}
function sendEmail_cart($total) {
    $mail = new PHPMailer(true);
    try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tuan071220@gmail.com';                     //SMTP username
    $mail->Password   = 'huutuan0712';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tuan071220@gmail.com');
    $mail->addAddress('tuan071220@gmail.com');     //Add a recipient
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here Product';
    $items = "";
    foreach ($_SESSION['cart'] as $key => $value) {
        $items .= "
        </tr>
              <tr>
              <td>" . $value['name'] . "</td>
              <td>" . $value['price'] . "</td>
              <td>" . $value['quantity'] . "</td>
              <td>" . number_format($value['price'] * $value['quantity'], 2) . "</td>
            </tr>";
           
    }
    
    $mail->Body    = " 
        <a href='http://localhost/QLBH1/assets/checkout/checkoutpayment.php?''>Payments</a>  
        <table class='table table-bordered table-striped'>
        <tr>
        <th> Name</th>
        <th> Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        </tr>".$items ."<td colspan='3'></td>
        <td><b>Total Price</b></td>
        <td>" . number_format($total, 2) . "</td>
      </tr>";
        
            


    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<pre>';
        print_r($e);
    echo '</pre>';die;
}
}
?>