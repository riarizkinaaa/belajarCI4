<?php

// namespace App\Controllers;

// use App\Models\LamaranModel;
// use App\Models\LokerModel;
// use App\Models\PencakerModel;
// use CodeIgniter\HTTP\Files\UploadedFile;
// use Exception;

// class Lamaran extends BaseController
// {
//     public function __construct()
//     {
//         $this->lamaranModel = new LamaranModel();
//         $this->lokerModel = new LokerModel();
//         $this->pencakerModel = new PencakerModel();
//     }
//     public function lamaran()
//     {
//         $datalamaran = $this->lamaranModel->getlamaran()->getResult();
//         // $pr = $this->perusahaanModel->findAll();
//         session();
//         $data = [
//             "lamaran" => $datalamaran,
//             "dataLoker" => $this->lokerModel->findAll(),
//             "dataPencaker" => $this->pencakerModel->findAll(),
//             "title" => "lamaran",
//             'info' => $this->lamaranModel->findAll(),
//             'validation' => \config\Services::validation()
//         ];
//         if (session()->get('role') == 'admin') {
//             return view('/admin/lamaran', $data);
//         } elseif (session()->get('role') == 'instansi') {
//             return view('/admin/lamaran', $data);
//         } elseif (session()->get('role') == 'pencaker') {
//             return view('/admin/lamaran', $data);
//         }
//         // return view('/admin/lamaran', $data);
//         // dd($pr);
//     }

//     // func for insert data

//     public function tambah()
//     {
//         if (!$this->validate([
//             'berkas' => [
//                 'rules' => 'uploaded[berkas]|mime_in[berkas,application/pdf,application/mword]',
//                 'errors' => [
//                     'uploaded' => 'pilih File terlebih dahulu',
//                     'mime_in' => 'yang anda masukkan bukan file'
//                 ]
//             ],
//             'tgl_lamar' => [
//                 'rules' => 'required',
//                 'errors' => [
//                     'required' => 'Nama perusahaan harus di isi '
//                 ]
//             ],
//         ])) {
//             session()->setFlashdata('pesan', 'Data Belum Lengkap !');
//             // return redirect()->to(base_url('instansi/lamaran'))->withInput();

//             if (session()->get('role') == 'admin') {
//                 return redirect()->to(base_url('/admin/lamaran'))->withInput();
//             } elseif (session()->get('role') == 'instansi') {
//                 return redirect()->to(base_url('/instansi/lamaran'))->withInput();
//             } elseif (session()->get('role') == 'pencaker') {
//                 return redirect()->to(base_url('/pencaker/lamaran'))->withInput();
//             }
//         }
//         // ambil gambar
//         $fileBerkas = $this->request->getFile('berkas');

//         // pindahkan file
//         $fileBerkas->move('berkas');

//         // ambil nama file
//         $namaberkas = $fileBerkas->getName();
//         $data = [
//             'id_lamaran' => $this->request->getPost('id_lamaran'),
//             'id_pencaker' => $this->request->getPost('id_pencaker'),
//             'id_loker' => $this->request->getPost('id_loker'),
//             'tgl_lamar' => $this->request->getPost('tgl_lamar'),
//             'berkas' => $namaberkas,
//         ];
//         dd($data);
//         $success = $this->perusahaanModel->tambah($data);
//         if ($success) {
//             session()->setFlashdata('pesan2', 'Data Berhasil Ditambah !');
//             // return redirect()->to(base_url('/admin/lamaran'));

//             if (session()->get('role') == 'admin') {
//                 return redirect()->to(base_url('/admin/lamaran'));
//             } elseif (session()->get('role') == 'instansi') {
//                 return redirect()->to(base_url('/instansi/lamaran'));
//             } elseif (session()->get('role') == 'pencaker') {
//                 return redirect()->to(base_url('/pencaker/lamaran'));
//             }
//             // dd($data);
//         }
//     }

//     // func edit
//     public function edit($id_lamaran)
//     {
//         try {
//             $this->lamaranModel->update($id_lamaran, $this->request->getPost());

//             if (session()->get('role') == 'admin') {
//                 return redirect()->to(base_url('/admin/lamaran'));
//             } elseif (session()->get('role') == 'instansi') {
//                 return redirect()->to(base_url('/instansi/lamaran'));
//             } elseif (session()->get('role') == 'pencaker') {
//                 return redirect()->to(base_url('/pencaker/lamaran'));
//             }
//             // return redirect()->to(base_url('/admin/lamaran'));
//         } catch (Exception $e) {
//             dd($e);
//         }
//     }

//     // func hapus
//     public function hapus($id_lamaran)
//     {
//         try {
//             $this->lamaranModel->delete($id_lamaran);
//             if (session()->get('role') == 'admin') {
//                 return redirect()->to(base_url('/admin/lamaran'));
//             } elseif (session()->get('role') == 'instansi') {
//                 return redirect()->to(base_url('/instansi/lamaran'));
//             } elseif (session()->get('role') == 'pencaker') {
//                 return redirect()->to(base_url('/pencaker/lamaran'));
//             }
//         } catch (Exception $e) {
//             dd($e);
//         }
//     }
// }


namespace App\Controllers;

use App\Models\LamaranModel;
use App\Models\LokerModel;
use App\Models\PencakerModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use Exception;

class Lamaran extends BaseController
{
    public function __construct()
    {
        $this->lamaranModel = new LamaranModel();
        $this->lokerModel = new LokerModel();
        $this->pencakerModel = new PencakerModel();
    }
    public function lamaran()
    {
        $datalamaran = $this->lamaranModel->getlamaran()->getResult();
        // $pr = $this->perusahaanModel->findAll();
        session();
        $data = [
            "lamaran" => $datalamaran,
            "dataLoker" => $this->lokerModel->findAll(),
            "dataPencaker" => $this->pencakerModel->findAll(),
            "title" => "lamaran",
            'info' => $this->lamaranModel->findAll(),
            'validation' => \config\Services::validation()
        ];
        if (session()->get('role') == 'admin') {
            return view('/admin/lamaran', $data);
        } elseif (session()->get('role') == 'instansi') {
            return view('/instansi/lamaran', $data);
        } elseif (session()->get('role') == 'pencaker') {
            return view('/pencaker/lamaran', $data);
        }
    }

    // func for insert data
    public function tambah()
    {

        if (!$this->validate([
            'berkas' => [
                'rules' => 'uploaded[berkas]|mime_in[berkas,application/pdf,application/mword]',
                'errors' => [
                    'uploaded' => 'pilih File terlebih dahulu',
                    'mime_in' => 'yang anda masukkan bukan file'
                ]
            ],
            'tgl_lamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan harus di isi '
                ]
            ],
        ])) {
            session()->setFlashdata('pesan', 'Data Belum Lengkap !');
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/lamaran'));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/lamaran'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/lamaran'));
            }
        }
        // ambil gambar
        $fileBerkas = $this->request->getFile('berkas');

        // pindahkan file
        $fileBerkas->move('berkas');

        // ambil nama file
        $namaberkas = $fileBerkas->getName();

        $data = [
            'id_lamaran' => $this->request->getPost('id_lamaran'),
            'id_pencaker' => $this->request->getPost('id_pencaker'),
            'id_loker' => $this->request->getPost('id_loker'),
            'tgl_lamar' => $this->request->getPost('tgl_lamar'),
            'berkas' => $namaberkas,
        ];
        // dd($data);

        $success = $this->lamaranModel->tambah($data);
        if ($success) {
            session()->setFlashdata('pesan2', 'Data Berhasil Ditambah !');
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/lamaran'));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/lamaran'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/lamaran'));
            }
        }
    }

    // func edit
    public function edit($id_lamaran)
    {
        try {
            $this->lamaranModel->update($id_lamaran, $this->request->getPost());
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/lamaran'));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/lamaran'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/lamaran'));
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    // func hapus
    public function hapus($id_lamaran)
    {
        try {
            $this->lamaranModel->delete($id_lamaran);
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/lamaran'));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/lamaran'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/lamaran'));
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
