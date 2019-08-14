<?php

namespace Cms\Controller;

class HomeController extends CmsController {

    public function index() {
        $data = ['name' => 'Amadeusu'];
        $this->view->render('index', $data);
    }

}