<?php

namespace App\Models;

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
        $servername = "localhost"; // Tên máy chủ MySQL
        $username = "root"; // Tên người dùng MySQL
        $password = "mysql"; // Mật khẩu MySQL
        $dbname = "edusystemdb";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
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
            throw new PDOException("Query failed: " . $e->getMessage());
        }
    }

    public function pdo_query_one($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Query failed: " . $e->getMessage());
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