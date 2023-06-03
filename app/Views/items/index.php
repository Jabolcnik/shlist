<?= view('templates/header', ['title' => 'Items']) ?>

<div class="container">
    <h2>Items</h2>
    <?php if ($listId): ?>
        <h4>List ID: <?= $listId ?></h4>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Is Bought</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['is_bought'] ? 'Yes' : 'No' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/items/create?ListId=<?= $listId ?>" class="btn btn-primary">Add</a>
</div>

<?= view('templates/footer') ?>
