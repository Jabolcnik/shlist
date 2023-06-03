<?php namespace App\Models;

class ItemModel extends BaseModel
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['shopping_list_id', 'name', 'is_bought', 'is_deleted', 'created_at', 'updated_at', 'deleted_at'];

    // In ItemModel
    public function countUnboughtItems()
    {
        return $this->where('is_deleted', false)->where('is_bought', false)->countAllResults();
    }

    public function getAllNotDeletedItems($listId = null)
    {
        $builder = $this->where('is_deleted', false);
        
        if ($listId) {
            $builder->where('shopping_list_id', $listId);
        }
        
        $builder->orderBy('is_bought', 'asc');
        return $builder->findAll();
    }

    public function countItemsByListId($listId)
    {
        return $this->where('shopping_list_id', $listId)->where('is_deleted', false)->countAllResults();
    }
}
