<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function __construct()
  {
    helper('url');
    $this->session = \Config\Services::session();
  }
  
  private function isLoggedIn()
  {
      // Check for isLoggedIn session variable instead of user_id
      if (!$this->session->get('isLoggedIn'))  
      {
          return false;
      }
      return true;
  }

  public function index()
  {
      if (!$this->isLoggedIn()) 
      {
          return redirect()->to('/login');
      }
      return redirect()->to('/dashboard');
  }
}
