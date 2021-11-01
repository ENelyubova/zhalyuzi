<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js', CClientScript::POS_END );
// Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/index.js', CClientScript::POS_END);
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
<!-- Конкретная категория - разделы -->
<div class="store-container catTypes bg-gray pb">
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

        <h1 class="heading-page heading heading-pb"><?= $category->getTitle(); ?></h1>

        <?php $child = $category->children(); ?>

        <?php if(!empty($child)) : ?>
            <div class="catTypes-list fl fl-w">
                <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                    'view' => 'catTypes',
                    'category_id' => $category->id,
                ]); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="writetous pt pb">
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

<div>
    <div class="content-site">
        <hr>
    </div>
</div>

<div class="portfolio pt pb">
    <div class="content-site">
        <div class="heading-block fl fl-w fl-ai-c fl-jc-sb">
            <h2 class="heading"><span>Наши работы</span></h2>
            <a href="#" class="btn btn-white btn-svg btn-svg-right btn-svg-small">
                <span>Все работы</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M0 11.7533L22.3031 11.7533M22.3031 11.7533L11.4795 1M22.3031 11.7533L11.4795 22.5065" stroke="#2D343C" stroke-width="1.5"/>
                </svg>
            </a>
        </div>
        <div class="portfolio-slider">
            <div class="slider-progress-wrapper">
                <?php $this->widget("application.modules.gallery.widgets.SlickMyWidget", ['galleryId' => 1,
                    'slickClass' => 'portfolioSlider slick-slider',
                    'view' => 'slick',
                ]); ?>
                <div class="portfolio-nav slider-progress-nav fl fl-ai-c fl-jc-sb">
                    <div class="fl fl-ai-c">
                        <div class="arrows fl fl-jc-sb">
                        </div>
                        <div class="portfolioCounter slider-progress-counter"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($category->description) : ?>
    <div class="catTypes-description pb">
        <div class="content-site">
            <?= $category->description; ?>
        </div>
    </div>
<?php endif; ?>





