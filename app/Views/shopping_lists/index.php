<?= view('templates/header', ['title' => 'Shopping Lists']) ?>

<div class="container">
    <h2>Shopping Lists</h2>
    <div class="row">
        <?php foreach ($shoppingLists as $list): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= $list['name'] ?></h5>
                        <p class="card-text"><?= $list['description'] ?></p>
                        <p class="card-text">Number of Items: <?= $itemCount[$list['id']] ?></p>
                        <a href="/shopping-list/edit/<?= $list['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $list['id'] ?>">Delete</a>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal-<?= $list['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-<?= $list['id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel-<?= $list['id'] ?>">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this shopping list?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="/shopping-list/delete/<?= $list['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="/shopping-list/create" class="btn btn-primary">Add</a>
</div>


<?= view('templates/footer') ?>
