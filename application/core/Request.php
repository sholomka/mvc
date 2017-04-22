<?php

namespace  Application\Core;

class Request
{
    private $properties;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $this->properties = $_REQUEST;
        }
    }

    public function getProperty($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty($key, $val)
    {
        $this->properties[$key] = $val;
    }


    public function getServer($key)
    {
        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }

        return null;
    }

    public function getUrlPart($part)
    {
        $routes = explode('/', $this->getServer('REQUEST_URI'));

        if (!empty($routes[$part])) {
            return $routes[$part];
        }

        return null;
    }
}

