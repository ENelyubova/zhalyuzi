<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>

<div class="page-txt">
	<div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
    
        <h1 class="heading-page heading heading-block"><?= $model->title; ?></h1>

        <div class="services-collapse">
            <?php foreach ($model->getAttributeGroup(4) as $key => $data) : ?>
                <div class="services-collapse__item services-collapse__item_<?= $key; ?>">
                    <div class="services-collapse__content fl fl-w">
                        <div class="services-collapse-title">
                            <?= $data['name']; ?>
                        </div>
                        <div class="services-collapse-body">
                            <?= $data['value']; ?>
                        </div>
                        <div class="services-collapse-btn">
                            <?php if($data['butName']) : ?>
                                <a class="btn btn-black" href="#" class="btn btn-black" data-toggle="modal" data-target="#callbackModal" tabindex="0">Оставить заявку</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php $this->widget('application.modules.page.widgets.PagesNewWidget',[
    'view' => 'still-questions'
]); ?>