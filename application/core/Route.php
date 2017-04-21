<?php

namespace  Application\Core;

class Route
{
    public static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = 'Main';
        $actionName = 'Index';

        if (!empty($routes[1])) {
            $controllerName = mb_convert_case($routes[1], MB_CASE_TITLE, "UTF-8");
        }

        if (!empty($routes[2])) {
            $actionName = mb_convert_case($routes[2], MB_CASE_TITLE, "UTF-8");
        }

        $modelName = 'Model' . $controllerName;
        $controllerName = 'Controller' . $controllerName;
        $actionName = 'action' . $actionName;


        $modelFile = $modelName . '.php';
        $modelPath = 'application/models/' . $modelFile;

        if (file_exists($modelPath)) {
            include_once($modelPath);
        }

        $controllerFile = $controllerName . '.php';
        $controllerPath = 'application/controllers/' . $controllerFile;

        if (file_exists($controllerPath)) {
            include_once($controllerPath);
        } else {
            self::errorPage404();
        }

        $controllerNameSpacePath = '\\Application\\Controllers\\';
        $controllerName = $controllerNameSpacePath . $controllerName;

        $controler = new $controllerName();
        $action = $actionName;

        if (method_exists($controler, $action)) {
            $controler->$action();
        } else {
            self::errorPage404();
        }
    }

    public static function errorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';

        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location: ' . $host . '404');
    }
}
