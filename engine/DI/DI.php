<?php

namespace Engine\DI;

class DI {
    /**
     * @var array
     */
    private $container = [];


    /**
     * @param $key
     * @return mixed|null
     */
    public function has($key) {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value) {
        if ($this->has($key) !== null) {
            return $this;
        }
        $this->container[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key) {
        return $this->container[$key];
    }
}