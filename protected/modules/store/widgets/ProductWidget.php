<?php

Yii::import('application.modules.store.models.*');

class ProductWidget extends yupe\widgets\YWidget
{   
    public $category_id;
    public $is_popular;
    public $limit;
    public $order = 't.position ASC';
    
    public $view = 'view';
    protected $products;

    public function run()
    {
        $criteria = new CDbCriteria();

        if($this->limit){
            $criteria->limit = $this->limit;
        }
        
        $criteria->order = $this->order;
        
        $criteria->compare('t.is_popular', $this->is_popular);
        $criteria->compare('t.category_id', $this->category_id);
        $this->products = Product::model()->published()->findAll($criteria);
        
        $this->render($this->view, [
            'products' => $this->products
        ]);
    }
}