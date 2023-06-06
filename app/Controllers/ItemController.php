<?php namespace App\Controllers;

use App\Models\ItemModel;

class ItemController extends AuthController
{
    public function index()
    {
        $itemModel = new ItemModel();
        $listId = $this->request->getVar('ListId');

        $data = [
            'items' => $itemModel->getAllNotDeletedItems($listId),
            'listId' => $listId
        ];

        return view('items/index', $data);
    }

    public function create()
    {
        $listId = $this->request->getVar('ListId');

        if (!$listId) {
            return redirect()->to('/shopping-list');
        }

        return view('items/create', ['listId' => $listId]);
    }

    public function store()
    {
        $itemModel = new ItemModel();

        $data = [
            'shopping_list_id' => $this->request->getVar('shopping_list_id'),
            'name' => $this->request->getVar('name'),
            'is_bought' => false
        ];

        $itemModel->insert($data);

        return redirect()->to("/items?ListId={$data['shopping_list_id']}");
    }

    public function filterItems()
    {
        $listId = $this->request->getPost('listId');

        $itemModel = new ItemModel();
        $items = $itemModel->getAllNotDeletedItems($listId);

        // Prepare the response
        $response = [
            'items' => $items,
        ];

        return $this->response->setJSON($response);
    }

    public function clearFilter()
    {
        $itemModel = new ItemModel();
        $items = $itemModel->getAllNotDeletedItems();

        // Prepare the response
        $response = [
            'items' => $items,
        ];

        return $this->response->setJSON($response);
    }

}
