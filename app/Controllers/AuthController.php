<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('url');
        
        if (session()->get('isLoggedIn') !== TRUE) {
            return redirect()->to('/login');
        }
    }



    public function showLoginForm()
    {
        return view('login');
    }
}
