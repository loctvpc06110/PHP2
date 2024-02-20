<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->CharSet  = "utf-8";
$mail->Host='smtp.gmail.com';
$mail->SMTPSecure='tls';
$mail->SMTPAuth=true;
$mail->Port=587;

// h-hotel account
$mail->Username = 'loctvpc06110@gmail.com'; // Địa chỉ email của bạn
$mail->Password = 'aizs gkhv yldi njuy'; // Mật khẩu email của bạn

// send by h-hotel email
$mail->setFrom('loctvpc06110@gmail.com', 'Password Reset');
// get email from input
$mail->addAddress($data['email']);
//$mail->addReplyTo('lamkaizhe16@gmail.com');

// HTML body
$mail->isHTML(true);
$mail->Subject="Recover your password";
$mail->Body="<b>Dear User</b>
<h3>We received a request to reset your password.</h3>
<p>Kindly click the below link to reset your password</p>
http://localhost/login-System/Login-System-main/reset_psw.php
<br><br>
<p>With regrads,</p>
<b>Programming with Lam</b>";

if(!$mail->send()){
    ?>
        <script>
            alert("<?php echo " Invalid Email "?>");
        </script>
    <?php
}else{
    ?>
        <script>
            window.location.replace("notification.html");
        </script>
    <?php
}
?>