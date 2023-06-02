<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        helper('url');
        
        if (session()->get('isLoggedIn') !== TRUE) {
            return redirect()->to('/login');
        }
    }

    public function login()
    {
        $session = session();

        $model = new UserModel();

        // Retrieve form data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Fetch user data from database
        $user = $model->where('username', $username)->first();

        // If user exists and passwords match
        // if ($user && password_verify($password, $user['password']))
        if ($user && $password === $user['password'])
        {
            // Store user ID in session
            $session->set('user_id', $user['id']);
            // user authenticated successfully
            session()->set('isLoggedIn', true);
            // Redirect to a secure area
            return redirect()->to('/dashboard');
        }
        else
        {
            $session->setFlashdata('login_error', 'Invalid username or password');
            // Redirect back to login page
            return redirect()->back();
        }
    }

    public function logout()
    {    session()->remove('isLoggedIn');
        return redirect()->to('/login');
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
