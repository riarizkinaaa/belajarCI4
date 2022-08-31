<?php

namespace App\Controllers;

use App\Models\LokerModel;
use App\Models\PerusahaanModel;
use App\Models\KtgrLokerModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->lokerModel = new LokerModel();
        $this->perusahaanModel = new PerusahaanModel();
        $this->ktgrLokerModel = new KtgrLokerModel();
    }
    // default Controller
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    public function index()
    {
        $perusahaan = $this->perusahaanModel->findAll();
        $data = $this->ktgrLokerModel->findAll();
        $data2 = $this->lokerModel->getLoker();
        $datas = [
            'perusahaan' => $perusahaan,
            'ktgrLoker' => $data,
            'loker' => $data2,
            'titile' => 'Data Loker',
        ];
        // dd($datas);
        return view('home/index', $datas);
    }
    public function tentang()
    {
        return view('home/tentang');
    }
}
