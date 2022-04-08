<?php require_once __DIR__.'/../header.php'; ?>
<div class="container">
  <form action="login" method="POST">
    <div class="form-group">
      <label for="login"><h3>Login</h3></label>
      <input type="text" id="username" name="username" placeholder="Enter login" class="form-control">
      <label for="password" class="mt-2"><h3>Password</h3></label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
    </div>
    <button class="btn btn-primary">Login</button>
  </form>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>

