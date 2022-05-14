<?php require_once __DIR__.'/../header.php'; ?>
<div class="wrapper d-flex ">
    <div class="sidebar"> 
        <small class="text-muted px-3">ITEMS & CATEGORIES</small>
        <ul class="list-group">
            <li class="lis-group-item"><a href="/new-item"><i class="far"></i>New item</a></li>
            <li class="lis-group-item"><a href="/new-genre"><i class="far"></i>New genre</a></li>
            <li class="lis-group-item"><a href="/new-category"><i class="far"></i>New category</a></li>
        </ul>
        <?php if(!empty($listCategories)) : ?>
            <small class="text-muted px-3">CATEGORIES</small>
            <ul class="list-group">
                <?php foreach($listCategories as $category): ?>
                    <li  class="lis-group-item"><a href="/<?=strtolower($category->name)?>"><?=$category->name?></a></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>
