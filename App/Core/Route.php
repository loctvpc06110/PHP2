<?php
namespace App\Core;

class Route {
    protected array $routes;

    public function register(string $requestMethod, string $route, callable|array $action): self {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route , callable|array $action): self {
        return $this->register("get", $route, $action);
    }

    public function post(string $route , callable|array $action): self {
        return $this->register("post", $route, $action);
    }

    public function resolve(string $requestUrl, string $requestMethod) {
        $route = parse_url($requestUrl, PHP_URL_PATH);
        $action = $this->routes[$requestMethod][$route] ?? null;
    
        if (!$action) {
            // Nếu không tìm thấy đường dẫn, trả về một giá trị biểu thị lỗi
            return ['error' => 'Không tìm thấy trang!'];
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
                    // Nếu method không tồn tại, trả về một giá trị biểu thị lỗi
                    return ['error' => "Phương thức '$method' không tồn tại trong lớp '$class'!"];
                }
            } else {
                // Nếu class không tồn tại, trả về một giá trị biểu thị lỗi
                return ['error' => "Lớp '$class' không tồn tại!"];
            }
        }
    }
    
}
?>
