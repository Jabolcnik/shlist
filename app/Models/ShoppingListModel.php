<?php namespace App\Models;

class ShoppingListModel extends BaseModel
{
    protected $table = 'shoppinglists';
    protected $primaryKey = 'id';
    protected $allowedFields = ['createdby', 'modifiedby', 'deletedby', 'createdon', 'modifiedon', 'deletedon', 'isdeleted'];

    // In ShoppingListModel
    public function countActiveLists()
    {
        return $this->where('isdeleted', false)->countAllResults();
    }
}