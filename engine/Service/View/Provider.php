<?php

namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider{
    /**
     * @var string
     */
    public $serviceName = 'view';

    /**
     * @return mixed|void
     */
    public function init() {
        $view = new View();

        $this->di->set($this->serviceName, $view);
    }
}