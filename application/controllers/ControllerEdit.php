<?php

namespace  Application\Controllers;

use Application\Core\Controller;
use Application\Models\ModelEdit;
use Application\Core\ApplicationRegistry;

class ControllerEdit extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelEdit();
    }

    public function actionIndex()
    {
        $secondUrlPart = $this->request->getUrlPart(2);

        if (!empty($secondUrlPart)) {
            $id = $secondUrlPart;
            $data = $this->model->getDataById($id);
        }

        if (!empty($_POST)) {
            $this->actionSave();
        } else {
            $this->view->generate('edit_view.php', 'template_view.php', $data);
        }
    }

    public function actionSave()
    {
        $this->model->editTask($_POST['name'], $_POST['email'], $_POST['description'], $_POST['image'], $_POST['id']);

        header('Location:/');
    }
}

