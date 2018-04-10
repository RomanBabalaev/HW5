<?php

namespace App\Models;

require 'DBHConnect.php';

class Users extends DBHConnect
{
    function getAllUser()
    {
        $users = $this->DBH->query('SELECT * FROM hw5.users;')->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    function getUser($login)
    {

        $currentUser = $this->DBH->query("SELECT * FROM hw5.users where login='$login';")->fetchAll(\PDO::FETCH_ASSOC)[0];

        if ($currentUser) {
            return $currentUser;
        }
        return false;

    }

    function getUserById($id)
    {
        $currentUser = $this->DBH->query("SELECT * FROM hw5.users where id='$id';")->fetchAll(\PDO::FETCH_ASSOC)[0];
        return $currentUser;
    }

    function addUser($login, $password, $name, $age, $description, $photo)
    {
        $STH = $this->DBH->prepare("INSERT INTO `users` (`login`, `password`, `name`, `age`, `description`, `photo`) values ('$login','$password','$name',$age,'$description','$photo')");
        $STH->execute();
        if ($STH->errorCode() !== "00000") {
            return false;
        }
        return true;
    }

    function getMaxId()
    {
        $id = $this->DBH->prepare("SELECT max(id) FROM hw5.users");
        $id->execute();
        $result = $id->fetchAll()[0]['max(id)'];
        return $result;
    }

    function deleteUser($id)
    {
        $STH = $this->DBH->prepare("DELETE FROM `hw5`.`users` WHERE `id`='$id';");
        $STH->execute();
        if ($STH->errorCode() !== "00000") {
            return false;
        }
        return true;
    }

    function deletePhoto($id)
    {
        $STH = $this->DBH->prepare("UPDATE `hw5`.`users` SET `photo`='' WHERE id=$id;");
        $STH->execute();
        return true;
    }

}