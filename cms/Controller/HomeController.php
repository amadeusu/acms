<?php

namespace Cms\Controller;

class HomeController extends CmsController {

    public function index() {
        echo 'Index Page';
    }
    public function news($id) {
        echo $id;
    }
}