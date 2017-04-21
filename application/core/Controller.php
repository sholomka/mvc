<?php

namespace  Application\Core;

use Application\Core\View;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
    }
}

