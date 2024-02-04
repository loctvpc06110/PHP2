<?php
namespace App;

use App\Core\Database;
class Register extends Database
{
    public $fullName;
    public $email;
    public $password;
    public $rePassword;
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $this->fullName = $_POST['fullName'];
            $this->email  = $_POST['email'];
            $this->password = $_POST['password'];
            $this->rePassword = $_POST['rePassword'];

            $this->signupUser();
        }
    }

    public function viewRegister()
    {
        return '
        <form action="/register" method="post">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" id="fullName">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="rePassword">Retype Password</label>
            <input type="password" name="rePassword" id="rePassword">
        </div>
        <button name="submit">Submit</button>
        </form>
        ';
    }

    public function signupUser(){
        if ($this->isEmptyInput($this->fullName, $this->email, $this->password,$this->rePassword)==true){
            die('Vui lòng Nhập Đủ thong tin !');
        }

        if ($this->invalidEmail($this->email)==true){
            die('Email không hợp lệ');
        }

        if ($this->passwordMath($this->password, $this->rePassword)==true){
            die('Mật khẩu không khớp !');
        }

        $this->setUser($this->fullName, $this->email, $this->password);
    }

    public function isEmptyInput($fullName, $email, $password, $rePassword) {
        // Kiểm tra xem có trường dữ liệu nào đó bị trống không
        if (empty($fullName) || empty($email) || empty($password) || empty($rePassword)) {
            return true;
        }
        return false; // Không có trường dữ liệu nào bị trống
    }

    public function invalidEmail($email) {
        // Sử dụng hàm filter_var để kiểm tra định dạng email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true; // Địa chỉ email không hợp lệ  
        }
        return false; // Địa chỉ email hợp lệ
    }

    public function passwordMath($password, $rePassword){
        if ($password != $rePassword){
            return true;
        }
        return false;
    }

    public function setUser($fullName, $email, $password){
        $conn = $this->db->connect();
        
        // Băm mật khẩu trước khi thêm vào cơ sở dữ liệu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Sử dụng Prepared Statements và bind giá trị vào câu lệnh SQL
        $insertStmt = $conn->prepare("INSERT INTO Users (FullName, Email, Password) VALUES (?, ?, ?)");
        $insertStmt->bind_param("sss", $fullName, $email, $hashedPassword);
    
        // Thực hiện truy vấn SQL
        $resultCheck = $insertStmt->execute();
    
        // Kiểm tra kết quả của truy vấn
        if (!$resultCheck) {
            die('Đăng Ký Không Thành Công!');
        } else {
            echo '<script>alert("Chúc mừng bạn đăng ký tài khoản thành công !");</script>';
            header('location:/login');
        }
    
        // Đóng Prepared Statement và trả về kết quả
        $insertStmt->close();
        return $resultCheck;
    }
    
}
?>