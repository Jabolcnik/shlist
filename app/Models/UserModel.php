<?php namespace App\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'is_deleted', 'created_at', 'updated_at', 'deleted_at'];


    protected  $validationMessages = [
        'email' => [
            'valid_email' => 'Sorry. That email does not look like email. Please correct.',
        ],
        'confirm_password'  => [
          'matches' => 'Sorry. Passwords do not match. Please correct.',
        ]
      ];
}