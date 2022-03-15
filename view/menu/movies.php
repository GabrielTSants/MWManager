<?php require_once __DIR__.'/../header.php'; ?>
<section class="jumbotron text-center">
    <div class="container">
      <h1>Bem vindo ao Quiz, <?=$_SESSION['usuario'];?></h1>
      <p class="lead text-muted">Selecione um quiz para iniciar .</p>
      <p>
        <a href="<?= $data['routeScore']?>" class="btn btn-primary my-2">Resultados Anteriores</a>
        <a href="<?= $data['routeRanking']?>" class="btn btn-secondary my-2">Ranking Geral</a>
      </p>
    </div>
</section><br>

<div class="container"> 
    <div class="row">
      <?php foreach($listMovies as $movie): ?>
        <div class="card hvr-reveal col-md-4 col-sm-5 col-lg-3 mb-2 ml-2">
          <div class="view overlay">
          <?php if (empty($movie->cover)): ?>
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
            <?php else: ?>
              <img class="card-img-top mt-2" src="<?="/public/assets/img/{$quiz['img']}" ?>" width="100%" height="100%" alt="Card image cap"/>
            <?php endif;?>
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title block" id="<?=$movie->name?>"><?=$movie->name?><a onclick="downloadInfo(<?=$movie->name?>)" class="ic-download-info">&nbsp;<img height="20px" width="20px" src="/img/icon/Info.svg"></a></h5>
            <hr>
            <p class="card-text"><?= !empty($movie->description) ? $movie->description : 'No description' ?></p>
            <p class="card-text"><?= $movie->completed == 0 ? 'To watch' : 'Watch' ?></p>
          </div>
          <div class="row justify-content-end ">
              <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Iniciar</a>
          </div>
        </div>
      <?php endforeach ?>        
    </div>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>

<script>
  function downloadInfo(itemName) {
    let formData = new FormData();
    const name = document
        .querySelector(`#${itemName}`).value
        .value;
    alert(itemName);
    break;
    formData.append('name', name);
    formData.append('api', 'movies');
    const url = `/downInfo`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
  } 
</script>