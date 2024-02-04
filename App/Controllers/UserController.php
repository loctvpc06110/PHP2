<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;

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


    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $userModel = new User();
        $data = $userModel->getAllUser();

        var_dump($data);

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

        var_dump($data);

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Users/update', $data);
        $this->_renderBase->renderFooter();

    }
}
