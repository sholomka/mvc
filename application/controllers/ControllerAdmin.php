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
        $tasks = $this->model->getData($this->request);
        $nav = $this->model->getNav();


        $data = ['tasks' => $tasks, 'nav' => $nav];


//        echo "<pre>"; print_r($data); die;

        $this->view->generate('admin_view.php', 'template_view.php', $data);
    }

    public function actionLogout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
}

