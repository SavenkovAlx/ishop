<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Main page', 'description...', 'keys....');
        $this->set(['name' => 'Alexander', 'age' => 22]);
    }

}