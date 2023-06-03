<?php namespace App\Models;

class ShoppingListModel extends BaseModel
{
  protected $table = 'shopping_lists';
  protected $primaryKey = 'id';
  protected $allowedFields = ['name', 'description', 'is_deleted', 'created_at', 'updated_at', 'deleted_at'];


    // In ShoppingListModel
    public function countActiveLists()
    {
        return $this->where('is_deleted', false)->countAllResults();
    }

    public function getAllNotDeletedLists()
    {
        return $this->where('is_deleted', false)->findAll();
    }
}