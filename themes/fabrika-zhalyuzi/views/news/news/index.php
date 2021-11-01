<?php
$this->title = Yii::t('NewsModule.news', 'News');
$this->breadcrumbs = [Yii::t('NewsModule.news', 'News')];
?>

<div class="page-news">
	<div class="content-site">
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
	            'links' => $this->breadcrumbs,
	    ]); ?>
		<h1 class="heading heading-page heading-pb">Новости</h1>
	</div>

	<div class="news-control">
		<div class="content-site">
		</div>
	</div>

	<div class="news-panel bg-body pb">
		<div class="content-site">
			<?php $this->widget('bootstrap.widgets.TbListView', [
				'id'=> 'news-box',
			    'dataProvider' => $dataProvider,
		        'itemView' => '_item',
		        'summaryText' => '',
		        'template'=>'{items} {pager}',
		        'itemsCssClass' => 'news-block',
			    'htmlOptions' => [
			        // "class" => ""
			    ],
			    'pagerCssClass' => 'pagination-box',
			    'pager' => [
			    	'header' => '',
			    	'nextPageLabel'=> false,
                    'prevPageLabel'=> false,
                    'lastPageLabel'=> false,
                    'firstPageLabel'=> false,
					'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
				    'htmlOptions' => [
				    	'class' => 'pagination pagination-panel'
				    ]
			    ]
			]); ?>
		</div>
	</div>
</div>

