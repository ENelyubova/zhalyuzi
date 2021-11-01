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

<div class="page-txt page-contacts">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>

        <div class="heading-block fl fl-w">
            <div class="contacts-item">
                <h1 class="heading-page heading heading-block"><?= $model->title; ?></h1>
            </div>
            <div class="contacts-item">
                <?= $model->body; ?>
            </div>
        </div>
    </div>

    <div class="contacts-collapse bg-gray">
        <div class="content-site">
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Звоните нам, пишите или закажите звонок. Мы перезвоним</div>
                <div class="contacts-collapse__info">
                    <div class="contacts-collapse__phone-1 fl fl-w fl-ai-c">
                        <div class="phone-item">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone1']); ?>
                            <?php endif; ?>
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone2']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="phone-item">
                            <a href="#" class="btn btn-black" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</a>
                        </div>
                    </div>
                    <div class="contacts-collapse__phone-2  fl fl-w fl-ai-c">
                        <div class="phone-item">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone3']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="phone-item social">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'messenger']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Время работы офиса:</div>
                <div class="contacts-collapse__info contacts-collapse__mode">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Выезжаем на замеры:</div>
                <div class="contacts-collapse__info contacts-collapse__mode">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'measurements']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Все вопросы, пожелания, предложения вы можете направить на почту компании</div>
                <div class="contacts-collapse__info">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Следите за обновлениями и новостями в социальных сетях</div>
                <div class="contacts-collapse__info social">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w">
                <div class="contacts-collapse__label">Адрес офиса и производства:</div>
                <div class="contacts-collapse__info">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="contacts-map" id="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A4bbd683916ee0f3d6f87a992c2cc6b94a5e5ec157b489ff822a2c3ff126e768d&amp;source=constructor" width="100%" height="500" frameborder="0"></iframe>
    </div>
</div>
