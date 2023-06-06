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
            <div class="mt-3">
                <h5>Shopping Lists</h5>
                <ul class="list-group">
                    <?php foreach ($shopping_lists as $list) : ?>
                        <li class="list-group-item">
                            <?= $list['name'] ?>
                            <button class="btn btn-primary btn-sm float-right select-list" data-list-id="<?= $list['id'] ?>">Fiter items</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button class="btn btn-secondary mt-3" id="clear-filter">Clear Filter</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Unbought Items</h5>
                    <p class="card-text"><?= $num_unbought_items ?></p>
                </div>
            </div>
            <div class="mt-3">
                <h5>Unbought Items</h5>
                <ul class="list-group" id="unbought-items">
                    <?php foreach ($unbought_items as $item) : ?>
                        <li class="list-group-item">
                          <?= $item['name'] ?>
                          <button class="btn btn-primary btn-sm float-right select-list" data-list-id="<?= $item['id'] ?>">Mark as bought</button>
                      </li>
                    <?php endforeach; ?>
                </ul>
                
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {
// Function to filter unbought items based on the selected shopping list
  function filterUnboughtItems(listId) {
      $.ajax({
          url: '/items/filterItems',
          type: 'POST',
          data: { listId: listId },
          dataType: 'json',
          success: function(response) {
              // Clear the existing items
              $('#unbought-items').empty();

              // Append the filtered items
              if (response.items.length > 0) {
                  $.each(response.items, function(index, item) {
                      $('#unbought-items').append('<li class="list-group-item">' + item.name + '</li>');
                  });
              } else {
                  $('#unbought-items').append('<li class="list-group-item">No items found.</li>');
              }
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
  }

  // Function to clear the filter and display all unbought items
  function clearFilter() {
      $.ajax({
          url: '/items/clearFilter',
          type: 'POST',
          dataType: 'json',
          success: function(response) {
              // Clear the existing items
              $('#unbought-items').empty();

              // Append all unbought items
              if (response.items.length > 0) {
                  $.each(response.items, function(index, item) {
                      $('#unbought-items').append('<li class="list-group-item">' + item.name + '</li>');
                  });
              } else {
                  $('#unbought-items').append('<li class="list-group-item">No items found.</li>');
              }
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
  }

  // Event listener for the "Select" button on shopping lists
  $(document).on('click', '.select-list', function() {
      var listId = $(this).data('list-id');
      filterUnboughtItems(listId);
  });

  // Event listener for the "Clear Filter" button
  $(document).on('click', '#clear-filter', function() {
      clearFilter();
  });
});

</script>
<?= view('templates/footer') ?>
