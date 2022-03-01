<?php require_once __DIR__.'/../header.php'; ?>

<form>
  <div class="container">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select de exemplo</label>
      
      <select class="form-control" id="exampleFormControlSelect1">
        <?php foreach($categories as $category) : ?>
        <option><?=$category->name?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</form>

<?php require_once __DIR__.'/../footer.php'; ?>
