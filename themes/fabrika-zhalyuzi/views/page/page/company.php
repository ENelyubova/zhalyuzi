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

<div class="company-page">
	<div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
    
        <h1 class="heading-page heading heading-block"><?= $model->title_short; ?></h1>

        <?php $images = $model->photos; ?>
        <div class="about-content company-content fl fl-w fl-ai-c fl-jc-sb">
            <?php if($images) : ?>
                <div class="about-content__carousel company-content__carousel">
                    <div class="slider">
                        <div class="aboutSlider slick-slider">
                            <?php foreach ($images as $key => $image): ?>
                                <div class="slider-item slider-item_about">
                                    <div class="slider-item__img">
                                        <picture class="absolute-img-picture">
                                            <source media="(min-width: 400px)" srcset="<?= $image->getImageUrlWebp(0, 0, true, null, 'image'); ?>" type="image/webp">
                                            <source media="(min-width: 400px)" srcset="<?= $image->getImageNewUrl(0, 0, true, null, 'image'); ?>">
                                            <source media="(min-width: 1px)" srcset="<?= $image->getImageUrlWebp(380, 330, true, null, 'image'); ?>" type="image/webp">
                                            <source media="(min-width: 1px)" srcset="<?= $image->getImageNewUrl(380, 330, true, null, 'image'); ?>">
                            
                                            <img src="<?= $image->getImageNewUrl(0, 0, true, null, 'image'); ?>" alt="">
                                        </picture>
                                    </div>
                                    <div class="slider-shadow"></div>
                                    <div class="slider-border slider-border_about"></div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="slider-nav about-nav fl fl-ai-c">
                            <div class="arrows fl fl-ai-c"></div>
                            <div class="counter aboutCounter"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="about-content__text company-content__text">
                <?= $model->body; ?>
                <div class="amigo fl fl-ai-c">
                    <img src="<?= $this->mainAssets . '/images/amigo.png' ?>" alt="Amigo-logo">
                    <p>Являемся официальным представителем компании <a href="https://amigo.ru/">AMIGO</a></p>
                </div>
            </div>
        </div>
        <?php if($model->getAttributeValue('about')['value']): ?>
            <div class="about-quality">
                <?= $model->getAttributeValue('about')['value']; ?>
            </div>
        <?php endif; ?>

        <?php if($model->getAttributeValue('quality')['value']): ?>
            <div class="company-quality pt">
                <h2 class="heading heading-pb"><?= $model->getAttributeValue('quality')['name']; ?></h2>
                <div class="slider-progress-wrapper">
                    <div class="company-quality-slider slick-slider">
                        <?= $model->getAttributeValue('quality')['value']; ?>
                    </div>
                    <div class="company-quality-nav slider-progress-nav fl fl-ai-c fl-jc-sb">
                        <div class="fl fl-ai-c">
                            <div class="arrows fl fl-jc-sb">
                            </div>
                            <div class="companyCounter slider-progress-counter"></div>
                        </div>
                        <div class="progres" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($model->getAttributeValue('gallery')): ?>
            <div class="company-gallery portfolio pt">
                <h2 class="heading heading-pb"><?= $model->getAttributeValue('gallery')['name']; ?></h2>
                <div class="slider-progress-wrapper">
                    <div class="portfolio-slider">
                        <div class="portfolioSlider slick-slider">
                            <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                                'id' => $model->id,
                                'fancybox' => true,
                                'code' => 'gallery',
                                'view' => 'company-gallery'
                            ]); ?>
                        </div>
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

        <?php endif; ?>
    </div>
</div>

<?php $this->widget('application.modules.page.widgets.PagesNewWidget',[
    'view' => 'still-questions'
]); ?>
