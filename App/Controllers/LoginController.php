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
            $email = $_POST['email'];
            $password = $_POST['password'];
            $inputData = [
                'email' => $email,
                'password' => $password,
            ];

            $user = new User();

            // $isEmtyInput = $user->validateEmptyInput($inputData);

            // if ($isEmtyInput){
            $login = $user->login($email, $password);

            // }else{
            //     echo 'Vui lòng nhập đủ thông tin !';
            // }
        }

    }

    function create()
    {
        $err = '';
        if (isset($_POST['submit'])){
            $data = [
                'Email' => $_POST['email'],
                'Password' => $_POST['password'],
                'FullName' => $_POST['fullname']
            ];

            $register = new User();

            if ($register->invalidEmail($data['Email']) == false){
                $result = $register->create($data);
                if ($result) {
                    header('location: ' . ROOT_URL . '?url=LoginController/login');
                } else {
                    echo 'them loi';
                }
            } else {
                $err = 'Email Không Hợp Lệ !';
                // echo 'lỗi email';
                header('location: ' . ROOT_URL . '?url=LoginController/register');
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
