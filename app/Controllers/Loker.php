<?php

namespace App\Controllers;

use App\Models\LokerModel;
use App\Models\PerusahaanModel;
use App\Models\KtgrLokerModel;

class Loker extends BaseController
{
    protected $lokerModel;
    public function __construct()
    {

        $this->lokerModel = new LokerModel();
        $this->perusahaanModel = new PerusahaanModel();
        $this->ktgrLokerModel = new KtgrLokerModel();
        $this->session = \Config\Services::session();
    }

    public function loker()
    {
        $perusahaan = $this->perusahaanModel->findAll();
        $Dt = $this->ktgrLokerModel->findAll();
        $Data1 = $this->lokerModel->getLoker();
        $data = [
            "perusahaan" => $perusahaan,
            "ktgrLoker" => $Dt,
            "title" => "Loker",
            "joinAll" => $Data1,
        ];
        if (session()->get('role') == 'admin') {
            return view('/admin/loker', $data);
        } elseif (session()->get('role') == 'instansi') {
            return view('/instansi/loker', $data);
        } elseif (session()->get('role') == 'pencaker') {
            return view('/pencaker/loker', $data);
        }
    }
    public function tambah()
    {

        $data = [

            'id_ktgr' => $this->request->getPost('id_ktgr'),
            'id_prshn' => $this->request->getPost('id_prshn'),
            'judul_loker' => $this->request->getPost('judul_loker'),
            'posisi' => $this->request->getPost('posisi'),
            'tgl_buka' => $this->request->getPost('tgl_buka'),
            'tgl_tutup' => $this->request->getPost('tgl_tutup'),
            'syrt_pend' => $this->request->getPost('syrt_pend'),
            'gaji' => $this->request->getPost('gaji'),
            'detail_loker' => $this->request->getPost('detail_loker'),
        ];
        $success = $this->lokerModel->tambah($data);
        if ($success) {
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/loker',));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/loker'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/loker'));
            }
            // return redirect()->to(base_url('admin/loker'));
        }
    }

    public function edit($id_loker)
    {
        $this->lokerModel->save([
            'id_loker' => $id_loker,
            'id_ktgr' => $this->request->getVar('id_ktgr'),
            'id_prshn' => $this->request->getVar('id_prshn'),
            'judul_loker' => $this->request->getVar('judul_loker'),
            'posisi' => $this->request->getVar('posisi'),
            'tgl_buka' => $this->request->getVar('tgl_buka'),
            'tgl_tutup' => $this->request->getVar('tgl_tutup'),
            'syrt_pend' => $this->request->getVar('syrt_pend'),
            'gaji' => $this->request->getVar('gaji'),
            'detail_loker' => $this->request->getVar('detail_loker'),
        ]);
        if (session()->get('role') == 'admin') {
            return redirect()->to(base_url('/admin/loker',));
        } elseif (session()->get('role') == 'instansi') {
            return redirect()->to(base_url('/instansi/loker'));
        } elseif (session()->get('role') == 'pencaker') {
            return redirect()->to(base_url('/pencaker/loker'));
        }
        // return redirect()->to(base_url('admin/loker'));
    }

    public function hapus($id_loker)
    {
        $this->lokerModel->delete($id_loker);
        if (session()->get('role') == 'admin') {
            return redirect()->to(base_url('/admin/loker',));
        } elseif (session()->get('role') == 'instansi') {
            return redirect()->to(base_url('/instansi/loker'));
        } elseif (session()->get('role') == 'pencaker') {
            return redirect()->to(base_url('/pencaker/loker'));
        }
        // return redirect()->to(base_url('admin/loker'));
    }
}
