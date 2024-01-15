<?php
    require_once("./vendor/autoload.php");

    use Core\Configs\Database;
        $db = new Database();

    require "./App/Templates/header.php";
    require "./App/Templates/menu.php";
    require "./App/Templates/navbar.php";

    require "./App/Views/table.php";

    require "./App/Templates/footer.php";
?>
