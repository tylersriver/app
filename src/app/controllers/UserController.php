<?php 

class UserController
{
    /**
     * Attempt to login a user
     */
    public function login()
    {
        // Get login info
        $password = $_POST['password'] ?? '';
        $username = $_POST['username'] ?? '';
        
        // Get the user
        $user = User::GetOne([ 'username' => $username ]);

        // Validate the password
        if(empty($user) or !password_verify($password, $user['password'])) {
            $_GET['error'] = 'Invalid login credentials. Please try again.';
            return Router::getInstance()->Call('view', 'login');
        }

        // Handle successful login
        $_SESSION['user'] = $user;
        return Router::getInstance()->Call('view', 'home');
    }

    /**
     * Logout
     */
    public function logout()
    {
        session_destroy();
        return Router::getInstance()->Call('view', 'login');
    }

    /**
     * Create a new user
     */
    public function create()
    {
        // Gather form information
        $firstName = $this->getUserFieldFromPost('firstname');
        $lastName = $this->getUserFieldFromPost('lastname');
        $email = $this->getUserFieldFromPost('email');
        $userName = $this->getUserFieldFromPost('username');
        $password = password_hash($this->getUserFieldFromPost('password'), PASSWORD_DEFAULT);
        $reEnterPassword = password_hash($this->getUserFieldFromPost('reenterpassword'), PASSWORD_DEFAULT);

        // Validate
        if(is_null($firstName) 
            or is_null($lastName) 
            or is_null($email)
            or is_null($userName)
            or is_null($password)
        ) {
            $_GET['error'] = 'Please enter all information';
            return Router::getInstance()->Call('view', 'new-user');
        }

        // Check password
        if($_POST['password'] !== $_POST['reenterpassword']) {
            $_GET['error'] = 'Passwords do not match.';
            return Router::getInstance()->Call('view', 'new-user');
        }

        // See if user already exists
        $user = User::GetOne(['username' => $userName]);
        if($user) {
            $_GET['error'] = 'Username already exists. Please choose another.';
            return Router::getInstance()->Call('view', 'new-user');
        }

        // Create user record
        User::Add([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'username' => $userName,
            'password' => $password
        ]);

        // Login
        return $this->login();
    }

    /**
     * Pull a user form field from post
     */
    private function getUserFieldFromPost(string $field)
    {
        return
            ( isset($_POST[$field]) and $_POST[$field] != '' ) 
                ? (string)$_POST[$field] 
                : null;
    }
}