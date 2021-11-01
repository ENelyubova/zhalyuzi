<?php $this->beginContent('//layouts/yupe'); ?>

<body class="page-404">

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_START);?>

<div class="wrapper">
    <div class="wrap1 wrapper-error fl fl-d-c">
        <?php $this->renderPartial('//layouts/_header'); ?>
    	<?= $this->decodeWidgets($content); ?>
    	<?php $this->renderPartial('//layouts/_footer-404'); ?>
    </div>
</div>

<?php $this->endContent(); ?>