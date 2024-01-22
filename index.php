<?php
    require_once("./vendor/autoload.php");

    use App\Core\Configs\Database;
        $db = new Database();

    require "./App/Templates/header.php";
    require "./App/Templates/menu.php";
    require "./App/Templates/navbar.php";

    if (isset($_GET["page"])) {
        $url = $_GET["page"];
    }else{
        $url = "user-list";
    }
    
    switch ($url) {
        case "user-list":
            require("./App/Views/user-list.php");
            break;
        case "class-list":
            require("./App/Views/class-list.php");
            break;
        case "class-add":
            require("./App/Views/class-add.php");
            break;
    }

    require "./App/Templates/footer.php";

    // use App\Models\User;

    // $dataUser = new User('Users');
    
    // $getAllUser = $dataUser->getAll();
?>
