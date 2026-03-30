<?php

namespace src\controllers;

use src\models\Users;
class UsersController extends Controller
{
    public function signUp()
    {
        $this->view->renderHtml('users/signUp.php');
    }
}