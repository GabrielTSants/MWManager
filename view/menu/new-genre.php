<?php require_once __DIR__ . '/../header.php'; ?>

<form method="POST" action="/new-genre">
  <div class="container">
    <div class="form-group">
      <label for="genre" class>Genre</label>
      <input type="text" name="genre" class="form-control">
      <label class="d-block" for="category">Category</label>
      <?php foreach ($categories as $category) : ?>
        <div class="form-check-inline" id="categoryList">
          <input class="form-check-input" name="categoryList[]" value="<?= $category->id ?>" id="<?= $category->id ?>" type="checkbox">
          <label class="form-check-label" for="<?= $category->id ?>"> <?= $category->name ?> </label>
        </div>
      <?php endforeach; ?>
      <button class="btn btn-success float-right mt-2" name="save">Save</button>
    </div>
  </div>
</form>

<?php require_once __DIR__ . '/../footer.php'; ?>