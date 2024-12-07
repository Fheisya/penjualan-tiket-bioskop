<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // // Cek apakah user sudah login
        // if (!$session->get('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        // }

        // Cek role dari session
        $role = $session->get('role'); // Peran pengguna (admin/user)

        // Validasi akses berdasarkan role dan segment URI
        $uriSegment = $request->getUri()->getSegment(1); // Ambil segmen pertama dari URI

        if ($uriSegment === 'admin' && $role !== 'admin') {
            // Jika bukan admin, tolak akses
            throw PageNotFoundException::forPageNotFound();
        }

        if ($uriSegment === 'user' && $role !== 'user') {
            // Jika bukan user, tolak akses
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Logika setelah filter (jika diperlukan)
    }
}
