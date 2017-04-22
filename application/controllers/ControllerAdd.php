<?php

namespace  Application\Controllers;

use Application\Core\Controller;
use Application\Models\ModelAdd;

class ControllerAdd extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelAdd();
    }

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $this->actionSave();
        } else {
            $this->view->generate('add_view.php', 'template_view.php');
        }
    }

    public function actionSave()
    {
        $this->model->addTask($_POST['name'], $_POST['email'], $_POST['description'], $_POST['image']);

        header('Location:/');
    }
}

