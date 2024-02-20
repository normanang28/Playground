<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Playground extends BaseController
{
    public function permainan()
    {
        echo view('layout/header');
        echo view('layout/menu');
        echo view('layout/footer');
    }

    public function aktivitas()
    {
        echo view('layout/header');
        echo view('layout/menu');
        echo view('layout/footer');
    }
}
