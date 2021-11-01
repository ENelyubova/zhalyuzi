<?php if($category) : ?>
    <div class="catalog-list fl fl-w">
        <?php foreach ($category as $key => $data) : ?>
            <div class="catalog-list__item catalog-item">
                <div class="catalog-item__img">
                    <a href="<?= $data->getCategoryUrl(); ?>">
                    <?= $data->svg; ?></a>
                </div>
                <a class="catalog-item__title" href="<?= $data->getCategoryUrl(); ?>"><?= $data->name; ?></a>
                
                <?php $children = $data->children(['condition' => 'status=1', 'order' => 'children.sort ASC']); ?>
                <?php if($children) : ?>
                    <div class="catalog-item__subdirection subdirection">
                        <ul>
                            <?php foreach ($children as $key => $item) : ?>
                                <li class="subdirection__item">
                                    <a href="<?= $item->getCategoryUrl(); ?>" class="subdirection__name"><?= $item->name; ?></a>
                                </li> 
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if($data->short_description): ?>
                    <div class="subdirection">
                        <?= $data->short_description; ?>
                    </div>
                <?php endif; ?>
            </div>   
        <?php endforeach; ?>
    </div>
<?php endif; ?>    