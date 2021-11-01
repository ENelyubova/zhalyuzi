<div class="product-list__item">
    <a data-jsmodal="#material-box-modal" data-content=".js-material-box<?=  $data->id; ?>" href="#" class="">
    	<div class="product-list__image">
            <picture>
                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(140, 140, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(140, 140, true, null,'image'); ?>">

                <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->image->alt; ?>">
            </picture>
    	</div>
    	<div class="product-list__name">
    		<?= $data->name; ?>
    	</div>
    </a>

    <div class="js-material-box<?=  $data->id; ?> hidden">
        <div class="modal-view fl fl-w">
            <div class="modal-view__img">
                <?php $images = $data->getImages(); ?>
                <?php if($images) : ?>
                    <?php foreach ($images as $key => $image) : ?>
                        <div class="modal-img__item">
                            <picture class="absolute-img-pictur">
                                <source media="(min-width: 401px)" srcset="<?= $image->getImageUrlWebp(0, 0, true, null,'name'); ?>" type="image/webp">
                                <source media="(min-width: 401px)" srcset="<?= $image->getImageNewUrl(0, 0, true, null,'name'); ?>">
                            
                                <source media="(min-width: 1px)" srcset="<?= $image->getImageUrlWebp(270, 270, true, null,'name'); ?>" type="image/webp">
                                <source media="(min-width: 1px)" srcset="<?= $image->getImageNewUrl(270, 270, true, null,'name'); ?>">
                            
                                <img src="<?= $image->getImageNewUrl(270, 270, true, null,'name'); ?>">
                            </picture>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="modal-view__info">
                <div class="box-wrapper">
                    <div class="modal-view__title"><?=  $data->short_description; ?></div>
                    <div class="modal-view__params"><?=  $data->description; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
