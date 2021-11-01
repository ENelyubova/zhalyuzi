<div class="product-list__item">
	<div class="product-list__image">
        <picture class="">
            <source 
                srcset="<?= $data->getImageUrlWebp(268, 200,false,null); ?>" 
                type="image/webp">
            <img 
                src="<?= $data->getImageNewUrl(268, 200,false,null); ?>" 
                alt="">
        </picture>
	</div>
	<div class="product-list__name">
		<?= $data->name; ?>
	</div>
</div>
