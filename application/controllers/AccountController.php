<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;

class AccountController extends Controller{

    public function actionLogin()
    {
        $this->view->render("LogIn");
        return true;
    }

    public function actionSignup()
    {
        $this->view->render("SignUp");
        return true;
    }

    public function actionLogout()
    {
        return true;
    }
}