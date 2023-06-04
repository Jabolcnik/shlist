<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Shopping list' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="/path/to/your/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
