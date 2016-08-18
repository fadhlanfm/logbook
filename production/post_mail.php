<?php

require 'phpmailer/PHPMailerAutoload.php';
$email = "lc.caesarah@gmail.com";                    
$password = "terbenam";
$to_id = "syaiful.m@garuda-indonesia.com";
$message = "
<!DOCTYPE html>
<html>
<body style='color: #4A4A4A;'>
    <div class='row' style='align-content: center;'>
        <div class='container' style='border: solid 0px #DFDFDF;
        width: 800px;
        margin: auto;
        margin-top: 50px;
        height: 400px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background: #ECECEC;'>
        <table style='margin: auto;' cellspacing='0' width='100%' height='100%'>
            <tr>
                <td width='30%' style='padding: 0 0 0 25px;'>
                    <a href='http://tinypic.com?ref=1lzcp' target='_blank'><img src='http://i64.tinypic.com/1lzcp.jpg' border='0' alt='Image and video hosting by TinyPic'></a>
                </td>
                <td style='text-align: center;'>
                    <p style='font-size: 250%; font-family:Verdana, sans-serif;
                    font-weight: bold;'>CONGRATULATION</p>
                    <p style='font-size: 120%; font-family:Verdana, sans-serif;
                    font-weight: bold;'>You earned a gold medal!</p>
                </td>
            </tr>
            <tr height='10%'>
                <td style='background: #4A4A4A;' colspan='2'>

                </td>
            </tr>
        </table>
    </div>
    <div class='center'>

    </div>
</div>
</body>
</html>

";
$subject = 'simulasi PURPOSE';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->isHTML(true);

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = $email;

$mail->Password = $password;

$mail->setFrom('from@example.com', 'admin');

$mail->addReplyTo('replyto@example.com', 'admin');

$mail->addAddress($to_id);

$mail->Subject = $subject;

$mail->msgHTML($message);

if (!$mail->send()) {
 $error = "Mailer Error: " . $mail->ErrorInfo;
 ?><script>alert('<?php echo $error ?>');</script><?php
} 
else {
 header('Location: mailto.php');
 echo '<script>alert("Message sent!");</script>';
}
?>
</body>
</html>
