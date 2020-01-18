<?php

namespace app\models;

use Ion\Database\ORM;

class User extends ORM
{
    protected static $table = 'user';
    protected static $key = 'id';
}