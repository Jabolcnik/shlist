<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Shopping list' ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center navbar-custom mb-3">
    <a class="navbar-brand" href="/">
        <img src="/assets/2124169_app_cart_essential_list_shopping_icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Shopping List
    </a>
    <div class="collapse navbar-collapse justify-content-center mt-1" id="navbarNav">
        <ul class="navbar-nav mt-1">
          <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/shopping-list">Shopping List</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/users">Users</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
    </div>
</nav>
