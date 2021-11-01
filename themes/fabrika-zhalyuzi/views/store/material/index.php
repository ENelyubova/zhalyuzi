<?php
/* @var $model StoreCategory */
/* @var $this MaterialController */

$this->title = "Материалы";
$this->breadcrumbs = ["Материалы"];
$this->description = Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = Yii::app()->getModule('yupe')->siteKeyWords;
?>

<div class="page-txt">
	<div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
              'links' => $this->breadcrumbs,
            ]
        );?>

        <div class="materials-wrap">
            <h1 class="heading heading-block"><?= "Материалы"; ?></h1>
            <div class="materials-list fl fl-w">
                <?php $this->widget('application.modules.store.widgets.MaterialsWidget'); ?>
            </div>
        </div>

        <h2 class="heading heading-pb">Комплектующие</h2>
        <div class="materials-list fl fl-w">
            <?php $this->widget('application.modules.store.widgets.ComplectsWidget'); ?>
        </div>
    </div>
</div>

<?php $this->widget('application.modules.page.widgets.PagesNewWidget',[
    'view' => 'still-questions'
]); ?>