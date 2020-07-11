<?php

abstract class AdminBase
{
    public function __construct()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if($user['role'] == 'admin')    {
            return true;
        }

        die('Access denied');
    }
}

?>