<?php

class ControllerPortfolio extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelPortfolio();
    }

    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
}

