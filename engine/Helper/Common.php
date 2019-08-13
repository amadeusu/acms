<?php

namespace Engine\Helper;

class Common {
    /**
     * @return mixed
     */
    public static function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool
     */
    public static function isPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public static function getPathUrl() {
        $pathUrl = $_SERVER['REQUEST_URI'];
        if ($position = strpos($pathUrl, '?')) {
           $pathUrl = substr($pathUrl, 0, $position);
        }
        return $pathUrl;
    }
}