<?php
namespace App\Core\Router;

class Route {
    protected array $routes;

    public function register(string $route, callable|array $action): self {
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string $requestUrl) {
        $route = explode("?", $requestUrl)[0];
        $action = $this->routes[$route] ?? null;

        if (!$action) {
            // Nếu không tìm thấy đường dẫn, in ra thông báo lỗi và kết thúc
            die('Không tìm thấy trang !');
        }

        if (is_callable($action)) {
            // Nếu action là một hàm callable, gọi nó và trả về kết quả
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $classInstance = new $class;

                if (method_exists($classInstance, $method)) {
                    // Nếu class và method tồn tại, gọi method từ class và trả về kết quả
                    return call_user_func([$classInstance, $method]);
                } else {
                    // Nếu method không tồn tại, in ra thông báo lỗi và kết thúc
                    die("Phương thức '$method' không tồn tại trong lớp '$class'!");
                }
            } else {
                // Nếu class không tồn tại, in ra thông báo lỗi và kết thúc
                die("Lớp '$class' không tồn tại!");
            }
        }
    }
}
?>