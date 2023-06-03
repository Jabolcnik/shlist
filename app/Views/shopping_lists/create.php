<?= view('templates/header', ['title' => 'Add Shopping list']) ?>

<div class="container">
    <h2>Add Shopping list</h2>

    <form action="/shopping-list/store" method="POST">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>        

        <button type="submit" class="btn btn-primary">Add List</button>
    </form>
</div>

<?= view('templates/footer') ?>
