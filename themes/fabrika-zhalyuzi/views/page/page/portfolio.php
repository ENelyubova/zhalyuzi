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

<div class="portfolio-page page-txt pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
    
        <h1 class="heading-page heading heading-block"><?= $model->title; ?></h1>

        <?php $this->widget("application.modules.gallery.widgets.GalleryWidget", [
            'galleryId' => 1,
            'view' => 'portfolio-page',
            // 'limit' => 3,
            // 'listView' => true,
        ]); ?>
    </div>
</div>

