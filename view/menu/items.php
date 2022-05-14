<?php require_once __DIR__.'/../header.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
      <h1>Welcome to MWManager, <?=$_SESSION['username'];?></h1>
      <p class="lead text-muted">.</p>
    </div>
</section><br>

<div class="container"> 
    <div class="row">
      <?php foreach($listItems as $item): ?>
        <div class="card hvr-reveal col-md-4 col-sm-5 col-lg-3 mb-2 ml-2">
          <div class="view overlay">
          <?php if (empty($item->name)): ?>
              <svg class="bd-placeholder-img card-img-top" width="100%" height="40%"><rect  fill="#79999c"></rect></svg>
            <?php else: ?>
              <img class="card-img-top mt-2" src="<?="/img/items/movies/$item->id.jpg" ?>"  alt="Card image cap"/>
            <?php endif;?>
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title block" id="<?=$item->name?>"><?=$item->name?><a onclick="downloadInfo('<?=$item->id?>')" class="ic-download-info">&nbsp;<img height="20px" width="20px" src="/img/icon/Info.svg"></a></h5>
            <hr>
            <p class="card-text"><?= !empty($item->description) ? $item->description : 'No description' ?></p>
            <p class="card-text">Started at: <?= explode(' ', $item->created_at)[0] ?></p>
          </div>
          <div class="row justify-content-end ">
              <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary col m-2" href="#"><?= $item->completed == 0 ? 'Finished' : 'To finish' ?></a>
          </div>
        </div>
      <?php endforeach ?>        
    </div>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>

<script>
  function downloadInfo(itemId) {
    let formData = new FormData();
    formData.append('itemId', itemId);
    formData.append('target', '<?=str_replace('/', '', $_SERVER['PATH_INFO'])?>');
    const url = `/downloadInfo`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
  } 
</script>