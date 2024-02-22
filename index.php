<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');error_reporting(E_ALL);

session_start();

require_once("./vendor/autoload.php");
define("ROOT_URL", "http://localhost:8000/");
?>

<?php
use App\Core\Route;

new Route;

?>

