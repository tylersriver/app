<?php

namespace Sample\Domain\User;

use Ion\Db\Table;

class UserTable extends Table
{
    protected static $table = 'user';
    protected static $key = 'id';
}