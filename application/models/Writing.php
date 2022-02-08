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
}