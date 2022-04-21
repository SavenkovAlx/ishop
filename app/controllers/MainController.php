<?php

namespace app\controllers;

use ishop\Cache;
use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction()
    {
        $ids = [3, 4, 32];
        $brands = R::find('brand', ' id IN ( ' . R::genSlots($ids) . ' ) ', $ids);
        $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $this->setMeta('Main page', 'description...', 'keys....');
        $this->set(compact('brands', 'hits'));
    }

}