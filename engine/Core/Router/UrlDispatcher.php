<?php

namespace Engine\Core\Router;

class UrlDispatcher {
    /**
     * @var array
     */
    private $methods = [
        'GET',
        'POST'
    ];

    /**
     * @var array
     */
    private $routes = [
        'GET'  => [],
        'POST' => []
    ];

    /**
     * @var array
     */
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    /**
     * @param $key
     * @param $pattern
     */
    public function addPattern($key, $pattern) {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array|mixed
     */
    public function routes($method) {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri) {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    /**
     * @param $method
     * @param $pattern
     * @param $controller
     */
    public function register($method, $pattern, $controller) {
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }

    /**
     * @param $pattern
     * @return string|string[]|null
     */
    private function convertPattern($pattern) {
        if (strpos($pattern, '(') === false) {
            return $pattern;
        }

        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    /**
     * @param $matches
     * @return string
     */
    private function replacePattern($matches) {
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
    }

    /**
     * @param $parameters
     * @return mixed
     */
    private function processParam($parameters) {
        foreach ($parameters as $k => $v) {
            if(is_int($k)) {
                unset($parameters[$k]);
            }
        }

        return $parameters;
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    private function doDispatch($method, $uri) {
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = '#^' . $route . '$#s';

            if (preg_match($pattern, $uri, $paramaters)) {
                return new DispatchedRoute($controller, $this->processParam($paramaters));
            }
        }
    }


}