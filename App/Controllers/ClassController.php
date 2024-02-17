<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Classes;

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
        ;
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
            if ($result) {
                header('location: ' . ROOT_URL . '?url=ClassController/index');
            } else { ?>
                <script>
                    alert("<?php echo "Sửa không thành công ! " ?>");
                </script>
            <?php }
        }
    }

    function delete($id){
        $model = new Classes();
        $result = $model->deleteClass($id, 'ClassID');
        header('location: ' . ROOT_URL . '?url=ClassController/index');
    }


}
