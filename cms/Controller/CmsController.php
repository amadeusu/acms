<?php


namespace Cms\Controller;

use Engine\Controller;
use Engine\DI\DI;

class CmsController extends Controller {

    /**
     * CmsController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }
}