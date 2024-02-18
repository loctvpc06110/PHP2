<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Course;
use App\Models\Schedule;

class CourseController extends BaseController
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
        $model = new Course();
        $data = $model->getAllCourse();

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Courses/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Courses/create');
        $this->_renderBase->renderFooter();
    }

    function store(){
        if (isset($_POST['submit'])){
            if ($_POST['CourseName'] == "" || $_POST['Description'] == "" || $_POST['StartDate'] == "" || $_POST['EndDate'] == "")
            {
                $data = [
                    'error' => 'Vui lòng điền đầy đủ !'
                ];
                $this->_renderBase->renderHeader();
                $this->_renderBase->renderMenu();
                $this->_renderBase->renderNavbar();
                $this->load->render('Admin/Courses/create', $data);
                $this->_renderBase->renderFooter();
            } else {
                $data = [
                    'CourseName' => $_POST['CourseName'],
                    'Description' => $_POST['Description'],
                    'StartDate' => $_POST['StartDate'],
                    'EndDate' => $_POST['EndDate']
                ];
                $model = new Course();
                $result = $model->createCourse($data);
                if ($result) {
                    header('location: ' . ROOT_URL . '?url=CourseController/index');
                } else { ?>
                    <script>
                    alert("<?php echo "Thêm không thành công ! " ?>");
                    </script>
                <?php }
            }
            
        }
    }

    function detail($id)
    {        
        $model = new Course();
        $data = $model->getOneCourse($id, 'CourseID');

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Courses/detail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        if (isset($_POST['submit'])){
            $data = [
                'CourseName' => $_POST['CourseName'],
                'Description' => $_POST['Description'],
                'StartDate' => $_POST['StartDate'],
                'EndDate' => $_POST['EndDate']
            ];
            $model = new Course();
            $result = $model->update($id, $data, 'CourseID');
            if ($result) {
                header('location: ' . ROOT_URL . '?url=CourseController/index');
            } else { ?>
                <script>
                alert("<?php echo "Chỉnh Sửa không thành công ! " ?>");
                </script>
            <?php }
        }
    }

    function delete($id){
        $model = new Course();
        $modelSchedule = new Schedule();
        $check = $modelSchedule->checkFK($id, 'CourseID');

        if ($check == null){
            $model->deleteCourse($id, 'CourseID');
            header('location: ' . ROOT_URL . '?url=CourseController/index');
        } else {
            $err = [
                'title' => 'Xóa không thàng công !',
                'error' => 'Hiện tại khóa học đã có lịch học không thể xóa.'
            ];
            if ($err != null){
                $this->_renderBase->renderHeaderErr();
                $this->_renderBase->renderError($err);
                $this->_renderBase->renderFooterErr(); 
            }
            
        }
    }
}
