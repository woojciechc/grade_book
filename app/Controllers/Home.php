<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = "Strona główna";
        return view('home', $data);
    }
}
