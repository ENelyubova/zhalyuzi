<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/store-frontend.css');
// Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/store.js');

/* @var $category StoreCategory */

$this->title = Yii::app()->getModule('store')->metaTitle ?: Yii::t('StoreModule.store', 'Catalog');
$this->description = Yii::app()->getModule('store')->metaDescription;
$this->keywords = Yii::app()->getModule('store')->metaKeyWords;

$this->breadcrumbs = [Yii::t("StoreModule.store", "Продукция")];
?>

<!-- Каталог -->
<div class="store-container catalog-view bg-gray">
  <div class="content-site">
    <div class="breadcrumbs">
        <div class="row">
            <div class="col-xs-12">
                <?php $this->widget(
                    'bootstrap.widgets.TbBreadcrumbs',
                    [
                      'links' => $this->breadcrumbs,
                    ]
                );?>
            </div>
        </div>        
    </div>

    <h1 class="heading-page heading heading-pb">Продукция</h1>
    <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
        'view' => 'catalog-home'
    ]); ?>
  </div>
</div>
<div class="writetous pt pb bg-gray">
    <div class="content-site">
        <div class="writetous-block fl fl-w fl-jc-sb">
            <div class="writetous__item">
                <h2 class="heading heading-pb"><span>Запишитесь</span> <br>на бесплатный замер</h2>
                <p>Мы свяжемся с вами, проконсультируем по всем вопросам <br>и рассчитаем стоимость заказа. Для замера и обсуждения заказа <br>наш специалист подъедет к вам с образцами продукции.</p>
            </div>
            <div class="writetous__item">
                <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
                <?php endif; ?>
                <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone2']); ?>
                <?php endif; ?>
                <a href="#" class="btn btn-white btn-svg btn-svg-right" data-toggle="modal" data-target="#recordingOnModal" tabindex="0">
                    <span>Записаться на замер</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <path d="M8.54511 25.3459L24.3157 9.57525M24.3157 9.57525L9.05865 9.62495M24.3157 9.57525L24.2661 24.8324" stroke="#2D343C" stroke-width="1.5"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>


