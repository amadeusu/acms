<?php


namespace Engine;


use Engine\Core\Database\QueryBuilder;
use Engine\DI\DI;

abstract class Model {
    /**
     * @var DI
     */
    protected $di;

    protected $db;

    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    protected $config;


    /**
     * Model constructor.
     * @param DI $di
     */
    public function __construct(DI $di) {
        $this->di           = $di;
        $this->db           = $this->di->get('db');
        $this->config       = $this->di->get('config');
        $this->queryBuilder = new QueryBuilder();
    }
}