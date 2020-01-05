<?php

namespace app\models;

use ionphp\database\ORM;

class User extends ORM
{
    protected static $table = 'user';
    protected static $key = 'id';
}