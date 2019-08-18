<?php


namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class AdminController extends Controller {

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AdminController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hash_user() === null) {
            header('Location: /admin/login');
            exit;
        }
    }


    /**
     * Check Authorization
     */
    public function checkAuthorization() {

    }

    public function logout() {
        $this->auth->unauthorize();
        header('Location: /admin/login');
        exit;
    }
}