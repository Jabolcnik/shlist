<?php namespace App\Controllers;

use App\Models\ShoppingListModel;
use App\Models\ItemModel;

class DashboardController extends AuthController
{
    public function index()
    {
        $shoppingListModel = new ShoppingListModel();
        $itemModel = new ItemModel();
        
        $data = [
            'num_active_lists' => $shoppingListModel->countActiveLists(),
            'num_unbought_items' => $itemModel->countUnboughtItems(),
        ];
        
        return view('dashboard', $data);
    }
}
