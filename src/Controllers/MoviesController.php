<?php

namespace App\Controllers;

use Kernel\Http\Redirect;
use Kernel\Controller\Controller;

class MoviesController extends Controller
{
    public function index()
    {
        $this->view->page('movies');
    }

    public function add()
    {
        $this->view->page('/admin/movies/add');
    }

    public function store()
    {
        $data  = [];
        $rules = ['name' => ['required', 'min:3', 'max:255']];

        foreach($rules as $field => $rule) {
            $data[$field] = $this->request->input($field);
        }

        $validation = $this->validator->validate($data, $rules);


        if ($validation) {

            // dd($this->validator->getErrors());
            foreach ($this->validator->getErrors() as $field => $eeror) {


                $this->session->set($field, $eeror);
            }

            $this->redirect->to('/admin/movies/add');
        }

        print_r("validation pass");
    }
}