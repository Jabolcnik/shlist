<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $returnType = 'array';
}
