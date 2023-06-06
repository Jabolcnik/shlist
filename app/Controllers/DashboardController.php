<?php namespace App\Controllers;

use App\Models\ShoppingListModel;
use App\Models\ItemModel;

class DashboardController extends AuthController
{
    public function index()
    {
        $itemModel = new ItemModel();
        $shoppingListModel = new ShoppingListModel();

        $shopping_lists = $shoppingListModel->getAllNotDeletedLists();
        $num_active_lists = count($shopping_lists);
       
        $unbought_items = $itemModel->getAllNotDeletedItems();
        $num_unbought_items = $itemModel->countUnboughtItems();

        // Prepare the data array to be passed to the view
        $data = [
            'shopping_lists' => $shopping_lists,
            'num_active_lists' => $num_active_lists,
            'unbought_items' => $unbought_items,
            'num_unbought_items' => $num_unbought_items
        ];

        return view('dashboard', $data);
    }
}
