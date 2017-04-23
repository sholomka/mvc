<?php

namespace  Application\Core;

use Application\Core\View;
use Application\Core\ApplicationRegistry;

class Controller
{
    public $model;

    public $view;

    public $request;

    public function __construct()
    {
        session_start();

        $this->view = new View();

        $registry = ApplicationRegistry::instance();

        $this->request = $registry->getRequest();
    }

    public function actionIndex()
    {

    }
}

