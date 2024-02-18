<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Classes;
use App\Models\Schedule;

class ClassController extends BaseController
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
        $model = new Classes();
        $data = $model->getAllClass();

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Classes/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Classes/create');
        $this->_renderBase->renderFooter();
    }

    function store()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['ClassName'] == '') {
                $data = [
                    'error' => 'Vui lòng điền đầy đủ !'
                ];
                $this->_renderBase->renderHeader();
                $this->_renderBase->renderMenu();
                $this->_renderBase->renderNavbar();
                $this->load->render('Admin/Classes/create', $data);
                $this->_renderBase->renderFooter();
            } else {
                $data = [
                    'ClassName' => $_POST['ClassName']
                ];
                $model = new Classes();
                $result = $model->createClass($data);
                if ($result) {
                    header('location: ' . ROOT_URL . '?url=ClassController/index');
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
        $model = new Classes();
        $data = $model->getOneClass($id, 'ClassID');

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Classes/detail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        if (isset($_POST['submit'])) {
            $data = [
                'ClassName' => $_POST['ClassName']
            ];
            $model = new Classes();
            $result = $model->update($id, $data, 'ClassID');
            header('location: ' . ROOT_URL . '?url=ClassController/index');
        }
    }

    function delete($id)
    {
        $model = new Classes();
        $modelSchedule = new Schedule();
        $check = $modelSchedule->checkFK($id, 'ClassID');

        if ($check == null) {
            $model->deleteClass($id, 'ClassID');
            header('location: ' . ROOT_URL . '?url=ClassController/index');
        } else {
            $err = [
                'title' => 'Xóa không thàng công !',
                'error' => 'Hiện tại lớp học đang có lịch học không thể xóa.'
            ];
            if ($err != null) {
                $this->_renderBase->renderHeaderErr();
                $this->_renderBase->renderError($err);
                $this->_renderBase->renderFooterErr();
            }

        }

    }

}
