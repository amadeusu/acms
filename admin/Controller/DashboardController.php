<?php
namespace Admin\Controller;

use Admin\Model\User\UserRepository;

class DashboardController extends AdminController {
    public function index() {
        $userModel = $this->load->model('User');

        $this->view->render('dashboard');
    }
}