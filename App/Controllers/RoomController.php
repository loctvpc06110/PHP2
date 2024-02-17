<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Room;

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

    function store(){
        if (isset($_POST['submit'])){
            $data = [
                'RoomName' => $_POST['RoomName']
            ];
            $model = new Room();
            $result = $model->createRoom($data);
            if ($result) {
                header('location: ' . ROOT_URL . '?url=RoomController/index');
            } else { ?>
                <script>
                alert("<?php echo "Thêm không thành công ! " ?>");
                </script>
            <?php }
        };
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
        if (isset($_POST['submit'])){
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

    function delete($id){
        $model = new Room();
        $result = $model->deleteRoom($id, 'RoomID');
        header('location: ' . ROOT_URL . '?url=RoomController/index');
    }
}
