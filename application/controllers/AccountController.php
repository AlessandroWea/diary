<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;
use application\models\Account;
use application\lib\Validator;

class AccountController extends Controller {

    public function actionLogin()
    {
        $errmsg = '';
        $email = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            if($user = Account::getUserByEmail($email))
            {
                debug(password_verify($pwd, $user['password']) ? 'ss' : 'aa');
                if(password_verify($pwd, $user['password']))
                {
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_name'] = $user['name'];
                    $this->view->redirect(SERVER_PATH);
                }
                else
                {
                    $errmsg = '1Email or password is incorrect!';
                }
            }
            else
            {
                $errmsg = '2Email or password is incorrect!';
            }

            $vars = [
                'errmsg' => $errmsg,
                'email' => $email,
            ];

            $this->view->render('Log in', $vars);


        }
        else
        {
            $this->view->render("Log in", ['errmsg' => '', 'email'=> '']);
        }
        return true;
    }

    public function actionSignup()
    {
        $errmsg = '';
        $email = '';
        $name = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $pwd1 = $_POST['password'];
            $pwd2 = $_POST['password_repeat'];

            $errmsg = Validator::validate($email, $name, $pwd1);
            if($errmsg == '')
            {
                if(!Account::userExists($email))
                {
                    if($pwd1 === $pwd2)
                    {
                        $hashed_password = password_hash($pwd1, PASSWORD_DEFAULT);

                        Account::addUser($email, $name, $hashed_password);
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $name;
                        $this->view->redirect(SERVER_PATH);
                    }
                    else
                    {
                        $errmsg = "Passwords don't match!";
                    }                    
                }
                else
                {
                    $errmsg = "This email is taken!";
                }              
            }

            $vars = [
                'errmsg' => $errmsg,
                'email' => $email,
                'name' => $name,
            ];

            $this->view->render("SignUp", $vars);
        }
        else
        {
            $vars = [
                'errmsg' => '',
                'email' => '',
                'name' => '',
            ];

            $this->view->render("Sign up", $vars);
        }
        return true;
    }

    public function actionLogout()
    {
        session_unset($_SESSION['user_email']);
        session_destroy($_SESSION);

        $this->view->redirect(SERVER_PATH . 'login');
        return true;
    }
}