<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends AuthController
{
    public function index($id)
    {
        $model = new UserModel();
        
        $data['user'] = $model->find($id);
        
        if (empty($data['user']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the user: ' . $id);
        }
        
        echo view('user_view', $data);
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
        if ($user && password_verify($password, $user['password']))
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
    {    
      session()->remove('isLoggedIn');
      return redirect()->to('/login');
    }
}
