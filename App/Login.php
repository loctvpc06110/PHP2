<?php
namespace App;

use App\Core\Database;

class Login extends Database{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
 
    public function login(){
        if (isset($_SESSION['user'])){
            return "{$_SESSION['user']} <a href='/logout'>Logout</a>";
        }else{
            return
            '<form action="/loginUser" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username"></input>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password"></input>
                </div>
                <a href="/forgotpwd">Đổi Mật Khẩu</a>
                <button type="submit" value="Submit" name="submit">Submit</buttuon>
            </form>';
        }
    }

    public function forgotpwd():string {
        return <<<FORM
            <form action="/changepwd" method="post">
                <label>Nhập Username</label>
                <input type="text" name="username"/>
                <button type="submit" name="submit">Đổi</button>
            </form>
    FORM;
    }

    public function change($username) {
        $conn = $this->db->connect();
    
        // Kiểm tra xem tài khoản có tồn tại hay không
        $checkStmt = $conn->prepare("SELECT * FROM Users WHERE Username = ?");
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
    
        if ($result->num_rows == 0) {
            $checkStmt->close();
            die("Tài Khoản Chưa Đăng Ký");
        } else {
            // Thực hiện cập nhật mật khẩu
            $updateStmt = $conn->prepare("UPDATE Users SET Password = '12345678' WHERE Username = ?");
            $updateStmt->bind_param("s", $username);
            $updateStmt->execute();
            $updateStmt->close();
    
            // Hiển thị thông báo
            echo '<script>alert("Đổi MK Thành Công, Mk mời là: 12345678!");</script>';
        }
    
        $checkStmt->close();
        $conn->close();
    }
    

    public function changePwd() {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $this->change($username);
        }

    }

    public function isEmptyInput($username, $password) {
        // Kiểm tra xem có trường dữ liệu nào đó bị trống không
        if (empty($username) || empty($password)) {
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

    protected function getUser($username, $pwd) {
        $stmt = $this->db->connect()->query("SELECT * FROM Users WHERE Username = '{$username}'");
        // $stmt->bind_param("s", $username);
        // $stmt->execute();
        // $result = $stmt->get_result();

        if ($stmt->num_rows == 0) {
            $stmt= null;
            die("Thông tin đăng nhập không chính xác");
        }
        
        $user = $stmt->fetch_array(MYSQLI_ASSOC);

        if ($pwd != $user["Password"]) {
            // $stmt->close();
            die("Thông tin đăng nhập không chính xác !");
        } else {
            $_SESSION['user'] = $user['Username'];
            header('location:/login');
        }
    }

    public function loginUser(){

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($this->isEmptyInput($username, $password) != false){
                die ('Vui lòng điền đủ thông tin !');
            }

            // if($this->invalidEmail($formFields['email']) != false){
            //     header("localtion:/register?error=email");
            //     exit();
            // }

            $this->getUser($username, $password);
        }
    }

    public function logout (){
        session_unset();
        session_destroy();
        header('location:/login');
    }

    public function hi(){
        echo 'hihiih';
    }   
}

?>