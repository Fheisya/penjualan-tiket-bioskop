<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register'); // Tampilkan form registrasi
    }

    public function storeRegistration()
    {
        $penggunaModel = new PenggunaModel();

        // Hanya role 'user' yang dapat diregistrasikan
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT),
            'role'     => 'user'  // Role 'user' diset otomatis
        ];

        // Simpan data pengguna
        if ($penggunaModel->save($data)) {
            return redirect()->to('/login')->with('message', 'Registrasi berhasil, silakan login.');
        } else {
            return redirect()->to('/register')->with('message', 'Registrasi gagal, silakan coba lagi.');
        }
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'active' => 'Login'
        ];
        return view('auth/login', $data); // Tampilkan form login
    }

    public function auth()
    {
        $session = session();
        $penggunaModel = new PenggunaModel();

        $email = $this->request->getPost('email');
        $kata_sandi = $this->request->getPost('kata_sandi');

        $user = $penggunaModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($kata_sandi, hash: $user['kata_sandi'])) {
                $sessionData = [
                    'id_pengguna'   => $user['id_pengguna'],
                    'email'  => $user['email'],
                    'role'      => $user['role'],
                    'logged_in' => true,
                ];
                $session->set(data: $sessionData);

                if ($user['role'] === 'admin') {
                    return redirect()->to('admin/dashboard');
                } elseif ($user['role'] === 'user') {
                    return redirect()->to('user/dashboard');
                }
            } else {
                $session->setFlashdata('msg',  'password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg',  'Email tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy(); // Hapus session
        return redirect()->to('/')->with('message', 'Anda telah logout.');
    }
}
