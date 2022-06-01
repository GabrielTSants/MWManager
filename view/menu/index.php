<?php require_once __DIR__ . '/../header.php'; ?>

<div class="wrapper d-block">
    <div class="sidebar bg-light">
        <small class="text-muted px-3 sidebar-title">Item & Categories</small>
        <ul class="list-group">
            <li class="lis-group-item"><a href="/new-item"><i class="far"></i>New item</a></li>
            <li class="lis-group-item"><a href="/new-genre"><i class="far"></i>New genre</a></li>
            <li class="lis-group-item"><a href="/new-category"><i class="far"></i>New category</a></li>
        </ul>
        <?php if (!empty($listCategories)) : ?>
            <small class="text-muted px-3 sidebar-title">Categories</small>
            <ul class="list-group">
                <?php foreach ($listCategories as $category) : ?>
                    <li class="lis-group-item"><a href="/<?= strtolower($category->name) ?>"><?= $category->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<div class="menu-content px-3">
    <section class="jumbotron text-center">
        <h1>Welcome to MWManager</h1>
        <p class="lead text-muted"></p>
        <p>
            <table class="table menu-table">
            <tr>
            <?php foreach($completedItems as $item): ?>
                <th><?=ucfirst($item->item_type)?></th>
            <?php endforeach; ?>
            </tr>
            <tr>
            <?php foreach($completedItems as $item): ?>
                <td><?=ucfirst($item->total_items . ' / ' . $item->completed )?></td>
            <?php endforeach; ?>
            </table>
            </tr>
        </p>
    </section>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
