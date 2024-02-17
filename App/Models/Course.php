<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use PDO;
use PDOException;

class Course extends BaseModel
{

    public $err;

    protected $table = 'Courses';


    public function getAllCourse()
    {
        return $this->getAll();
    }

    public function getOneCourse($id, $nameID)
    {
        return $this->getOne($id, $nameID);
    }

    public function createCourse($data)
    {
        return $this->create($data);
    }

    public function editCourse($id, $data, $nameID)
    {
        return $this->update($id, $data, $nameID);
    }

    public function deleteCourse($id, $nameID)
    {
        return $this->delete($id, $nameID);
    }
}