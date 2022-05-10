<?php

namespace app\controllers;

use ishop\App;
use RedBeanPHP\R;

class CurrencyController extends AppController
{
    public function changeAction()
    {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if ($currency) {
            $curr = array_key_exists($currency, App::$app->getProperty('currencies')) ? App::$app->getProperty('currencies')[$currency]  : null;
            if (!empty($curr)) {
                setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
            }
        }
        redirect();
    }

}