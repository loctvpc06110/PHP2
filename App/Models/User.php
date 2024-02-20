<?php
namespace App\Models;

use PDO;
use PDOException;
use PHPMailer\Test\PHPMailer\MailTransportTest;

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

    public function checkLogin($email)
    {
        $this->_query = "SELECT * FROM $this->table WHERE Email LIKE '$email'";

        $stmt = $this->_connection->pdo_query_one($this->_query);

        return $stmt;
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

    public function verificationEmail($email)
    {
        $this->_query = "SELECT * FROM $this->table WHERE Email LIKE '$email'";

        $stmt = $this->_connection->pdo_query_one($this->_query);

        return $stmt;
    }

    public function updToken($email, $token){
        $this->_query = "UPDATE Users SET Access_Token = '$token' WHERE Email LIKE '$email'";

        $stmt = $this->_connection->pdo_execute($this->_query);

        return $stmt;
    }

    public function resetPassword()
    {

    }

    public function updateUser($id, $data, $nameID)
    {
        return $this->update($id, $data, $nameID);
    }
    public function deleteUser($id, $nameID)
    {
        return $this->delete($id, $nameID);
    }

}