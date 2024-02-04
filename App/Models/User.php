<?php
namespace App\Models;

class User extends BaseModel{
    
    protected $table = 'users';

    
    public function getAllUser(){
        return $this->getAll();
    }

    public function getOneUser($id, $nameID){
        return $this->getOne($id, $nameID);
    }

}