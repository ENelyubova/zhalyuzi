<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>">
<head>
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_START);?>

    <link rel="preconnect" href="https://mc.yandex.ru">
    <link rel="preconnect" href="https://connect.facebook.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.googleadservices.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://www.gstatic.com">
    <link rel="preconnect" href="https://www.google.com">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->mainAssets; ?>/images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->mainAssets; ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->mainAssets; ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $this->mainAssets; ?>/images/favicon/favicon-192x192.png">

    <link rel="apple-touch-icon" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-180x180.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="ru-RU" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $this->title;?></title>
    <meta name="description" content="<?= $this->description;?>" />
    <meta name="keywords" content="<?= $this->keywords;?>" />

    <?php if ($this->canonical) : ?>
        <link rel="canonical" href="<?= $this->canonical ?>" />
    <?php endif; ?>


    <!-- Шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&family=Prata&display=swap" rel="stylesheet">
    <?php
        Yii::app()->clientScript->registerMetaTag('telephone=no', 'format-detection');

        /*Стили*/
        $indexCss = $this->mainAssets . "/css/style.css";
        $indexCss = $indexCss . "?v-" . filectime(Yii::getPathOfAlias('public') . $indexCss);
        Yii::app()->getClientScript()->registerCssFile($indexCss);

        /*JS*/
        $mainJs = $this->mainAssets . "/js/main.min.js";
        $mainJs = $mainJs . "?v-" . filectime(Yii::getPathOfAlias('public') . $mainJs);
        Yii::app()->getClientScript()->registerScriptFile($mainJs, CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/focus-visible.min.js', CClientScript::POS_END);
        // Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/modernizr.js', CClientScript::POS_END);
    ?>
    
    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END);?>
</head>

<body class="page_fix">

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_START);?>

<?= $content; ?>

<!-- Перезвоните мне -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'callbackModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Оставьте заявку',
    'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => true,
    'showAttributeBody' => true,
    'eventCode' => 'perezvonite-mne',
    'successKey' => 'perezvonite-mne',
    'modalHtmlOptions' => [
        'class' => 'modal-general',
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
<!-- Бесплатный замер -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'orderFreeModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Бесплатный замер',
    // 'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => false,
    'showAttributeBody' => true,
    'eventCode' => 'besplatnyy-zamer',
    'successKey' => 'besplatnyy-zamer',
    'modalHtmlOptions' => [
        'class' => 'modal-standard',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Заявка на бесплатный замер',
    ],
    'view' => 'standard-feedback-widget'
]) ?>
<!-- Подбор жалюзи -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'selectionModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Подобрать жалюзи',
    'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => false,
    'showAttributeBody' => true,
    'eventCode' => 'podobrat-zhalyuzi',
    'successKey' => 'podobrat-zhalyuzi',
    'modalHtmlOptions' => [
        'class' => 'modal-general',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Заявка на подбор жалюзи',
    ],
]) ?>
<!-- Записаться на замер -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'recordingOnModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Записаться на замер',
    // 'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => false,
    'showAttributeBody' => false,
    'eventCode' => 'zapisatsya-na-zamer',
    'successKey' => 'zapisatsya-na-zamer',
    'modalHtmlOptions' => [
        'class' => 'modal-standard',
    ],
    'formOptions' => [ 
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Запись на замер',
    ],
    'view' => 'standard-feedback-widget'
]) ?>

<div id="messageModal" class="modal modal-my modal-my-xs fade" role="dialog">
    <div class="modal-dialog modal-dialog-msg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div data-dismiss="modal" class="modal-close modal-close-mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.5607 2.56066C20.1464 1.97487 20.1464 1.02513 19.5607 0.43934C18.9749 -0.146447 18.0251 -0.146447 17.4393 0.43934L10 7.87868L2.56066 0.43934C1.97487 -0.146447 1.02513 -0.146447 0.43934 0.43934C-0.146447 1.02513 -0.146447 1.97487 0.43934 2.56066L7.87868 10L0.43934 17.4393C-0.146447 18.0251 -0.146447 18.9749 0.43934 19.5607C1.02513 20.1464 1.97487 20.1464 2.56066 19.5607L10 12.1213L17.4393 19.5607C18.0251 20.1464 18.9749 20.1464 19.5607 19.5607C20.1464 18.9749 20.1464 18.0251 19.5607 17.4393L12.1213 10L19.5607 2.56066Z" fill="black"/></svg>
                </div>
                <div class="modal-my-heading">
                    <h3>Уведомление</h3>
                </div>
            </div>
            <div class="modal-body">
                Ваша заявка успешно отправлена.
            </div>
        </div>
    </div>
</div>

<div id="material-box-modal" class="modal fade modal-material" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div data-dismiss="modal" class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.5607 2.56066C20.1464 1.97487 20.1464 1.02513 19.5607 0.43934C18.9749 -0.146447 18.0251 -0.146447 17.4393 0.43934L10 7.87868L2.56066 0.43934C1.97487 -0.146447 1.02513 -0.146447 0.43934 0.43934C-0.146447 1.02513 -0.146447 1.97487 0.43934 2.56066L7.87868 10L0.43934 17.4393C-0.146447 18.0251 -0.146447 18.9749 0.43934 19.5607C1.02513 20.1464 1.97487 20.1464 2.56066 19.5607L10 12.1213L17.4393 19.5607C18.0251 20.1464 18.9749 20.1464 19.5607 19.5607C20.1464 18.9749 20.1464 18.0251 19.5607 17.4393L12.1213 10L19.5607 2.56066Z" fill="black"/></svg>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

<?php/* $fancybox = $this->widget(
    'gallery.extensions.fancybox3.AlFancybox', [
        'target' => '[data-fancybox]',
        'lang'   => 'ru',
        'config' => [
            'animationEffect' => "fade",
            'buttons' => [
                "zoom",
                "close",
            ]
        ],
    ]
);*/ ?>

<div class='notifications top-right' id="notifications"></div>
<div class="ajax-loading"></div>
<!-- container end -->

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_END);?>
</body>
</html>