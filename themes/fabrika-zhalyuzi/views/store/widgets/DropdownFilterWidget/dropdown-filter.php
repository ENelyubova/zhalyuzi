<?php $filter = Yii::app()->getComponent('attributesFilter'); ?>

<?php if ($attribute->name == 'color'): ?>
<div data-collapse="persist" id="filter-radio" class="filter-block">
    <div class="filter-block__title"><?= $attribute->title ?></div>
    <div class="filter-block__body">
        <div class="color-list-type fl fl-w">
            <?php foreach ($attribute->options as $option): ?>
                <div class="color-list-type__item">
                    <?= CHtml::checkBox(
                        $filter->getDropdownOptionName($option),
                        $filter->getIsDropdownOptionChecked($option, $option->id),
                        [
                            'value' => $option->id,
                            'class' => 'checkbox',
                            'id' => 'filter-attribute-' . $option->id
                        ]) ?>
                    <label style="background: #<?=$option->value; ?>" class="checkbox__label" for="filter-attribute-<?=$option->id; ?>"></label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php else: ?>
<div data-collapse="persist" id="filter-radio" class="filter-block">
    <div class="filter-block__title"><?= $attribute->title ?></div>
    <div class="filter-block__body">
        <div class="filter-block__list">
            <?php foreach ($attribute->options as $option): ?>
                <div class="filter-block__list-item">
                    <?= CHtml::checkBox(
                        $filter->getDropdownOptionName($option),
                        $filter->getIsDropdownOptionChecked($option, $option->id),
                        [
                            'value' => $option->id,
                            'class' => 'checkbox',
                            'id' => 'filter-attribute-' . $option->id
                        ]) ?>
                    <?= CHtml::label($option->value, 'filter-attribute-' . $option->id,
                        ['class' => 'checkbox__label']) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>