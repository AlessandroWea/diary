<?php

namespace application\controllers;
use application\core\Controller;
use application\core\View;
use application\models\Writing;

class WritingController extends Controller{

    public function actionWrite()
    {
        $this->view->render("Writing page");
        return true;
    }

    public function actionSave()
    {
        Writing::addWriting([
            'preview' => $_POST['preview'],
            'content' => $_POST['content'],
        ]);
        echo json_encode(['response' => 'ok']);
        return true;
    }

    public function actionView($id)
    {
        $writing = Writing::getWritingById($id);

        $this->view->render("View page", [
            'writing' => $writing,
        ]);

        return true;
    }
}