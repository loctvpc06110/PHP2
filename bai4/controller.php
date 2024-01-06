<?php
// controller
include("model.php");

$users = get_all_users();

include("view.php");
?>