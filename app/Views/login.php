<?= view('templates/header', ['title' => 'Login']) ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Login</h2>
                <!-- Display flash message for login error -->
                <?php if (session('login_error')): ?>
                    <div class="alert alert-danger">
                        <?= session('login_error') ?>
                    </div>
                <?php endif ?>
                <form action="/auth/login" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
<?= view('templates/footer') ?>