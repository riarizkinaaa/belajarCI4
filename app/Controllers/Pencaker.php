<?php

namespace App\Controllers;

use App\Models\PencakerModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use Exception;

class Pencaker extends BaseController
{
    public function __construct()
    {
        $this->PencakerModel = new PencakerModel();
    }
    public function Pencaker()
    {
        $datapencaker = $this->PencakerModel->getPencaker()->getResult();
        // $pr = $this->perusahaanModel->findAll();
        // dd($datapencaker);
        session();
        $data = [
            "pencaker" => $datapencaker,
            "title" => "pencaker",
            'info' => $this->PencakerModel->findAll(),
            'validation' => \config\Services::validation()
        ];
        return view('/admin/pencaker', $data);
        // dd($pr);
    }

    // func for insert data

    public function tambah()
    {
        if (!$this->validate([
            'nm_lkp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama lengkap harus di isi'
                ]
            ],
            'tgl_lhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal lahir harus di isi'
                ]
            ],
            'usia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'umur harus di isi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus di isi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus di isi'
                ]
            ],
            'tlp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telpon harus di isi'
                ]
            ],
            'peng_ker' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pengalaman kerja harus di isi'
                ]
            ],
            'bid_keahlian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'bidang keahlian harus di isi'
                ]
            ],
            'sertifikat' => [
                'rules' => 'uploaded[sertifikat]|mime_in[sertifikat,application/pdf,application/mword]',
                'errors' => [
                    'uploaded' => 'pilih FIle terlebih dahulu',
                    'mime_in' => 'yang anda masukkan bukan file'
                ]
            ],
        ])) {
            session()->setFlashdata('pesan', 'Data Belum Lengkap !');
            return redirect()->to(base_url('/admin/pencaker'))->withInput();
        }
        // ambil gambar
        $Sertifikat = $this->request->getFile('sertifikat');

        // pindahkan file
        $Sertifikat->move('sertifikat1');

        // ambil nama file
        $namaSertifikat = $Sertifikat->getName();
        $data = [
            'nm_lkp' => $this->request->getPost('nm_lkp'),
            'tgl_lhr' => $this->request->getPost('tgl_lhr'),
            'jk' => $this->request->getPost('jk'),
            'usia' => $this->request->getPost('usia'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'tlp' => $this->request->getPost('tlp'),
            'pend_ter' => $this->request->getPost('pend_ter'),
            'peng_ker' => $this->request->getPost('peng_ker'),
            'bid_keahlian' => $this->request->getPost('bid_keahlian'),
            'sertifikat' => $namaSertifikat,
            // 'id_prshn' =>$this->request->getPost()
        ];
        // dd($data);
        $success = $this->PencakerModel->tambah($data);
        if ($success) {
            session()->setFlashdata('pesan2', 'Data Berhasil Ditambah !');
            return redirect()->to(base_url('/admin/pencaker'));
            // dd($data);
        }
        // print_r($data);
        // try{
        //     $this->PencakerModel->tambah($data);
        //         return redirect()->to(base_url('pencaker'));
        // }catch(Exception $e){
        //     dd($e);
        // }
    }

    // func edit
    public function edit($id_pencaker)
    {
        try {
            $this->PencakerModel->update($id_pencaker, [
                'id_pencaker' => $id_pencaker,
                'nm_lkp' => $this->request->getVar('nm_lkp'),
                'tgl_lhr' => $this->request->getVar('tgl_lhr'),
                'jk' => $this->request->getVar('jk'),
                'usia' => $this->request->getVar('usia'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'tlp' => $this->request->getVar('tlp'),
                'pend_ter' => $this->request->getVar('pend_ter'),
                'peng_ker' => $this->request->getVar('peng_ker'),
                'bid_keahlian' => $this->request->getVar('bid_keahlian'),
                'sertifikat' => $this->request->getVar('sertifikat'),

            ]);
            return redirect()->to(base_url('/admin/pencaker'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    // func hapus
    public function hapus($id_pencaker)
    {
        // $this->PencakerModel->delete($id_pencaker);
        // return redirect()->to(base_url('pencaker'));
        try {
            $this->PencakerModel->delete($id_pencaker);
            return redirect()->to(base_url('/admin/pencaker'));
        } catch (Exception $e) {
            dd($e);
        }
    }
}
