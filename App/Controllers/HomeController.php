<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Classes;
use App\Models\Course;
use App\Models\User;

class HomeController extends BaseController
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


    function home()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $modelSchedule = new Schedule();

        $dataSchedule = $modelSchedule->getScheduleNow();

        $thuTrongTuan = date("N");
        $ngayThangNam = date("d/m/Y");
        $tenThu = array(
            1 => 'Thứ hai',
            2 => 'Thứ ba',
            3 => 'Thứ tư',
            4 => 'Thứ năm',
            5 => 'Thứ sáu',
            6 => 'Thứ bảy',
            7 => 'Chủ nhật'
        );
        $data = [
            'ngay' => $tenThu[$thuTrongTuan].'<br>'.$ngayThangNam,
            'schedule' => $dataSchedule
        ];

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/home', $data);
        $this->_renderBase->renderFooter();
    }

}
