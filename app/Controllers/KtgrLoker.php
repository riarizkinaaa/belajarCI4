<?php

namespace App\Controllers;

use App\Models\KtgrLokerModel;

class KtgrLoker extends BaseController
{
    protected $ktgrLokerModel;
    public function __construct()
    {
        $this->ktgrLokerModel = new KtgrLokerModel();
    }
    // func for read data
    public function ktgrLoker()
    {
        $dataKtgrLoker = $this->ktgrLokerModel->getKtgrLoker()->getResult();
        $dataKtgr = array(
            "title" => "KtgrLoker",
            "ktgr_loker" => $dataKtgrLoker
        );
        return view('admin/ktgrLoker', $dataKtgr);
    }

    // func for insert data
    public function tambah()
    {
        // validation form
        if (!$this->validate([
            'nm_ktgr' => 'required|is_unique[ktgr_loker.nm_ktgr]'
        ])) {
            $valid_msg = \Config\Services::validation();
            return redirect()->to('/admin/ktgrLoker')->withInput()->with('validation', $valid_msg);
        }

        $data = [
            'nm_ktgr' => $this->request->getPost('nm_ktgr'),
            // 'validation' => \Config\Services::validation()
        ];

        // tampilkan pesan jika data berhasil di simpan
        session()->setFlashdata('pesan', 'data berhasil di tambahkan');

        $succes = $this->ktgrLokerModel->tambah($data);
        if ($succes) {
            return redirect()->to(base_url('admin/ktgrLoker'));
        }
    }

    // func for edit data
    public function edit($id_ktgr)
    {
        $this->ktgrLokerModel->save([
            'id_ktgr' => $id_ktgr,
            'nm_ktgr' => $this->request->getVar('nm_ktgr')
        ]);
        return redirect()->to(base_url('/admin/ktgrLoker'));
    }

    public function hapus($id_ktgr)
    {
        // $id_ktgr = $this->request->getPost('id_ktgr');
        $this->ktgrLokerModel->delete($id_ktgr);
        return redirect()->to(base_url('/admin/ktgrLoker'));
    }
}
