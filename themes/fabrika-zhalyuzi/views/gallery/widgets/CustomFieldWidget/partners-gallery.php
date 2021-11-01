<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<div class="partners-slider slick-slider">
		<?php foreach ($photos as $key => $photo): ?>
			<div class="partners-slider__item fl fl-ai-c fl-jc-c">
	        	<picture class="absolute-img-pictur">
	        		<source media="(min-width: 401px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 401px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

		            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(170, 65, true,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(170, 65, true,  $photo['image']); ?>">

		            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
		        </picture>
	    	</div>
	    <?php endforeach ?>
    </div>
<?php endif; ?>