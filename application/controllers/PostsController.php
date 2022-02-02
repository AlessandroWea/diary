<?php

namespace application\controllers;
use application\core\Controller;
use application\models\Post;
use application\core\View;

class PostsController extends Controller{

    public function actionIndex()
    {
        $posts = Post::getPosts();

        $vars = array(
            'posts' => $posts,
        );

        // debug($vars);

        $this->view->render("Posts", $vars);

        return true;
    }

    public function actionSingle($id)
    {
        $post = Post::getPostById($id);
        if($post){
            $vars = [
                'post' => $post
            ];
        }
        else
        {
            View::errorCode(404);
        }
        // debug($vars);

        $this->view->render("Post", $vars);

        return true;
    }
}