<?php

namespace application\models;
use application\lib\Db;

class Post
{
    public static function getPosts()
    {
        return $posts = Db::execute("SELECT * FROM tt;");
    }

    public static function getPostById($id)
    {
        $params = [
            'id' => $id
        ];
        
        return $posts = Db::execute("SELECT * FROM tt WHERE id=:id", $params);
    }

}