<?php
    namespace App\Models;

    use App\Interfaces\ModelInterface;

    abstract class BaseModel implements ModelInterface{
        public function __construct($table){
            $this->$table = $table;
        }
        public function create(array $data){

        }
        public function update($id, array $data){

        }
        public function delete($id){

        }
        public function getOne($id, $condition){

        }
        public function getAll(){
            echo 'Ok';
        }
    }

?>