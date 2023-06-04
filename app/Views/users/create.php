<?= view('templates/header', ['title' => 'Add user']) ?>

<div class="container">
    <h1>Add User</h1>
    <?php if (isset($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('/users/store') ?>

    <!-- <form action="/users/store" method="post"> -->
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
            <?php if (isset($errors['email'])) : ?>
                <div class="text-danger"><?= $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required>
            <?php if (isset($errors['username'])) : ?>
                <div class="text-danger"><?= $errors['username']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
            <?php if (isset($errors['password'])) : ?>
                <div class="text-danger"><?= $errors['password']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" class="form-control" required>
            <?php if (isset($errors['confirm_password'])) : ?>
                <div class="text-danger"><?= $errors['confirm_password']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/users" class="btn btn-secondary">Cancel</a>
    <!-- </form> -->
    <?= form_close() ?>    
</div>



<?= view('templates/footer') ?>