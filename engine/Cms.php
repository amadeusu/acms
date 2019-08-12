<?php

namespace Engine;

class Cms {
    /**
     * @var DI
     */
    private $di;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di) {
        $this->di = $di;
    }

    /**
     * Run CMS
     */
    public function run() {
        echo 'Hello world';
    }
}