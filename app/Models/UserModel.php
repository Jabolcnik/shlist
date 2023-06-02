<?php namespace App\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'useremail', 'password', 'createdby', 'modifiedby', 'deletedby', 'isdeleted'];
}