<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function user()
    {
        $dataUser = $this->userModel->getUser()->getResult();
        $data = array(
            'title' => 'Data All User',
            'user' => $dataUser
        );
        return view('/admin/user', $data);
    }
    public function hapus($user_id)
    {
        $this->userModel->delete($user_id);
        return redirect()->to(base_url('/admin/user'));
    }
}
