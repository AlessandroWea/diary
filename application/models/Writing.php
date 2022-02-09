<?php

namespace application\models;
use application\lib\Db;

class Writing
{
    public static function getAllWritingsByUser($email, $limit)
    {
        if(!is_int($limit))
            return false;

        return Db::execute_v3("SELECT writings.*, users.id as owner_id FROM writings JOIN users ON writings.id_user=users.id WHERE email=:email LIMIT $limit", [
            'email' => $email,
        ]);
    }

    public static function addWriting($writing)
    {
        Db::execute("INSERT INTO writings SET id_user=:id_user, preview=:preview, content=:content", [
            'id_user' => $_SESSION['user_id'],
            'preview' => $writing['preview'],
            'content' => $writing['content'],
        ]);
    }

    public static function getWritingById($id)
    {
        return Db::execute_v2("SELECT * FROM writings WHERE id=:id",[
            'id' => $id,
        ])->fetch();
    }
}