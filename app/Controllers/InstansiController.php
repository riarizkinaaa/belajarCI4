<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokerModel; //import LokerModel
use App\Models\LamaranModel; //import LamaranModel

class InstansiController extends BaseController
{
    protected $lokerModel; //inisialisasi variable loker Model
    protected $lamaranModel; //inisialisasi Variable lamaran model

    public function __construct()
    {
        $this->lokerModel = new LokerModel(); //load data loker for count
        $this->lamaranModel = new LamaranModel(); //load data lamaran for count
        $this->session = \Config\Services::session();
        if ($this->session->get('role') != 'instansi') {
            echo 'akses di tolak';
            exit;
        }
    }
    public function index()
    {
        //variable declaration, and fetch the calculated data in models
        $data['jmlLoker'] = $this->lokerModel->countData();
        $data['jmlLamaran'] = $this->lamaranModel->countData();

        return view('/instansi/dashboard', $data); //return data to view
    }
}
