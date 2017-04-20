<?php

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}

