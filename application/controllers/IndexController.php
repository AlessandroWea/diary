<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;
use application\models\Writing;

class IndexController extends Controller{

    public function actionMain()
    {
        $this->logged_out_off();

        $writings = Writing::getAllWritingsByUser($_SESSION['user_email'], 10);

        $vars = [
            'writings' => $writings,
        ];

        $this->view->render("Main", $vars);

        return true;
    }

    public function logged_out_off()
    {
        if(!isset($_SESSION['user_email']))
            $this->view->redirect(SERVER_PATH . 'login');
    }
}