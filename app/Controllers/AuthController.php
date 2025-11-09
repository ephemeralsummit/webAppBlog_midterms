<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->getByEmail($email);

        if ($user && password_verify($password, $user['Password'])) {
            $session->set([
                'UserID' => $user['UserID'],
                'Username' => $user['Username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/posts')->with('message', 'Welcome back, ' . $user['Username']);
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }

    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function registerPost()
    {
        $userModel = new UserModel();
        helper(['form']);

        $data = [
            'Username' => $this->request->getPost('username'),
            'Email' => $this->request->getPost('email'),
            'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $userModel->insert($data);
        return redirect()->to('/login')->with('message', 'Registration successful! Please log in.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Logged out successfully.');
    }
}
