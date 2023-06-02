<?= view('templates/header', ['title' => 'Dashboard']) ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Active Shopping Lists</h5>
                    <p class="card-text"><?= $num_active_lists ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Unbought Items</h5>
                    <p class="card-text"><?= $num_unbought_items ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
