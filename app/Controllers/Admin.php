<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => "CineTix || Dashboard",
            'active' => 'home'
        ];
        return view('admin/index', $data);
    }
}
