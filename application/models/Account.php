<?php

namespace application\models;
use application\lib\Db;

class Account
{
    public static function addUser($email, $name, $pwd)
    {
        $params = [
            'email' => $email,
            'name' => $name,
            'pwd' => $pwd,
        ];
        return Db::execute("INSERT INTO users SET email=:email, name=:name, password=:pwd", $params);
    }

    public static function getUserByEmail($email)
    {
        $params = [
            'email' => $email,
        ];

        return Db::execute_v2("SELECT * FROM users WHERE email=:email", $params)->fetch();
    }

    public static function userExists($email)
    {
        return (Db::execute("SELECT * FROM users WHERE email=:email",['email'=>$email])) ? true : false;
    }
}