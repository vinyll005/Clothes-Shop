<?php
class UserController
{

    public function actionRegister()
    {
        if(isset($_POST['name']))   {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $errors = false;
            if(!User::checkName($name)) {
                $errors['name'] = 'Name must be longer than 3 letters';
            }
            if(!User::checkEmail($email)) {
                $errors['email'] = 'Wrong email';
            }
            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be longer than 6 symbols';
            }
            if(User::checkEmailExists($email))  {
                $errors['emailExists'] = 'This email already exists';
            }
            if($errors == false)    {
                $result = User::register($name, $email, $password);
        }     
    }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        if(isset($_POST['email']))  {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!User::checkEmail($email)) {
                $errors['email'] = 'Wrong email';
            }
            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be longer than 6 symbols';
            }

            $user = User::checkUserData($email, $password);

            if($user['id'] == false) {
                $errors['userExists'] = 'User with this email/password does not exist';
            }   else    {
                User::auth($user['id'], $user['name'], $email);
                header("Location: /");
            }
        }
        
        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        header("Location: /");
    }

}

?>