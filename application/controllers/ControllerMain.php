<?php

namespace  Application\Controllers;

use Application\Core\Controller;
use Application\Models\ModelMain;

class ControllerMain extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelMain();
    }

    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}

