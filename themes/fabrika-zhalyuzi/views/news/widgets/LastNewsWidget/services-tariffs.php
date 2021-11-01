<?php Yii::import('application.modules.news.NewsModule'); ?>

<div class="row">
    <div class="col-sm-8 col-xs-12">
        <h2 class="title-block-hp">
            <?= $category->name; ?>
            <label> <?= $category->description; ?></label>
        </h4>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="link-block">
            <?= CHtml::link('Ознакомиться с тарифами', ['/uslugi-i-tarify'], ['class'=>'link-lk-btn link-lk link-lk-arrow-right']); ?>
        </div>
    </div>
</div>
 
<div class="row">
	<?php if (isset($models) && $models != []): ?>
    <div class="block-tariffs">
        <?php foreach ($models as $model): ?>
            <div class="col-sm-4 col-xs-12 block-tariff">
                <div class="item-block">
                    <div class="title-block">
                        <?= CHtml::link($model->title, !empty($model->link) ? $model->link : '/uslugi-i-tarify'); ?>
                    </div>
                    <div class="desc-block">
                        <?= $model->full_text; ?>
                    </div>
                        <div class="link-block">
                        <?= CHtml::link('Подробности тарифа', !empty($model->link) ? $model->link : '/uslugi-i-tarify'); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
	</div>
    
	<?php endif; ?>
</div>