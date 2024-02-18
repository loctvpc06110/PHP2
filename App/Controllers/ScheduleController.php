<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Classes;
use App\Models\Course;
use App\Models\User;

class ScheduleController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $model = new Schedule();
        $data = $model->getAllSchedule();

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Schedules/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $modelClass = new Classes();
        $modelCourse = new Course();
        $modelRoom = new Room();
        $modelUser = new User();
        $data = [
            'Class' => $modelClass->getAllClass(),
            'Course' => $modelCourse->getAllCourse(),
            'Room' => $modelRoom->getAllRoom(),
            'User' => $modelUser->getAllUser()
        ];
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Schedules/create', $data);
        $this->_renderBase->renderFooter();
    }

    function store(){
        if (isset($_POST['submit'])){
            if ( $_POST['Room'] == "" || $_POST['Class'] == "" || $_POST['Course'] == "" || $_POST['Teacher'] == "" || $_POST['StartTime'] == "" || $_POST['EndTime'] == ""){    
                    $data = [
                        'error' => 'Vui lòng điền đầy đủ !'
                    ];
                    $this->_renderBase->renderHeader();
                    $this->_renderBase->renderMenu();
                    $this->_renderBase->renderNavbar();
                    $this->load->render('Admin/Schedules/create', $data);
                    $this->_renderBase->renderFooter();
            } else {
                $data = [
                    'RoomID' => $_POST['Room'],
                    'ClassID' => $_POST['Class'],
                    'CourseID' => $_POST['Course'],
                    'TeacherID' => $_POST['Teacher'],
                    'StartTime' => $_POST['StartTime'],
                    'EndTime' => $_POST['EndTime']
                ];
                $model = new Schedule();
                $result = $model->createSchedule($data);
                if ($result) {
                    header('location: ' . ROOT_URL . '?url=ScheduleController/index');
                }
            }
        }
    }

    function detail($id)
    {        
        $modelSchedule = new Schedule();
        $modelClass = new Classes();
        $modelCourse = new Course();
        $modelRoom = new Room();
        $modelUser = new User();
        $data = [
            'Schedule' => $modelSchedule->getOneSchedule($id, 'ClassSchID'),
            'Class' => $modelClass->getAllClass(),
            'Course' => $modelCourse->getAllCourse(),
            'Room' => $modelRoom->getAllRoom(),
            'User' => $modelUser->getAllUser()
        ];
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Schedules/detail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        if (isset($_POST['submit'])){
            $data = [
                'RoomID' => $_POST['Room'],
                'ClassID' => $_POST['Class'],
                'CourseID' => $_POST['Course'],
                'TeacherID' => $_POST['Teacher'],
                'StartTime' => $_POST['StartTime'],
                'EndTime' => $_POST['EndTime']
            ];
            $model = new Schedule();
            $result = $model->editSchedule($id, $data, 'ClassSchID');   
            if ($result) {
                header('location: ' . ROOT_URL . '?url=ScheduleController/index');
            } else { ?>
                <script>
                alert("<?php echo "Thêm không thành công ! " ?>");
                </script>
            <?php }
        }
    }

    function delete($id){
        $model = new Schedule();
        $result = $model->deleteSchedule($id, 'ClassSchID');
        header('location: ' . ROOT_URL . '?url=ScheduleController/index');
    }
}
