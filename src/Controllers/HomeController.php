<?php

namespace App\Controllers;

use Kernel\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {

        dd($this->db());

        $this->view->page('home');
    }
}