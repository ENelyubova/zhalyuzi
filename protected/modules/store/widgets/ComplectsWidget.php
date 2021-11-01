<?php

Yii::import('application.modules.store.models.StoreCategory');

/**
 * Class ComplectsWidget
 *
 * <pre>
 * <?php
 *    $this->widget('application.modules.store.widgets.ComplectsWidget');
 * ?>
 * </pre>
 */
class ComplectsWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'complect-view';

    /**
     * @throws CException
     */
    public function run()
    {
        $categories = StoreCategory::model()->findAllByAttributes(['in_view_complect' => 1]);

        $this->render($this->view, [
            'categories' => $categories
        ]);
    }
}
