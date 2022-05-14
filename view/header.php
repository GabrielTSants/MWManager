<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
  <title><?=$title?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">My Web Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php if (isset($_SESSION['username'])): ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"></ul><!-- Future buttons -->
      <form class="form-inline my-2 my-lg-0">
        <a href="/settings" class="mr-2"><?=$_SESSION['username']?></a>
        <a class="btn btn-secondary btn-sm" href="/logout">Logout</a>
      </form>
    </div>
  <?php endif; ?>
</nav>
<body>
