<?php

namespace Sample\App\Action\User;

use Ion\Action\Action;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Sample\Domain\User\UserEntity;
use Sample\Domain\User\UserTable;

use function strlen;
use function password_hash;

class CreateUserAction extends Action
{
    protected function action() : ResponseInterface
    {
        // New User Params
        [
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $email,
            'username' => $userName,
            'password' => $password,
            'reenterpassword' => $reEnterPassword
        ] = $this->request->getParsedBody();

        // Validate password
        $validatePassword = $this->validatePassword($password, $reEnterPassword);
        if($validatePassword["result"] === false) {
            return $this->bodyResponse(400, $validatePassword['reason']);
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Validate Username
        $validateUsername = $this->validateUsername($userName);
        if($validateUsername["result"] === false) {
            return $this->bodyResponse(400, $validateUsername['reason']);
        }

        // Create User
        UserTable::Add([
            'username' => $username,
            'password' => $hashedPassword,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email
        ]);

        return $this->bodyResponse(200, 'Success');
    }

    /**
     * @param string $password
     * @param string $reEnterPassword 
     * @return array ["result" => bool, "value" => string]
     */
    private function validatePassword(string $password, string $reEnterPassword) : array
    {
        // Check same
        if($password !== $reEnterPassword) {
            return ["result" => false, "reason" => "Passwords do not match"];
        }

        // check length
        if(strlen($password) < 12) {
            return ["result" => false, "reason" => "Password must be at least 12 characters"];
        }

        // check characters
        if(!self::hasUppercase($password)) {
            return ["result" => false, "reason" => "Passwords must have at least 1 capital letter"];
        } elseif(!self::hasNumber($password)) {
            return ["result" => false, "reason" => "Passwords must have at least 1 number"];
        }

        return ["result" => true, "reason" => "Good password"];
    }

    /**
     * @param string $userName
     * @return array ["result" => bool, "value" => string]
     */
    private function validateUsername(string $userName) : array
    {
        $existingUser = UserTable::GetOne(['username' => $userName]);
        if($existingUser !== false) {
            return ["result" => false, "reason" => "User Already exists"];
        } else if ($userName === "") {
            return ["result" => false, "reason" => "Username cannot be empty"];
        }

        return ["result" => true, "reason" => "Username okay"];
    }

    /**
     * @param string $string
     * @return bool
     */
    private static function hasUppercase(string $string) : bool
    {
        return (bool) preg_match('/[A-Z]/', $string);
    }
    
    /**
     * @param string $string
     * @return bool
     */
    private static function hasNumber($string)  : bool
    {
        return (bool) preg_match('/[0-9]/', $string);
    }
}