<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class AuthController extends Controller
{
    public function index()
    {
        $this->view->page('login');
    }


    public function login()
    {
        dd($this->request->input('password'));
    }
}