<?php

namespace App\Controllers;

use Kernel\Http\Redirect;
use Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $this->view->page('register');
    }

    public function register() 
    {
        $data  = [];
        $rules = [
            'email'     => ['required', 'email'],
            'password'  => ['required', 'min:3']
        ];

        foreach($rules as $field => $rule) {
            $data[$field] = $this->request->input($field);
        }

        $validation = $this->validator->validate($data, $rules);

        if ($validation) {
            foreach ($this->validator->getErrors() as $field => $eeror) {
                $this->session->set($field, $eeror);
            }
            $this->redirect->to('/register');
        }

        $userId = $this->db()->insert('users', [
            'email'     => $this->request->input('email'),
            'password'  => password_hash($this->request->input('password'), PASSWORD_DEFAULT)
        ]);

        dd(' User created with id = ' . $userId);
    }
}