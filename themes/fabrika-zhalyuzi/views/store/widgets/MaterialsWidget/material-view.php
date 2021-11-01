<?php if($categories) : ?>
    <?php foreach ($categories as $key => $data) : ?>
        <div class="materials-list__item materials-item">
            <a href="<?= $data->getMaterialUrl(); ?>">
                <div class="materials-item__img">
                    <picture class="absolute-img-picture">
                        <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                        <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(180, 160, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(180, 160, true, null,'image'); ?>">

                        <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->image->alt; ?>">
                    </picture>
                    <div class="materials-item__style"></div>
                </div>
                <div class="materials-item__name">
                    <?= $data->name_material; ?>
                </div>
            </a>
        </div>   
    <?php endforeach; ?>
<?php endif; ?>
