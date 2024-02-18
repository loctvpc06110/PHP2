<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;
use App\Models\Schedule;

class UserController extends BaseController
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

    function err404()
    {
        $this->_renderBase->renderHeaderErr();
        $this->_renderBase->renderError404();
        $this->_renderBase->renderFooterErr();
    }
    
    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $userModel = new User();
        $data = $userModel->getAllUser();

        // var_dump($data);

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Users/index', $data);
        $this->_renderBase->renderFooter();
    }

    function update($id)
    {        
        // dữ liệu ở đây lấy từ repositories hoặc model

        $userModel = new User();
        $data = $userModel->getOneUser($id, 'UserID');

        // var_dump($data);

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Users/update', $data);
        $this->_renderBase->renderFooter();

    }

    function edit($id){
        if (isset($_POST['submit'])){
           $data = [
                'Role' => $_POST['role']
           ];
           $model = new User();
           $model->updateUser($id, $data, 'UserID');
           header('location: ' . ROOT_URL . '?url=UserController/index');
        }
    }

    function delete($id){
        $model = new User();
        $modelSchedule = new Schedule();
        $check = $modelSchedule->checkFK($id, 'TeacherID');

        if ($check == null) {
            $result = $model->deleteUser($id, 'UserID');
            header('location: ' . ROOT_URL . '?url=UserController/index');
        } else {
            $err = [
                'title' => 'Xóa không thàng công !',
                'error' => 'Hiện tại người này đang được xếp vào lịch học nào đó không thể xóa.'
            ];
            if ($err != null) {
                $this->_renderBase->renderHeaderErr();
                $this->_renderBase->renderError($err);
                $this->_renderBase->renderFooterErr();
            }

        }
    }
}
