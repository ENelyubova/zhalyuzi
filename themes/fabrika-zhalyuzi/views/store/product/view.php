<?php

/* @var $product Product */

$this->title = $product->getMetaTitle();
$this->description = $product->getMetaDescription();
$this->keywords = $product->getMetaKeywords();
$this->canonical = $product->getMetaCanonical();

$mainAssets = Yii::app()->getModule( 'store' )->getAssetsUrl();
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/jquery.simpleGal.js' );

Yii::app()->getClientScript()->registerCssFile( Yii::app()->getTheme()->getAssetsUrl() . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( Yii::app()->getTheme()->getAssetsUrl() . '/js/store.js' );

$this->breadcrumbs = array_merge(
    [ Yii::t( "StoreModule.store", 'Catalog' ) => [ '/store/product/index' ] ],
    $product->category ? $product->category->getBreadcrumbs( true ) : [], [ CHtml::encode( $product->name ) ]
);

?>

<div class="store-container product-container pb">
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

        <?php $images = $product->getImages(); ?>
        <?php if($images) : ?>
            <div class="category-gallery">
                <div class="catalog-carousel category-slider slick-slider">
                    <?php foreach ($images as $key => $image) : ?>
                        <div class="catalog-carousel__item">
                            <a data-fancybox="image" href="<?= $image->getImageNewUrl(0, 0, true, null,'name'); ?>">
                                <picture class="absolute-img-picture">
                                    <source media="(min-width: 401px)" srcset="<?= $image->getImageUrlWebp(0, 0, true, null,'name'); ?>" type="image/webp">
                                    <source media="(min-width: 401px)" srcset="<?= $image->getImageNewUrl(0, 0, true, null,'name'); ?>">
                                
                                    <source media="(min-width: 1px)" srcset="<?= $image->getImageUrlWebp(285, 200, true, null,'name'); ?>" type="image/webp">
                                    <source media="(min-width: 1px)" srcset="<?= $image->getImageNewUrl(285, 200, true, null,'name'); ?>">
                                
                                    <img src="<?= $image->getImageNewUrl(285, 200, true, null,'name'); ?>">
                                </picture>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="product-view js-load-chapche">
            <div class="product-view-top fl fl-w fl-jc-sb">
                <div class="product-view__info category__title">
                    <h1 class="heading heading-pb" itemprop="name"><?= CHtml::encode($product->getTitle()); ?></h1>
                    <div class="product-view__btn">
                        <a href="#" class="btn btn-green" data-toggle="modal" data-target="#productModal" tabindex="0"><?= Yii::t("StoreModule.store", "Find out the cost"); ?></a>
                    </div>
                </div>

                <?php if ($product->description): ?>
                    <div class="product-view__desc category__child"><?= $product->description; ?></div>
                <?php endif; ?>
            </div>
            <?php if ($product->data): ?>
                <div class="product-view__table">
                    <?= $product->data; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
        'id'=> 14,
        'view' => 'project'
    ]); ?>

    <div class="contacts-form pt">
        <div class="content-site">
            <h2 class="heading heading-pb"><?= Yii::t("StoreModule.store", "Still have questions? <br>Ask our specialists"); ?></h2>
            <?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
                'id' => 'contactModal',
                'view' => 'contact-form',
                'formClassName' => 'StandartForm',
                'buttonModal' => false,
                'titleModal' => 'Оставьте <span>заявку</span>',
                'subTitleModal' => 'и мы Вам перезвоним!',
                'showCloseButton' => false,
                'isRefresh' => true,
                'eventCode' => 'napisat-nam',
                'successKey' => 'napisat-nam',
                'showAttributeBody' => true,
                'showAttributeEmail' => true,
                'showAttributeCheck' => true,
                'required' => 'emailRequired',
                'modalHtmlOptions' => [
                    'class' => 'modal-my modal-my-xs',
                ],
                'formOptions' => [
                    'htmlOptions' => [
                        'class' => 'form-my',
                    ]
                ],
                'modelAttributes' => [
                    'theme' => 'Обратная связь',
                ],
            ]) ?>
        </div>
    </div>
</div>


<!-- Узнать стоимость -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'productModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Оставьте заявку',
    'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => false,
    'showAttributeBody' => false,
    'eventCode' => 'uznat-stoimost',
    'successKey' => 'uznat-stoimost',
    'modalHtmlOptions' => [
        'class' => 'modal-my modal-my-xs',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => "Запрос со страницы {$product->name}",
    ],
]) ?>