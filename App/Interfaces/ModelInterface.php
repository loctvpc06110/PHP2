<?php
    namespace App\Interfaces;

    interface ModelInterface
    {
        // Chứa các phương thức bắt buộc mà các hàm triển khai cần phải gọi (CRUD)
        public function create(array $data);
        public function update($id, array $data);
        public function delete(array $data);
        public function getOne($id, $condition);
        public function getAll();
    }
?>