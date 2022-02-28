<?php require_once __DIR__.'/../header.php'; ?>
<div class="wrapper d-flex ">
    <div class="sidebar"> 
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="#"><i class="far fa-credit-card"></i>Add new category</a></li>
        <?php if(!empty($listCategories)) : ?>
        </ul> <small class="text-muted px-3">CATEGORIES</small>
        <ul>
            <?php foreach($listCategories as $category): ?>
            <li><a href="/<?=strtolower($category->name)?>"><?=$category->name?></a></li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>
    </div>
</div>

<?php require_once __DIR__.'/../footer.php'; ?>
