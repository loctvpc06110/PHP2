<?php
include("model.php");

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $user = get_user( $email);
}

include("view.php");
?>