<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use PDO;
use PDOException;

class User extends BaseModel
{

    public $err;

    protected $table = 'users';


    public function getAllUser()
    {
        return $this->getAll();
    }

    public function getOneUser($id, $nameID)
    {
        return $this->getOne($id, $nameID);
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM $this->table WHERE Email = :email";
        $params = [':email' => $email];

        $stmt = $this->_connection->pdo_query_one($query, $params);

        if (!$stmt) {
            return false;
        }

        if ($password != $stmt["Password"]) {
            $this->err = 'Thông tin đăng nhập không chính xác !';
        } else {
            $_SESSION['Admin'] = $stmt['FullName'];
            $_SESSION['Email'] = $stmt['Email'];
            $_SESSION['Role'] = $stmt['Role'];

            header('location: ' . ROOT_URL . '?url=UserController/index');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function validateEmptyInput($inputs)
    {
        foreach ($inputs as $value) {
            if (empty($value)) {
                return false; // Trả về false ngay khi gặp trường rỗng
            }
        }

        return true; // Trả về true nếu không có trường nào rỗng
    }

    public function invalidEmail($email)
    {
        // Sử dụng hàm filter_var để kiểm tra định dạng email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true; // Địa chỉ email không hợp lệ  
        }
        return false; // Địa chỉ email hợp lệ
    }

    public function verificationEmail($email, $token)
    {
        $query = "SELECT * FROM $this->table WHERE Email = :email";
        $params = [':email' => $email];

        $stmt = $this->_connection->pdo_query_one($query, $params);

        if (!$stmt) {
            ?>
            <script>
                alert("<?php echo "Xin lỗi, email này không tồn tại ! " ?>");
                setTimeout(function () {
                    window.location.href = "<?php echo ROOT_URL . '?url=LoginController/forgot'; ?>";
                }, 1);
            </script>
            <?php
        } else {
            $query = "UPDATE $this->table SET Access_Token = :token WHERE Email = :email";
            $params = [
                ':email' => $email,
                ':token' => $token
            ];
            $stmt = $this->_connection->pdo_execute($query, $params);
            ?>
            <?php
            if ($stmt) {
                //session_start ();
                $_SESSION['token'] = $token;
                $_SESSION['email'] = $email;

                // Tạo một đối tượng PHPMailer

                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                // h-hotel account
                $mail->Username = 'loctvpc06110@gmail.com'; // Địa chỉ email của bạn
                $mail->Password = 'aizs gkhv yldi njuy'; // Mật khẩu email của bạn

                // send by h-hotel email
                $mail->setFrom('loctvpc06110@gmail.com', 'Password Reset');
                // get email from input
                $mail->addAddress($email);
                //$mail->addReplyTo('lamkaizhe16@gmail.com');

                // HTML body
                $mail->isHTML(true);
                $mail->Subject = "Recover your password";
                $mail->Body = "<b>Dear User</b>
                    <h3>We received a request to reset your password.</h3>
                    <p>Kindly click the below link to reset your password</p>
                    http://localhost/login-System/Login-System-main/reset_psw.php
                    <br><br>
                    <p>With regrads,</p>
                    <b>Programming with Lam</b>";

                $mail->send();
                
                if (!$mail->send()) {
                    ?>
                    <script>
                        alert("<?php echo " Invalid Email " ?>");
                    </script>
                    <?php
                }
            }

        }
    }

    public function resetPassword()
    {

    }

}