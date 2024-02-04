<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;

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
        $data = [
       
        ];


        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Courses/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
      
        ];


        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Courses/create', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {        
        // dữ liệu ở đây lấy từ repositories hoặc model

    }
}
