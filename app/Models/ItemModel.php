<?php namespace App\Models;

class ItemModel extends BaseModel
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['itemname', 'bought', 'userid', 'listid', 'createdby', 'modifiedby', 'deletedby', 'createdon', 'modifiedon', 'deletedon', 'isdeleted'];

    // In ItemModel
    public function countUnboughtItems()
    {
        return $this->where('isdeleted', false)->where('bought', false)->countAllResults();
    }
}
