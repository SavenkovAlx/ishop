<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        $this->setMeta('Main page', 'description...', 'keys....');
        $name = 'John';
        $age = '30';
        $this->set(compact('name', 'age', 'posts'));
    }

}