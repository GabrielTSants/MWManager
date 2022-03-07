<?php require_once __DIR__.'/../header.php'; ?>

<form method="POST" action="/new-category">
  <div class="container">
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" name="categoryList" id="categoryList">
        <option></option>
        <?php foreach($categories as $category) : ?>
        <option value="<?=$category->id?>"><?=$category->name?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-success  float-right mt-2" name="save">Save</button>
    </div>
  </div>
</form>

<?php require_once __DIR__.'/../footer.php'; ?>
