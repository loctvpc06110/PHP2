<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use PDO;
use PDOException;

class Schedule extends BaseModel
{

    public $err;

    protected $table = 'ClassSchedule';


    public function getAllSchedule()
    {

        $this->_query = "SELECT * FROM `ClassSchedule` 
        INNER JOIN class ON ClassSchedule.ClassID = class.ClassID
        INNER JOIN classrooms ON ClassSchedule.RoomID = classrooms.RoomID
        INNER JOIN courses ON ClassSchedule.CourseID = courses.CourseID
        INNER JOIN users ON ClassSchedule.TeacherID = users.UserID";
        // return $this;
        $stmt   = $this->_connection->pdo_query($this->_query);

        return $stmt;
        
    }

    public function getOneSchedule($id, $nameID)
    {
        return $this->getOne($id, $nameID);
    }

    public function createSchedule($data)
    {
        return $this->create($data);
    }

    public function editSchedule($id, $data, $nameID)
    {
        return $this->update($id, $data, $nameID);
    }

    public function deleteSchedule($id, $nameID)
    {
        return $this->delete($id, $nameID);
    }
}