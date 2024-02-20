<?php
namespace App\Models;

use PDO;
use PDOException;

class Classes extends BaseModel
{

    public $err;

    protected $table = 'Class';


    public function getAllClass()
    {
        return $this->getAll();
    }

    public function getOneClass($id, $nameID)
    {
        return $this->getOne($id, $nameID);
    }

    public function createClass($data){
        return $this->create($data);
    }

    public function editClass($id, $data, $nameID)
    {
        return $this->update($id, $data, $nameID);
    }

    public function deleteClass($id, $nameID)
    {
        return $this->delete($id, $nameID);
    }

}