<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface {
    protected $authorized = false;
    protected $hash_user;

    /**
     * @return bool
     */
    public function isAuthorized() {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function hash_user() {
        return Cookie::get('auth_user');
    }

    /**
     * @param $user
     */
    public function authorize($user) {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    public function unauthorize() {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
}

    /**
     * Generates a new salt for better password hashing
     * @return string
     */
    public static function salt() {
        return (string) mt_rand(10000000, 99999999);
    }

    /**
     * Generates a hash for password
     * @param $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '') {
        return hash('sha256', $password, $salt);
    }
}