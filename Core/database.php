<?php
namespace Core;

use mysqli;

class Database 
{
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "mysql";

        $conn = new mysqli($servername, $username, $password);

        if (!$conn){
            die("Kết nối thất bại". $conn->connect_error);
        }
        echo "Kết nối thành công";
    }

    public function HelloWord(){
        echo "Hello Word";
    }
}
?>
