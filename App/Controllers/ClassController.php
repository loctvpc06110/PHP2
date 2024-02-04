<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;

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
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm"
                ]
            ]
        ];


        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Classes/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm",
                    "cate" => "Loại 1"
                ]
            ]
        ];


        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Classes/create', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {        
        // dữ liệu ở đây lấy từ repositories hoặc model

    }
}
