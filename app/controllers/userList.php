<?php

namespace App\Controllers;

use App\Core\MainController;
use App\Models\Users;

class UserList extends MainController
{
    public function index()
    {
        $data = [];
        $_SESSION["user"];
        if ($_SESSION["user"]) {
            $user = new Users();
            $allUsers = $user->getAllUser();
            $data['allUsers'] = $allUsers;
            $data['uploads_dir'] = $this->uploads_dir;
            if ($_GET['delete']){
                $id = $_GET['delete'];
                $currentUser = $user->getUserById($id);
                $photoPas = $this->uploads_dir . '/' . $currentUser['photo'] . '.jpg';
                if ($user->deleteUser($id)){
                    if(file_exists($photoPas)){
                        unlink($photoPas);
                    }else{
                        $data['error'] = 'Ошибка удаления';
                    }
                    $this->redirect('userList', $data);
                } else {
                    $data['error'] = 'Ошибка удаления';
                }
            }
            $this->view->render('list', $data);
        }else{
            $this->redirect('/', $data);
        }
    }
}