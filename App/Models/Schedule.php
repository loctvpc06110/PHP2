<?php
namespace App\Models;

use PDO;
use PDOException;

class Schedule extends BaseModel
{

    public $err;

    protected $table = 'classschedule';


    public function getAllSchedule()
    {
        $this->_query = "SELECT * FROM `classschedule` 
        INNER JOIN class ON classschedule.ClassID = class.ClassID
        INNER JOIN classrooms ON classschedule.RoomID = classrooms.RoomID
        INNER JOIN courses ON classschedule.CourseID = courses.CourseID
        INNER JOIN users ON classschedule.TeacherID = users.UserID";
        // return $this;
        $stmt   = $this->_connection->pdo_query($this->_query);

        return $stmt;
    }

    public function getScheduleNow()
    {
        $this->_query = "SELECT * FROM `classschedule` 
        INNER JOIN class ON classschedule.ClassID = class.ClassID
        INNER JOIN classrooms ON classschedule.RoomID = classrooms.RoomID
        INNER JOIN courses ON classschedule.CourseID = courses.CourseID
        INNER JOIN users ON classschedule.TeacherID = users.UserID
        WHERE CURDATE() BETWEEN courses.StartDate AND courses.EndDate;";
        // return $this;
        $stmt   = $this->_connection->pdo_query($this->_query);

        return $stmt;
    }

    public function checkFK($id, $nameID)
    {
        $this->_query = "SELECT * FROM `classschedule` WHERE $nameID = $id";
        $stmt   = $this->_connection->pdo_query_one($this->_query);
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