<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js', CClientScript::POS_END );
/* @var $category StoreCategory */

$this->title = $category->getMetaTitle();
$this->description = $category->getMetaDescription();
$this->keywords = $category->getMetaKeywords();
$this->canonical = $category->getMetaCanonical();

$this->breadcrumbs = [ "Материалы" => [ '/store/material/index' ] ];

$this->breadcrumbs = array_merge(
    $this->breadcrumbs,
    [ CHtml::encode( $category->name ) ]
);

?>
<!-- Конкретная категория - конечная -->
<div class="store-container materials pb">
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

        <h1 class="heading heading-block"><?=$category->name_material; ?></h1>
            
        <div class="product-inner fl fl-w">
            <?php
                $this->widget(
                    'bootstrap.widgets.TbListView',
                    [
                        'dataProvider' => $dataProvider,
                        'id' => 'product-box',
                        'itemView' => '//store/product/_item',
                        'emptyText'=>'В данной категории нет материалов',
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
                                // 'category' => $category
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
</div>

<?php $this->widget('application.modules.page.widgets.PagesNewWidget',[
    'view' => 'still-questions'
]); ?>



