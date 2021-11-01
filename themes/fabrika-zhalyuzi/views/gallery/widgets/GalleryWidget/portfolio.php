<?php if ($dataProvider->itemCount): ?>
    <?php
        $this->widget(
        'application.components.FtListView', [
        'id' => '',
        'itemView' => '_image',
        'dataProvider' => $dataProvider,
        'itemsCssClass' => 'portfolioSlider slick-slider',
        'template' => '{items}{pager}', 
        // 'htmlOptions' => [
        //     "class" => "panel panel-default"
        // ],
        // 'pagerCssClass' => 'pagination-box',
        // 'emptyText' => '',
        // 'emptyTagName' => 'div',
        'pager' => [
            'class' => 'application.components.ShowMorePager',
            'buttonText' => 'Больше работ',
            'wrapTag' => 'div',
            'htmlOptions' => [
                'class' => 'btn btn-link'
            ],
            'wrapOptions' => [
                'class' => 'content'
            ],
        ]
    ]); ?>
<?php endif; ?>