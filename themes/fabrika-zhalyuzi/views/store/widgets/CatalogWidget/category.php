<?php if($category) : ?>
	<?php foreach ($category as $key => $data) : ?>
		<?php $child = $data->children(); ?>
		<?php //if($child) : ?>
			<?php //foreach ($child as $key => $item) : ?>
                <div class="column-count js-column" data-key="<?= $key+1; ?>">
            	    <a href="<?= $data->getCategoryUrl(); ?>" class="category__name"><?= $data->name; ?></a>
					<?php $this->widget('application.modules.store.widgets.ProductsFromCategoryWidget', [
					    'slug'  => $data->slug,
					    'view' => 'product',
					]); ?>
                </div>
            <?php //endforeach; ?>
		<?php //endif; ?>
	<?php endforeach; ?>
<?php endif; ?>    

<?php Yii::app()->getClientScript()->registerScript("js-column", "
	var columnLength = $('.js-column').length;
	columnLength = (columnLength % 2 == 0) ? columnLength / 2 : (columnLength + 1) / 2;
	$('.js-column[data-key=\"'+columnLength+'\"]').addClass('column-count-clear');
"); ?>