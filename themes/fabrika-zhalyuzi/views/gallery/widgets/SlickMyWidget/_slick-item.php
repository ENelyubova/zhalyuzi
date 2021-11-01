<div class="portfolio-slider__item">
	<div class="portfolio-slider__img">
		<picture class="absolute-img-picture">
	        <source media="(min-width: 401px)" srcset="<?= $data->image->getImageUrlWebp(0, 0, true, null,'file'); ?>" type="image/webp">
	        <source media="(min-width: 401px)" srcset="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>">
	
	        <source media="(min-width: 1px)" srcset="<?= $data->image->getImageUrlWebp(370, 240, true, null,'file'); ?>" type="image/webp">
	        <source media="(min-width: 1px)" srcset="<?= $data->image->getImageNewUrl(370, 240, true, null,'file'); ?>">
	
	        <img src="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>" alt="<?= $data->image->alt; ?>">
	    </picture>
		<div class="slider-border slider-border_portfolio"></div>
	</div>
	<div class="portfolio-slider__name">
		<?= $data->image->name; ?>
	</div>
</div>

