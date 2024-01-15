<?php

namespace Core\Configs;

use PDO;
use PDOException;

class Database
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $dburl = "mysql:host=localhost;dbname=EduSystemDB;charset=utf8";
        $username = 'root';
        $password = 'mysql';

        try {
            $this->conn = new PDO($dburl, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Thay vì echo và die, hãy ném một exception để giữ mã nguồn linh hoạt
            throw new PDOException("Connection failed: " . $e->getMessage());
        }
    }

    public function pdo_execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            // Ném exception thay vì sử dụng echo và die
            throw new PDOException("Execute failed: " . $e->getMessage());
        }
    }

    public function pdo_query($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Ném exception thay vì sử dụng echo và die
            throw new PDOException("Query failed: " . $e->getMessage());
        }
    }

    // Các hàm khác tương tự...

    public function checkConnection()
    {
            try {
                if ($this->conn) {
                    return 'Connected to database successfully.';
                } else {
                    return 'Not connected to database.';
                }
            } catch (PDOException $e) {
                return 'Error checking connection: ' . $e->getMessage();
            }
    }

    public function __destruct()
    {
        // Kiểm tra xem kết nối có tồn tại trước khi đóng
        if ($this->conn) {
            $this->conn = null;
        }
    }

    
}