<?php

namespace Sample\Domain\User;

use Ion\Db\Entity;
use Ion\Db\EntityInterface;

class UserEntity extends Entity
{
    /** @var int */
    public $id;

    /** @var string */
    public $email;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $password;

    /** @var string */
    public $username;

    public function hydrate($id = null) : EntityInterface 
    {
        // Get id
        $id = $id ?? $this->id;
        if(is_null($id)) {
            throw new Exception('ID Cannot be null');
        }

        // Set properties
        [
            'id' => $this->id,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'password' => $this->password,
            'username' => $this->username
        ] = UserTable::Get($id);

        return $this;
    }

    public static function fromUsername(string $username): UserEntity
    {
        $user = new Self();

        [
            'id' => $user->id,
            'email' => $user->email,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'password' => $user->password,
            'username' => $user->username
        ] = UserTable::GetOne([
            'username' => $username
        ]);
        return $user;
    }
}