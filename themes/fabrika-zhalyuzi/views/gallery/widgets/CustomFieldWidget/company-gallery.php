<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<?php foreach ($photos as $key => $photo): ?>
		<div class="portfolio-slider__item">
			<?php if($fancybox) : ?>
                <a data-fancybox="work" class="data-fancybox-<?= $model->id; ?>" href="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">
            <?php endif; ?>
				<div class="portfolio-slider__img">
					<picture class="absolute-img-picture">
	        			<source media="(min-width: 401px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
			            <source media="(min-width: 401px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

			            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(370, 240, true,  $photo['image']); ?>" type="image/webp">
			            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(370, 240, true,  $photo['image']); ?>">

			            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
			        </picture>
					<div class="slider-border slider-border_portfolio"></div>
				</div>		
			<?php if($fancybox) : ?>
                </a>
            <?php endif; ?>	
		</div>
    <?php endforeach; ?>
<?php endif; ?>

<?php $fancybox = $this->widget(
    'gallery.extensions.fancybox3.AlFancybox', [
        'target' => ".data-fancybox-{$model->id}",
        'lang'   => 'ru',
        'config' => [
            'animationEffect' => "fade",
            'buttons' => [
                "zoom",
                "close",
            ]
        ],
    ]
); ?>