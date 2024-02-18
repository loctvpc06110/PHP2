<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Room;
use App\Models\Schedule;

class RoomController extends BaseController
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
        $model = new Room();
        $data = $model->getAllRoom();

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Rooms/index', $data);
        $this->_renderBase->renderFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Rooms/create');
        $this->_renderBase->renderFooter();
    }

    function store()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['RoomName'] == "") {
                $data = [
                    'error' => 'Vui lòng điền đầy đủ !'
                ];
                $this->_renderBase->renderHeader();
                $this->_renderBase->renderMenu();
                $this->_renderBase->renderNavbar();
                $this->load->render('Admin/Rooms/create', $data);
                $this->_renderBase->renderFooter();
            } else {
                $data = [
                    'RoomName' => $_POST['RoomName']
                ];
                $model = new Room();
                $result = $model->createRoom($data);
                if ($result) {
                    header('location: ' . ROOT_URL . '?url=RoomController/index');
                }
            }
        }
    }

    function detail($id)
    {
        $model = new Room();
        $data = $model->getOneRoom($id, 'RoomID');

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderMenu();
        $this->_renderBase->renderNavbar();
        $this->load->render('Admin/Rooms/detail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        if (isset($_POST['submit'])) {
            $data = [
                'RoomName' => $_POST['RoomName']
            ];
            $model = new Room();
            $result = $model->update($id, $data, 'RoomID');
            if ($result) {
                header('location: ' . ROOT_URL . '?url=RoomController/index');
            } else { ?>
                <script>
                    alert("<?php echo "Chỉnh Sửa không thành công ! " ?>");
                </script>
            <?php }
        }
    }

    function delete($id)
    {
        $model = new Room();
        $modelSchedule = new Schedule();
        $check = $modelSchedule->checkFK($id, 'RoomID');

        if ($check == null) {
            $model->deleteRoom($id, 'RoomID');
            header('location: ' . ROOT_URL . '?url=RoomController/index');
        } else {
            $err = [
                'title' => 'Xóa không thàng công !',
                'error' => 'Hiện tại phòng học đang được sử dụng không thể xóa.'
            ];
            if ($err != null) {
                $this->_renderBase->renderHeaderErr();
                $this->_renderBase->renderError($err);
                $this->_renderBase->renderFooterErr();
            }

        }
    }
}
