<?php

    // require 'Core/database.php';

    // spl_autoload_register(function($class) {
    //     var_dump($class);
    //     $file = $class . ".php";
    //     // Kiểm tra xem tệp có tồn tại không trước khi require
    //     if (file_exists($file)) {
    //         require_once $file;
    //     } else {
    //         // Xử lý lỗi nếu tệp không tồn tại
    //         die('Class file not found: ' . $file);
    //     }
    // });

    require_once "Vendor/autoload.php";
    
    use \Core\Database as DB;

    $db = new DB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page home</h1>
</body>
</html>