<div class="aboutSlider slick-slider">
	<?php foreach ($models as $key => $data): ?>
	    <div class="slider-item slider-item_about">
			<div class="slider-item__img">
				<picture class="absolute-img-picture">
	            	<source media="(min-width: 400px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null, 'image'); ?>" type="image/webp">
		            <source media="(min-width: 400px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null, 'image'); ?>">
		            <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(380, 330, true, null, 'image'); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(380, 330, true, null, 'image'); ?>">
	
		            <img src="<?= $data->getImageNewUrl(0, 0, true, null, 'image'); ?>" alt="">
		        </picture>
			</div>
			<div class="slider-shadow"></div>
			<div class="slider-border slider-border_about"></div>
	    </div>
	<?php endforeach ?>
</div>
<div class="slider-nav about-nav fl fl-ai-c">
	<div class="arrows fl fl-ai-c"></div>
	<div class="counter aboutCounter"></div>
</div>



