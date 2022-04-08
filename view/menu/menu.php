<?php require_once __DIR__.'/../header.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
      <h1>Welcome to MWManager, <?=$_SESSION['username'];?></h1>
      <p class="lead text-muted"></p>
      <p>
        <a href="#" class="btn btn-primary my-2"></a>
        <a href="#" class="btn btn-secondary my-2"></a>
      </p>
    </div>
</section><br>

<div class="container"> 
    <div class="row">
      <?php foreach($listItems as $item): ?>
        <div class="card  hvr-reveal col-md-4 col-sm-5 col-lg-3 mb-2 ml-2">
          <div class="view overlay">
          <?php if (empty($item->cover)): ?>
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
            <?php else: ?>
              <img class="card-img-top mt-2" src="<?="/public/assets/img/{$quiz['img']}" ?>" width="100%" height="100%" alt="Card image cap"/>
            <?php endif;?>
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $item->name ?></h5>
            <hr>
            <p class="card-text"><?= !empty($movie->description) ? $item->description : 'No description' ?></p>
            <p class="card-text"><?= $item->completed == 0 ? 'To watch' : 'Watch' ?></p>
          </div>
          <div class="row justify-content-end ">
              <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Iniciar</a>
          </div>
        </div>
      <?php endforeach ?>        
    </div>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>
