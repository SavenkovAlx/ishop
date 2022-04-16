<?php

namespace app\controllers;

use ishop\Cache;
use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Main page', 'description...', 'keys....');
    }

}