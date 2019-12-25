<?php 

class UserController
{
    public static function login()
    {
        // Get login info
        $password = $_POST['password'] ?? '';
        $username = $_POST['username'] ?? '';
        
        // Get the user
        $user = User::GetOne([ 'username' => $username ]);

        // Validate the password
        if(empty($user) or !password_verify($password, $user['password'])) {
            return Router::getInstance()->Call('view', 'login');
        }

        // Handle successful login
        $_SESSION['user'] = $user;
        return Router::getInstance()->Call();
    }
}