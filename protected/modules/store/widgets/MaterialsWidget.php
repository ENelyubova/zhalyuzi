<?php

Yii::import('application.modules.store.models.StoreCategory');

/**
 * Class MaterialsWidget
 *
 * <pre>
 * <?php
 *    $this->widget('application.modules.store.widgets.MaterialsWidget');
 * ?>
 * </pre>
 */
class MaterialsWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'material-view';

    /**
     * @throws CException
     */
    public function run()
    {
        $categories = StoreCategory::model()->findAllByAttributes(['in_view_materials' => 1]);

        $this->render($this->view, [
            'categories' => $categories
        ]);
    }
}
