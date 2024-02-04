<?php

namespace App\Core;

use App\Controllers\BaseController;

class BaseRender extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function renderHeader(){
        $this->load->render('layouts/header');
    }
    public function renderFooter(){
        $this->load->render('layouts/footer');
    }
    public function renderMenu(){
        $this->load->render('layouts/menu');
    }
    public function renderNavbar(){
        $this->load->render('layouts/navbar');
    }


}