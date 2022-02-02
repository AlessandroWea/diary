<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;

class IndexController extends Controller{

    public function actionMain()
    {
        $this->view->render("Main");

        return true;
    }
}