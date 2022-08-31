<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('auth/register', $data);
    }

    public function register()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[8]|max_length[50]',
            'confirmpassword'  => 'matches[password]',
            'role'          => 'required|min_length[6]|max_length[50]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role'    => $this->request->getVar('role'),
            ];
            $userModel->save($data);
            return redirect()->to('login');
        } else {
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'user_image' => $user['user_image'],
            "role" => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // $sess = [
                //     'id' => $user->user_id,
                //     'username' => $user->username,
                //     'email' => $user->email,
                //     'user_image' => $user->user_image,
                //     'role' => $user->role,

                // ];

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if ($user['role'] == 'admin') {
                    return redirect()->to(base_url('admin/dashboard'));
                } elseif ($user['role'] == 'instansi') {
                    return redirect()->to(base_url('instansi/dashboard'));
                } elseif ($user['role'] == 'pencaker') {
                    return redirect()->to(base_url('pencaker/dashboard'));
                }
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
