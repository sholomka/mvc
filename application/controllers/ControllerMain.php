<?php

namespace  Application\Controllers;

use Application\Core\Controller;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}

