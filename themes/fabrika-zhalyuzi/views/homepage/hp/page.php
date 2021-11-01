 <?php
/** @var Page $page */

if ($page->layout) {
    $this->layout = "//layouts/{$page->layout}";
}

$this->title = $page->title;
$this->breadcrumbs = [
    Yii::t('HomepageModule.homepage', 'Pages'),
    $page->title
];
$this->description = !empty($page->meta_description) ? $page->meta_description : Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = !empty($page->meta_keywords) ? $page->meta_keywords : Yii::app()->getModule('yupe')->siteKeyWords
?>

<div class="mainscreen">
    <div class="content-site">
        <div class="mainscreen-content fl fl-w fl-jc-sb">
            <div class="mainscreen-callback callback fl fl-ai-c fl-jc-c">
                <a href="#" class="btn btn-black" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
                <a href="#" class="btn btn-white" data-toggle="modal" data-target="#orderFreeModal" tabindex="0">Бесплатный замер</a>
            </div>
            <div class="mainscreen__text">
                <h1 class="mainscreen__title"><?= $page->body; ?></h1>
                <p><?= $page->body_short; ?></p>
                <div class="mainscreen__btn hidden-mobile fl fl-w fl-ai-c">
                    <a href="/store" class="btn btn-white btn-svg btn-svg-right">
                        <span>Подобрать жалюзи</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                        <path d="M8.54511 25.3459L24.3157 9.57525M24.3157 9.57525L9.05865 9.62495M24.3157 9.57525L24.2661 24.8324" stroke="#2D343C" stroke-width="1.5"/>
                        </svg>
                    </a>
                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
                </div>
            </div>
            <div class="mainscreen__slider">
                <div class="slider">
                    <?php $this->widget('application.modules.slider.widgets.SliderWidget', [
                        'category_id' => 1,
                        'view' => 'slider-widget',
                    ]); ?>
                </div>
            </div>
            <div class="mainscreen__btn visible-mobile fl fl-w fl-ai-c">
                <a href="#" class="btn btn-white btn-svg btn-svg-right" data-toggle="modal" data-target="#selectionModal" tabindex="0">
                    <span>Подобрать жалюзи</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <path d="M8.54511 25.3459L24.3157 9.57525M24.3157 9.57525L9.05865 9.62495M24.3157 9.57525L24.2661 24.8324" stroke="#2D343C" stroke-width="1.5"/>
                    </svg>
                </a>
                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
            </div>
        </div>
    </div>
</div>

<div class="advantages hidden-mobile pt bg-desctop">
    <div class="content-site">
        <div class="advantages-wrapper">
            <div class="advantagesSlider slick-slider"><?= $page->getAttributeValue('advantages')['value']; ?></div>
        </div>
    </div>
</div>

<div class="catalog pt bg-desctop">
    <div class="content-site">
        <div class="heading-block fl fl-w fl-ai-fe">
            <h2 class="heading"><span>Продукция</span></h2>
            <p class="subtitle">Ассортимент жалюзи и рулонных штор позволит подобрать оптимальную солнцезащитную систему для гостиной, спальни, рабочего кабинета и любого другого помещения. Большой выбор материалов даст возможность сделать шторы и жалюзи гармоничной частью интерьера традиционного или современного стиля.​​​​​​​</p>
        </div>
        <div class="catalog-panel fl fl-w fl-jc-sb">
            <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                'view' => 'catalog-home',
                'limit' => 8,
            ]); ?>
        </div>
    </div>
</div>

<div class="writetous pt pb bg-desctop">
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

<div class="about pt pb">
    <div class="content-site">
        <div class="heading-block">
            <h2 class="heading"><?= $page->getAttributeValue('about')['name']; ?></h2>
        </div>
        <div class="about-content fl fl-w fl-ai-c fl-jc-sb">
            <div class="about-content__carousel">
                <div class="slider">
                    <?php $this->widget('application.modules.slider.widgets.SliderWidget', [
                        'category_id' => 2,
                        'view' => 'slider-about',
                    ]); ?>
                </div>
            </div>
            <div class="about-content__text">
                <?= $page->getAttributeValue('about')['value']; ?>
                <div class="about-content__btn fl fl-w fl-ai-c">
                    <a href="/o-kompanii" class="btn btn-black btn-svg btn-svg-right btn-svg-small">
                        <span>О компании</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M0 11.7533L22.3031 11.7533M22.3031 11.7533L11.4795 1M22.3031 11.7533L11.4795 22.5065" stroke="white" stroke-width="1.5"/>
                        </svg>
                    </a>
                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#callbackModal" tabindex="0">Связаться с нами</a>
                </div>
            </div>
        </div>
        <?php if($page->getAttributeValue('quality')['value']): ?>
            <div class="about-quality">
                <?= $page->getAttributeValue('quality')['value']; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
 
<div class="portfolio pb">
    <div class="content-site">
        <div class="heading-block fl fl-w fl-ai-c fl-jc-sb">
            <h2 class="heading"><span>Наши работы</span></h2>
            <a href="/portfolio" class="btn btn-white btn-svg btn-svg-right btn-svg-small">
                <span>Все работы</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M0 11.7533L22.3031 11.7533M22.3031 11.7533L11.4795 1M22.3031 11.7533L11.4795 22.5065" stroke="#2D343C" stroke-width="1.5"/>
                </svg>
            </a>
        </div>
        <div class="slider-progress-wrapper">
            <div class="portfolio-slider">
                <?php /*$this->widget("application.modules.gallery.widgets.SlickMyWidget", ['galleryId' => 1,
                    'slickClass' => 'portfolioSlider slick-slider',
                    'view' => 'slick',
                ]);*/ ?>
                <?php $this->widget("application.modules.gallery.widgets.GalleryWidget", [
                    'galleryId' => 1,
                    'view' => 'portfolio',
                    // 'limit' => 10,
                    // 'listView' => true,
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

<div class="advantages visible-mobile pb">
    <div class="content-site">
        <div class="advantages-wrapper">
            <div class="advantagesSlider slick-slider"><?= $page->getAttributeValue('advantages')['value']; ?></div>
        </div>
    </div>
</div>