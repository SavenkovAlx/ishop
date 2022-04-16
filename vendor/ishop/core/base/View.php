<?php

namespace ishop\base;

use mysql_xdevapi\Exception;

class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if(is_array($data)) extract($data);
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new Exception("Not found view $viewFile", 404);
        }
        if ($this->layout !== false) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new Exception("Not found template {$layoutFile}");
            }
        }
    }

    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . "\n\t";
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . "\n\t";
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . "\n";
        return $output;
    }

}