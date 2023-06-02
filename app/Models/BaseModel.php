<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'createdon';
    protected $updatedField  = 'modifiedon';
    protected $deletedField  = 'deletedon';

    protected $returnType = 'array';
}
