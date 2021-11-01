<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js', CClientScript::POS_END );
/* @var $category StoreCategory */

$this->title = $category->getMetaTitle();
$this->description = $category->getMetaDescription();
$this->keywords = $category->getMetaKeywords();
$this->canonical = $category->getMetaCanonical();

$this->breadcrumbs = [ Yii::t( "StoreModule.store", "Продукция" ) => [ '/store/product/index' ] ];

$this->breadcrumbs = array_merge(
    $this->breadcrumbs,
    $category->getBreadcrumbs( false )
);

?>
<!-- Конкретная категория - конечная -->
<div class="store-container card pb">
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

        <div class="card-view fl fl-w">
            <div class="card-view__text">
                <h1 class="heading-page heading heading-block"><?= $category->getTitle(); ?></h1>
                <?= $category->description; ?>
                <div class="card-view__btn fl fl-w fl-ai-c">
                    <a href="#" class="btn btn-black" data-toggle="modal" data-target="#selectionModal" tabindex="0">Оставить заявку</a>
                    <a href="#" class="btn btn-white" data-toggle="modal" data-target="#orderFreeModal" tabindex="0">Бесплатный замер</a>
                </div>
            </div>

            <?php $photos = $category->photos(['order' => 'position DESC']); ?>
            <?php if($photos) : ?>
                <div class="card-view__gallery">
                    <div class="cardView-slider slick-slider">
                        <?php foreach ($photos as $key => $data) : ?>
                            <div class="cardView-slider__item">
                                <div class="cardView-slider__img">
                                    <picture class="absolute-img-picture">
                                        <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                        <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">
                                    
                                        <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(360, 250, true, null,'image'); ?>" type="image/webp">
                                        <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(360, 250, true, null,'image'); ?>">
                                    
                                        <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
                                    </picture>
                                </div>
                                <div class="slider-shadow"></div>
                                <div class="slider-border slider-border_main"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-nav card-nav fl fl-ai-c">
                        <div class="arrows fl fl-ai-c"></div>
                        <div class="counter cardCounter"></div>
                    </div>
                </div> 
            <?php endif; ?> 
        </div>

        <div class="card-body">
            <?php if($category->getAttributeGroup(6) || $category->getAttributeGroup(7) || $category->product || $category->getAttributeGroup(8) || $category->getAttributeGroup(9) || $category->getAttributeGroup(10)): ?>
                <ul class="nav nav-tabs" id="myTab">
                    <?php if (!empty($category->getAttributeGroup(6))): ?>
                        <li><a href="#desc" data-toggle="tab"><?= Yii::t("StoreModule.store", "Описание"); ?></a></li>
                    <?php endif; ?> 

                    <?php if (!empty($category->getAttributeGroup(7))): ?>
                        <li><a href="#options" data-toggle="tab"><?= Yii::t("StoreModule.store", "Опции"); ?></a></li>
                    <?php endif; ?>

                    <?php if (!empty($category->getAttributeGroup(8))): ?>
                        <li><a href="#montage" data-toggle="tab"><?= Yii::t("StoreModule.store", "Замер и монтаж"); ?></a></li>
                    <?php endif; ?>

                    <?php if ($category->product): ?>
                        <li><a href="#materials" data-toggle="tab"><?= Yii::t("StoreModule.store", "Материалы"); ?></a></li>
                    <?php endif; ?>

                    <?php if (!empty($category->getAttributeGroup(9))): ?>
                        <li><a href="#color" data-toggle="tab"><?= Yii::t("StoreModule.store", "Цвета фурнитуры"); ?></a></li>
                    <?php endif; ?>

                    <?php if (!empty($category->getAttributeGroup(10))): ?>
                        <li><a href="#gallery" data-toggle="tab"><?= Yii::t("StoreModule.store", "Наши работы"); ?></a></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
            <div class="tab-content">
                <?php if (!empty($category->getAttributeGroup(6))): ?>
                    <div class="tab-pane" id="desc">
                        <h2 class="heading heading-block">Описание и особенности</h2>
                        <div class="panel panel-default">
                            <?php foreach ($category->getAttributeGroup(6) as $key => $data) : ?>
                                <div class="panel__item fl fl-w fl-jc-sb">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#page1<?= $key; ?>" >
                                            <?= $data['name']; ?>
                                        </a>
                                    </div>
                                    <div class="panel-content">
                                        <div id="page1<?= $key; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $data['value']; ?>

                                                <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                                                    'id' => $category->id,
                                                    'code' => $data['code'],
                                                    'view' => 'card-porfolio',
                                                    'module' => 'StoreCategory', 
                                                ]); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
                <?php if (!empty($category->getAttributeGroup(7))): ?>
                    <div class="tab-pane" id="options">
                        <h2 class="heading heading-block">Опции</h2>
                        <div class="panel panel-default">
                            <?php foreach ($category->getAttributeGroup(7) as $key => $data) : ?>
                                <div class="panel__item fl fl-w fl-jc-sb">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#page2<?= $key; ?>" >
                                            <?= $data['name']; ?>
                                        </a>
                                    </div>
                                    <div class="panel-content">
                                        <div id="page2<?= $key; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $data['value']; ?>

                                                <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                                                    'id' => $data->id,
                                                    'code' => $data['code'],
                                                    'view' => 'card-porfolio',
                                                    'module' => 'StoreCategory', 
                                                ]); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
                <?php if ($category->product): ?>
                    <div class="tab-pane" id="materials" itemprop="materials">
                        <h2 class="heading heading-block">Материалы</h2>
                    
                        <div class="product-inner fl fl-w">
                            <?php
                                $this->widget(
                                'bootstrap.widgets.TbListView',
                                [
                                    'dataProvider' => $dataProvider,
                                    'id' => 'product-box',
                                    'itemView' => '//store/product/_item',
                                    'emptyText'=>'В данной категории нет материалов.',
                                    'itemsCssClass' => "product-box product-list",
                                    'htmlOptions' => [
                                        // 'class' => 'product-box'
                                    ],
                                    'ajaxUpdate'=>true,
                                    'enableHistory' => true,
                                    'pagerCssClass' => 'pagination-box',
                                    'pager' => [
                                        'header' => '',
                                        'lastPageLabel' => '<i class="icon-double_arrow-right" aria-hidden="true"></i>',
                                        'firstPageLabel' => '<i class="icon-double_arrow-left" aria-hidden="true"></i>',
                                        'prevPageLabel' => '<i aria-hidden="true"></i>',
                                        'nextPageLabel' => '<i aria-hidden="true"></i>',
                                        'maxButtonCount' => 5,
                                        'htmlOptions' => [
                                            'class' => 'pagination'
                                        ],
                                    ]
                                ]
                            ); ?>

                            <div class="category-box__sidebar">
                                <div class="but-menu-filter">
                                    <a class="btn btn-black btn-svg btn-svg-left" href="#"><i class="fa fa-filter" aria-hidden="true"></i><span>Фильтры</span></a>
                                </div>
                                <div class="sidebar-box">
                                    <div class="sidebar-box__close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.5607 2.56066C20.1464 1.97487 20.1464 1.02513 19.5607 0.43934C18.9749 -0.146447 18.0251 -0.146447 17.4393 0.43934L10 7.87868L2.56066 0.43934C1.97487 -0.146447 1.02513 -0.146447 0.43934 0.43934C-0.146447 1.02513 -0.146447 1.97487 0.43934 2.56066L7.87868 10L0.43934 17.4393C-0.146447 18.0251 -0.146447 18.9749 0.43934 19.5607C1.02513 20.1464 1.97487 20.1464 2.56066 19.5607L10 12.1213L17.4393 19.5607C18.0251 20.1464 18.9749 20.1464 19.5607 19.5607C20.1464 18.9749 20.1464 18.0251 19.5607 17.4393L12.1213 10L19.5607 2.56066Z" fill="black"/></svg>
                                    </div>
                                    <form id="store-filter" name="store-filter" method="get">
                                        <div class="filter-content">
                                            <?php $this->widget('application.modules.store.widgets.filters.ProducerFilterWidget', [
                                                'limit' => 30,
                                                'order' => 'name',
                                                'category' => $category
                                            ]); ?>
                                            <?php $this->widget('application.modules.store.widgets.filters.FilterBlockWidget', [
                                                'category' => $category
                                            ]); ?>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>  
                <?php if (!empty($category->getAttributeGroup(8))): ?>
                    <div class="tab-pane" id="montage">
                        <h2 class="heading heading-block">Замер и монтаж</h2>
                        <div class="panel panel-default">
                            <?php foreach ($category->getAttributeGroup(8) as $key => $data) : ?>
                                <div class="panel__item fl fl-w fl-jc-sb">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#page3<?= $key; ?>" >
                                            <?= $data['name']; ?>
                                        </a>
                                    </div>
                                    <div class="panel-content">
                                        <div id="page3<?= $key; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $data['value']; ?>

                                                <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                                                    'id' => $data->id,
                                                    'code' => $data['code'],
                                                    'view' => 'card-porfolio',
                                                    'module' => 'StoreCategory', 
                                                ]); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
                <?php if (!empty($category->getAttributeGroup(9))): ?>
                    <div class="tab-pane" id="color">
                        <h2 class="heading heading-block">Цвета фурнитуры</h2>
                        <?php foreach ($category->getAttributeGroup(9) as $key => $data) : ?>
                            
                             <?= $data['value']; ?>

                            <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                                'id' => $model->id,
                                'code' => $data['gallery'],
                                'view' => 'card-portfolio',
                                //module указывается (с болш буквы), если используется в другом модуле-news или store
                                'module' => 'StoreCategory', 
                            ]); ?>

                            <?php //$photos = $data['gallery']; ?>
                            <?php /*foreach ($photos as $key => $photo): ?>
                                <div class="thumb-carousel__item">
                                    <a data-fancybox="colors" href="<?= $data->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>">
                                        <picture class="absolute-img-picture">
                                            <source media="(min-width: 401px)" srcset="<?= $data->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
                                            <source media="(min-width: 401px)" srcset="<?= $data->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">
                        
                                            <source media="(min-width: 1px)" srcset="<?= $data->geFieldGalImageWebp(370, 240, true,  $photo['image']); ?>" type="image/webp">
                                            <source media="(min-width: 1px)" srcset="<?= $data->getFieldGalImageUrl(370, 240, true,  $photo['image']); ?>">
                        
                                            <img src="<?= $data->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
                                        </picture>
                                    </a>
                                </div>
                            <?php endforeach;*/ ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
                <?php if (!empty($category->getAttributeGroup(10))): ?>
                    <div class="tab-pane" id="gallery">
                        <h2 class="heading heading-block">Наши работы</h2>
                        <div class="panel panel-default">
                            <?php foreach ($category->getAttributeGroup(10) as $key => $data) : ?>
                                <div class="panel__item fl fl-w fl-jc-sb">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#page5<?= $key; ?>" >
                                            <?= $data['name']; ?>
                                        </a>
                                    </div>
                                    <div class="panel-content">
                                        <div id="page5<?= $key; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $data['value']; ?>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>

<?php Yii::app()->getClientScript()->registerScript("product-myTab", "
    $('#myTab li').first().addClass('active');
    $('.tab-pane').first().addClass('active');
"); ?>


