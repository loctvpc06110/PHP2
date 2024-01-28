<?php
namespace App\Core;

use mysqli;

class Database {
    protected function connect() {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "mysql";
            $dbname = "edusystemdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }
            return $conn;
        } catch (\Exception $e) {
            die("Exception: " . $e->getMessage());
        }
    }
}
?>