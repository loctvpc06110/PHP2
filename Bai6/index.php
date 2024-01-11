<?php
    require "vendor/autoload.php";

    use App\Model\BaseModel;
    use App\Controller\BaseController;
    use App\Core\Route;

    $model = new BaseModel();
    $controller = new BaseController();
    $route = new Route();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
</body>
</html>