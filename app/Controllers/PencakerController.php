<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PencakerController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        if ($this->session->get('role') != 'pencaker') {
            echo 'akses di tolak';
            exit;
        }
    }
    public function index()
    {
        return view('/pencaker/dashboard');
    }
}
