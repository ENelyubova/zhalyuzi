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

        <div class="panel panel-default">
            <?php foreach ($model->getAttributeGroup(5) as $key => $data) : ?>
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#panel<?= $key; ?>" class="fl fl-w fl-ai-c fl-jc-sb"><?= $data['name']; ?></a>
                </div>
                <div class="panel-content">
                    <div id="panel<?= $key; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                             <?= $data['value']; ?>
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