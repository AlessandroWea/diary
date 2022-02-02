<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;

class WritingController extends Controller{

    public function actionWrite()
    {
        $this->view->render("Writing page");

        return true;
    }

    public function actionView($id)
    {
        $this->view->render("View page", ['id' => $id]);

        return true;
    }
}