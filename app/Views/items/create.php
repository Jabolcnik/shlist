<?= view('templates/header', ['title' => 'Add Item']) ?>

<div class="container">
    <h2>Add Item</h2>
    <?php if ($listId): ?>
        <h4>List ID: <?= $listId ?></h4>
    <?php endif; ?>

    <form action="/items/store" method="POST">
        <input type="hidden" name="shopping_list_id" value="<?= $listId ?>" />

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>

<?= view('templates/footer') ?>
