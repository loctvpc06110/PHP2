<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use App\Models\Database;
use PDO;

abstract class BaseModel implements CrudInterface
{

    protected $table;


    private $_connection;

    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table ";

        // return $this;

        $stmt   = $this->_connection->pdo_query($this->_query);

        return $stmt;
    }


    public function getOne(int $id, $nameID)
    {
        $this->_query = "SELECT * FROM $this->table WHERE $nameID = '$id' LIMIT 1";

        $stmt = $this->_connection->pdo_query_one($this->_query);

        return $stmt;
    }
    public function create(array $data)
    {
    }
    public function update(int $id, array $data)
    {
        
    }
    public function delete(int $id): bool
    {
        return true;
    }


    // public function orderBy(string $order = 'ASC')
    // {
    //     $this->_query = $this->_query . "order by " . $order;

    //     return $this;
    // }

    // public function get()
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    // public function limit(int $limit = 10)
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $result = $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }



}
