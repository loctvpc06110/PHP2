<?php
require_once("./vendor/autoload.php");
use App\Core\Route;
$router = new Route();

$router->register("/", function() { 
        echo "Home";
});

// Đăng ký các route
// $router->register('/', [App\Home::class, 'home']);
// $router->register('/invoices', [App\Invoices::class, 'index']);
// $router->register('/invoices/create', [App\Invoices::class, 'create']);

// Giải quyết đường dẫn và xử lý route
echo $router->resolve($_SERVER['REQUEST_URI']);
?>