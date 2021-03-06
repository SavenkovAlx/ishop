<?php

namespace ishop\base;

use ishop\TSingletone;
use \RedBeanPHP\R as R;

class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if (!R::testConnection()) {
            throw new \Exception('No connection to DB', 500);
        }
        R::freeze(true);
        if (DEBUG) {
            R::debug(true, 1);
        }
    }

}