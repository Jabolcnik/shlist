<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UsersController extends AuthController
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
      $userModel = new UserModel();
      $users = $userModel->where('is_deleted', false)->findAll();

      $data = [
          'users' => $users,
      ];

      return view('users/index', $data);
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

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        $data = [
            'user' => $user,
        ];

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
    
        $data = [
          'email' => $this->request->getVar('email'),
          'username' => $this->request->getVar('username')
        ];

        $userModel->update($id, $data);
    
        return redirect()->to('/users');
    }    

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        helper('form');
        $userModel = new UserModel();
    
        $user = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]',
        ]);
    
        if (!$validation->run($user)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $userModel->insert($user);
    
        return redirect()->to('/users');
    }
    
    
}
