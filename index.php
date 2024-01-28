<?php
session_start();
require_once("./vendor/autoload.php");
use App\Core\Route;
// use App\Core\Database;
$router = new Route();
// $db = new Database();

// $router->register("/", function() { 
//         echo "Home";
// });

// Đăng ký các route
$router->get('/', [App\Home::class, 'index'])
        ->post('/upload', [App\Home::class, 'upload'])
        ->get('/login', [App\Login::class, 'login'])
        ->post('/loginUser', [App\Login::class, 'loginUser'])
        ->get('/logout', [App\Login::class,'logout'])
        ->get('/forgotpwd', [App\Login::class,'forgotpwd'])
        ->post('/changepwd', [App\Login::class,'changePwd']);
    
// $router->post('/login', [App\Login::class, 'login']);
        // ->post('/upload', [App\Home::class, 'upload']);

// Giải quyết đường dẫn và xử lý route
echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));


?>