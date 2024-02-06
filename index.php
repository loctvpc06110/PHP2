<?php 
session_start();
require_once("./vendor/autoload.php");
define("ROOT_URL", "http://localhost:8000/");

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// use App\Controllers\BaseController;
use App\Controllers\HomeController;
use App\Core\Route;

// new BaseController();

// new HomeController();

new Route;

?>

<?php
    // if (!isset($_SESSION['Admin'])){
    //     header('location: ' . ROOT_URL . '?url=LoginController/login');
    //     exit();
    // }
?>