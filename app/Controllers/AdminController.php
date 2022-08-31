<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokerModel; //import LokerModel
use App\Models\PerusahaanModel; //import PerusahaanModel
use App\Models\LamaranModel; //import LamaranModel
use App\Models\PencakerModel; //import PencakerModel

class AdminController extends BaseController
{
    protected $perusahaanModel; //inisialisasi Variable perusahaanModel
    protected $lokerModel; //inisialisasi Variable lokerModel
    protected $lamaranModel; //inisialisasi Variable lamaranModel
    protected $pencakerModel; //inisialisasi Variable pencakerModel

    public function __construct()
    {
        $this->perusahaanModel = new PerusahaanModel(); //load data perusahaan for count
        $this->lokerModel = new LokerModel(); //load data loker for count
        $this->lamaranModel = new LamaranModel(); //load data lamaran for count
        $this->pencakerModel = new PencakerModel(); //load data pencaker for count

        $this->session = \Config\Services::session();
        if ($this->session->get('role') != 'admin') {
            echo 'akses di tolak';
            exit;
        }
    }
    public function index()
    {
        //variable declaration, and fetch the calculated data in models
        $data['count'] = $this->lokerModel->countData();
        $data['jmlPrshn'] = $this->perusahaanModel->countData();
        $data['jmlPencaker'] = $this->pencakerModel->countData();
        $data['jmlLamaran'] = $this->lamaranModel->countData();

        return view('admin/dashboard', $data); //return data to view
    }
}
