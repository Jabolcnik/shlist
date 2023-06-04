<?= view('templates/header', ['title' => 'Users']) ?>

<div class="container">
    <h1>Users</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 0; ?>
            <?php foreach ($users as $user) : ?>
                <?php $rowClass = ($counter % 2 == 0) ? 'bg-light' : ''; ?>
                <tr class="<?= $rowClass; ?>">
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td>
                        <a href="/users/edit/<?= $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/users/create" class="btn btn-success">Add</a>
</div>

<?= view('templates/footer') ?>
