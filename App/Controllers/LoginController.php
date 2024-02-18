<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;

class LoginController extends BaseController
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


    function login()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->load->render('Admin/Login/login');
    }

    function forgot()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->load->render('Admin/Login/forgot');
    }

    function register()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->load->render('Admin/Login/register');
    }

    function reset()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->load->render('Admin/Login/reset');
    }

    function loginAdmin()
    {
        if(isset($_POST['submit'])){
            if ($_POST['email'] == "" || $_POST['password'] == ""){
                $data = [
                    'error' => 'Vui lòng điền đủ thông tin !'
                ];
                $this->load->render('Admin/Login/login', $data);
            } else {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $login = $user->checkLogin($email);  

        if (!password_verify($password, $login['Password'])){
                $data = [
                    'error' => 'Email hoặc Mật Khẩu không chính xác !'
                ];
                $this->load->render('Admin/Login/login', $data);
            }
            else {
                $_SESSION['Admin'] = $login['FullName'];
                $_SESSION['Role'] = $login['Role'];
                header('location: ' . ROOT_URL . '?url=HomeController/home');
            }
            }
            
        }

    }

    function create()
    {
        $err = '';
        if (isset($_POST['submit'])){
            if ($_POST['email'] == "" || $_POST['password'] == "" || $_POST['fullname'] == ""){
                $data = [
                    'error' => 'Vui lòng điền đủ thông tin !'
                ];
                $this->load->render('Admin/Login/register', $data);
            }
            $data = [
                'Email' => $_POST['email'],
                'Password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'FullName' => $_POST['fullname']
            ];

            $register = new User();

            if ($register->invalidEmail($data['Email']) == false){
                $result = $register->create($data);
                    header('location: ' . ROOT_URL . '?url=LoginController/login');
            } else {
                $data = [
                    'error' => 'Email không hợp lệ !'
                ];
                // echo 'lỗi email';
                $this->load->render('Admin/Login/register', $data);
            }
      
        }
        
    }

    function verify (){
        if(isset($_POST['submit'])){
            // var_dump($_POST);
            $email = $_POST['email'];
            $token = bin2hex($email . time());

            $verify = new User();
            $verify->verificationEmail($email, $token);

        }
    }

    function logout(){
        $logout = new User();
        $logout->logout();
        header('location: ' . ROOT_URL . '?url=LoginController/login');
    }

}
