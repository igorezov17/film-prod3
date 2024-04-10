<?php 

namespace Kernel\Controller;

use Kernel\View\View;
use Kernel\View\ViewInterface;

abstract class Controller
{
    protected $di;

    protected ViewInterface $view;

    protected $request;

    protected $validator;

    protected $redirect;

    protected $session;

    private   $database;

    public function __construct($di) 
    {
        $this->registerServices($di);
    }

    private function registerServices($di) {
        $this->di           = $di;
        // $this->view         = $di->get('view');
        $this->request      = $di->get('request');
        $this->validator    = $di->get('validator');
        $this->redirect     = $di->get('redirect');
        $this->session      = $di->get('session');
        $this->database    = $di->get('database');
    }


    public function setView(ViewInterface $view)
    {
        $this->view = $view;
    }

    protected function getView()
    {
        return $this->view;
    }

    protected function db() 
    {
        return $this->database;
    }
}