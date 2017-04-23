<?php

namespace  Application\Controllers;

use Application\Core\Controller;
use Application\Models\ModelEdit;
use Application\Core\ApplicationRegistry;
use Application\Core\File\User;
use Application\Core\Image\Image;

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
        $this->model->editTask($this->request);

        header('Location:/admin');
    }


    public function actionImageUpload()
    {
        $file = new User();
        $array = array('status' => 'success', 'filename' => $file->getSavedFileName());

        header('Content-Type', 'application/json;charset=utf-8');

        $file->upload();

        echo  json_encode($array);

//        $filePath = APPLICATION_PATH .  implode(DIRECTORY_SEPARATOR, ['images', 'user',  $userId, 'original']) . DIRECTORY_SEPARATOR . $this->_request->getparam('name');
//        $savePath = APPLICATION_PATH .  implode(DIRECTORY_SEPARATOR, ['images', 'user',  $userId, Models_File_User::THUMBNAIL_WIDTH . 'x' . Models_File_User::THUMBNAIL_HEIGHT]) . DIRECTORY_SEPARATOR . $this->_request->getparam('name')
//        $image = Image::createImage($filePath);
//        $image->save($savePath);
    }
}

