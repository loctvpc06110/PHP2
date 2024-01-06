    <?php
    // config
    // Thông tin kết nối CSDL
    $host = 'localhost';       // Địa chỉ máy chủ MySQL
    $username = 'root'; // Tên đăng nhập MySQL
    $password = 'mysql'; // Mật khẩu MySQL
    $database = 'classroomschedulerdb'; // Tên cơ sở dữ liệu MySQL

    // Kết nối đến CSDL
    $conn = new mysqli($host, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối CSDL thất bại: " . $conn->connect_error);
    }

    ?>