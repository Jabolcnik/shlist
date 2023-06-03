<?php namespace App\Controllers;

use App\Models\ShoppingListModel;
use App\Models\ItemModel;

class ShoppingListController extends AuthController
{
    public function index()
    {
        $shoppingListModel = new ShoppingListModel();
        $itemModel = new ItemModel();

        $listId = $this->request->getVar('ListId');
        $data = [
            'shoppingLists' => $shoppingListModel->getAllNotDeletedLists(),
            'itemCount' => $itemModel->countItemsByListId($listId),
            'selectedListId' => $listId
        ];

        return view('shopping_lists/index', $data);
    }

    public function edit($listId)
    {
        return redirect()->to("/items?ListId=$listId");
    }

    public function create()
    {
        return view('shopping_lists/create');
    }

    public function delete($listId)
    {
        $shoppingListModel = new ShoppingListModel();
        $shoppingListModel->delete($listId);
        return redirect()->to('/shopping-list');
    }

    public function store()
    {
        $shoppingListModel = new ShoppingListModel();

        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description')
        ];

        $shoppingListModel->insert($data);

        return redirect()->to("/shopping-list");
    }
}
