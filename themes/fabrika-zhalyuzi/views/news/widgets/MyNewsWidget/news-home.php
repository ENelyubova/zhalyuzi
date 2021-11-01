<div class="news pt pb">
    <div class="content-site">
        <div class="heading-block fl fl-w fl-ai-c">
            <div class="news-nav">
                <div class="arrows"></div>
            </div>
            <h2 class="news-heading heading"><?= Yii::t("NewsModule.news", "Press center"); ?></h2>
            <a href="/news" class="news-link btn btn-link"><?= Yii::t("NewsModule.news", "All news"); ?></a>
        </div>
        <div class="news-panel">
            <div class="news-box news-block fl fl-w">
                <?php foreach ($models as $key => $model): ?>
                    <?php Yii::app()->controller->renderPartial('//news/news/_item', ['data' => $model]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>