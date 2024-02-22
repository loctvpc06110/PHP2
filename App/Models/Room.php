<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use PDO;
use PDOException;

class Room extends BaseModel
{

    public $err;

    protected $table = 'classrooms';


    public function getAllRoom()
    {
        return $this->getAll();
    }

    public function getOneRoom($id, $nameID)
    {
        return $this->getOne($id, $nameID);
    }

    public function createRoom($data)
    {
        return $this->create($data);
    }

    public function editRoom($id, $data, $nameID)
    {
        return $this->update($id, $data, $nameID);
    }

    public function deleteRoom($id, $nameID)
    {
        return $this->delete($id, $nameID);
    }

}