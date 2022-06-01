<?php require_once __DIR__ . '/../header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php foreach ($listItems as $item) : ?>
      <div class="card col-md-4 col-sm-5 col-lg-2 mb-2 ml-2" id="item-id-<?= $item->id ?>">
          <?php if (empty($item->name)) : ?>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="40%">
              <rect fill="#79999c"></rect>
            </svg>
          <?php else : ?>
            <img height="400px" width="200px" class="card-img-top mt-2" src="<?= "/img/items/movies/$item->id.jpg" ?>" alt="Card image cap" />
          <?php endif; ?>
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        <div class="card-body">
          <h5 class="card-title block" id="<?= $item->name ?>"><?= $item->name ?><a onclick="downloadInfo('<?= $item->id ?>')" class="ic-download-info">&nbsp;<img height="20px" width="20px" src="/img/icon/Info.svg"></a></h5>
          <hr>
          <p>Genre: <?=$item->genre?></p>
          <p class="card-text">Started at: <br> <?= explode(' ', $item->created_at)[0] ?></p>
        </div>
        <div class="row justify-content-end ">
          <a class="btn font-weight-bold text-white btn-indigo btn-rounded btn-md btn-outline-secondary col m-2 <?= !empty($item->completed_at) ? 'bg-success' : 'bg-primary' ?>" id="finish-item-<?=$item->id?>" onclick="completeItem('<?= $item->id ?>')"><?= !empty($item->completed_at) ? 'Completed' : 'Complete' ?></a>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
    function completeItem(itemId){
      let formData = new FormData();
      formData.append('itemId', itemId);
      const url = '/completeItem';
      fetch(url, {
        method: 'POST',
        body: formData
      }).then(() => {
      
        var itemstatus = document.getElementById(`finish-item-${itemId}`);

        if (itemstatus.textContent == 'Complete'){
          itemstatus.innerHTML = 'Completed';
          itemstatus.classList.remove('bg-primary');
          itemstatus.classList.add('bg-success');
        } else {
          itemstatus.innerHTML = 'Complete'
          itemstatus.classList.remove('bg-success');
          itemstatus.classList.add('bg-primary');
        }

      });
    }

  function downloadInfo(itemId) {
    if (confirm('Do you want to download info from API? This will overwrite ALL existent data from this item!')){
      let formData = new FormData();
      formData.append('itemId', itemId);
      formData.append('target', '<?= str_replace('/', '', $_SERVER['PATH_INFO']) ?>');
      const url = `/downloadInfo`;
      fetch(url, {
        method: 'POST',
        body: formData
      }).then(() => {
        toggleInput(serieId);
        //document.getElementById(`item-id-${serieId}`).textContent = nome;
      });
    }
  }
</script>