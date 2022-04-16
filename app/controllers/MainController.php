<?php

namespace app\controllers;

use ishop\Cache;
use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        $this->setMeta('Main page', 'description...', 'keys....');
        $name = 'John';
        $age = '30';
        $cache = Cache::instance();
//        $cache->set('test', $posts);
        $cache->delete('test');
        $this->set(compact('name', 'age', 'posts'));
    }

}