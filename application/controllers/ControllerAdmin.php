<?php

namespace  Application\Controllers;

use Application\Core\Controller;
use Application\Models\ModelAdmin;

class ControllerAdmin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelAdmin();
    }

    public function actionIndex()
    {
        session_start();
        $data = $this->model->getData();
        $this->view->generate('admin_view.php', 'template_view.php', $data);
    }

    public function actionLogout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
}

