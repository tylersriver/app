<?php

namespace App\Domain\User;

use Ion\Db\Table;

class User extends Table
{
    protected static $table = 'user';
    protected static $key = 'id';
}