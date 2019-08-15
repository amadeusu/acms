<?php

namespace Engine\Core\Config;

use mysql_xdevapi\Exception;

class Config {
    /**
     * @param $key
     * @param string $group
     * @return mixed|null
     * @throws \Exception
     */
    public static function item($key, $group = 'items') {
        $groupItems = static::file($group);
        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    /**
     * @param $group
     * @return bool|mixed
     * @throws \Exception
     */
    public static function file($group) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';
        if(file_exists($path)) {
            $items = require $path;
            if(is_array($items)) {
                return $items;
            } else {
                throw new \Exception(
                    sprintf('Config file <strong>%s</strong> is not a valid array', $path)
                );
            }
        } else {
            throw new \Exception(
                sprintf('Cannot load config from file, file <strong>%s</strong> does not exist', $path)
            );
        }
        return false;
    }
}