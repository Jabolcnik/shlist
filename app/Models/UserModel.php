<?php namespace App\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'is_deleted', 'created_at', 'updated_at', 'deleted_at'];
}