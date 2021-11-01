<?php
/* @var $attributes array */
?>

<?php $this->widget(
    'application.modules.store.widgets.filters.AttributesFilterWidget', [
        'attributes' => $attributes,
        'category' => $category,
    ]
) ?>

<?php if (!empty($attributes) || !empty($category)): ?>
    <div class="filter-content__button fl fl-w fl-ai-c">
    	<input type="submit" value="Подобрать" class="but-filter btn btn-black"/>
    	<button type="reset" class="but-reset reset-filter btn btn-white">Сбросить</button>
    </div>
<?php endif; ?>