<?= view('templates/header', ['title' => 'Edit user']) ?>

<div class="container">
    <h1>Edit User</h1>
    <form action="/users/update/<?= $user['id']; ?>" method="post">
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/users" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?= view('templates/footer') ?>