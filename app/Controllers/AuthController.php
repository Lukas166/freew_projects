<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BiodataModel;

class AuthController extends BaseController
{
    public function homemenu(): string
    {
        return view('main');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();

            $user = $userModel->where('username', $username)->first();
            $userID = $user['user_id'];

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    setcookie('userid', $userID, time() + (3600 * 24), '/');
                    setcookie('username', $username, time() + (3600 * 24), '/');
                    return redirect()->to('/main');
                } else {
                    return redirect()->back()->with('error', 'Incorrect password. Please try again.');
                }
            } else {
                return redirect()->back()->with('error', 'Username does not exist. Please check your username.');
            }
        }

        return view('login/sign_in');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $confirmPassword = $this->request->getPost('confirm');

            if ($password !== $confirmPassword) {
                return redirect()->back()->with('error', 'Passwords do not match. Please try again.');
            }

            $userModel = new UserModel();
            $biodataModel = new BiodataModel();

            if ($userModel->where('username', $username)->countAllResults() > 0) {
                return redirect()->back()->with('error', 'Username already exists. Please choose another one.');
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $biodataModel->insert([
                'First_name' => '',
                'Last_name' => ''
            ]);
            $biodataID = $biodataModel->getInsertID();

            $userModel->insert([
                'username' => $username,
                'password' => $hashedPassword,
                'Biodata_ID' => $biodataID,
            ]);

            return redirect()->to('login')->with('success', 'Registration successful!');
        }

        return view('login/sign_up');
    }

    public function logout()
    {
        session()->destroy();

        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time() - 3600);
        }

        return redirect()->to('/login');
    }
}
