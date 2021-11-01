<?php
Yii::import('bootstrap.widgets.TbListView');
/**
 * MyListView
 */
class MyListView extends TbListView
{
    public $pager = ['class' => 'booster.widgets.TbPager'];
    public $countProduct = '';

    public $sorterDropDown = [];
    public $sorterClassUl = '';
    public $sorterClassLink = 'sort-box__link';
    public function renderControls()

    {

        echo '
            <div class="but-menu-filter">
                <a class="but but-green" href="#"><i class="fa fa-filter" aria-hidden="true"></i><span>Фильтры</span>
                </a>
            </div>
            <div class="catalog-controls">
                <div class="catalog-controls__sort"> ';
                    $this->renderSorter();
        echo '
            </div>
                <div class="catalog-controls__res">
                    <div class="template-product">
                        <div data-view="_item" class="template-product__item template-product__grid '.($this->controller->storeItem == "_item" ? "active" : "" ).'">'. file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() . '/images/store/product-grid.svg') .'
                        </div>
                        <div data-view="_item-list" class="template-product__item template-product__list ' . ($this->controller->storeItem == "_item-list" ? "active" : "" ).'">' . file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() . '/images/store/product-list.svg') .'
                        </div>
                    </div>
                </div>
            </div>';
    }
public function renderCountValue()
    {
        echo $this->countValue();
    }

    public function countValue(){


        if((int)$this->controller->storeCountPage > (int)$this->countProduct && (int)$this->countProduct != 0){
            $countPage = $this->countProduct;
        } else {
            $countPage = $this->controller->storeCountPage;
        }

        $valueH = '<div class="catalog-controls__label-pr-count">
            1-'.$countPage.' из '.$countPage.'</strong>
        </div>';

        return $valueH;
    }
    public function renderCountPage()
    {
        echo $this->countPage();
    }

    public function countPage()
    {
        // $pageList = [24,48,72];
        $pageList = [18,36,72];
        $pageL = "<div class='countItem-box'>
            <div class='countItem-box__header'>На странице </div>
            <div class='countItem-box__body countItem-wrapper'>";

        foreach ($pageList as $key => $data) {
            $pageL .= "<div class='countItem-wrapper__link " . (($data == $this->controller->storeCountPage) ? 'active' : '') . "' data-count='{$data}'>{$data}</div>";
        }
        $pageL .= "</div></div>";

        return $pageL;

    }


    /**
     * Формирование структуры сортировки по названию, цене
     */
   public function renderSorter()
    {
        $id = $this->htmlOptions['id'];
        $defaultSort = Yii::app()->getModule('store')->getDefaultSort('');
        $defaultSort = trim(preg_replace('/[^a-zA-Z](DESC|ASC|)/', ' ', $defaultSort));

        echo CHtml::openTag('div', ['class'=>$this->sorterCssClass])."\n";
            echo $this->sorterHeader===null ? Yii::t('zii','Sort by: ') : $this->sorterHeader;
            echo CHtml::openTag('ul', ['class' => $this->sorterClassUl])."\n";
            foreach ($this->sorterDropDown as $key => $item) {
                if($defaultSort == trim(preg_replace('/[^a-zA-Z](desc|asc|)/', ' ', $key))){
                    echo CHtml::openTag('li', ['class' => $this->sorterClassLink . ' active', 'data-href' => '?sort='.$key]);
                } else {
                    $params = $_GET;
                    if (isset($params['path'])) {
                        unset($params['path']);
                    }
                    $params['sort'] = $key;
                    echo CHtml::openTag('li', ['class' => $this->sorterClassLink, 'data-href' => '?'.http_build_query($params)]);
                }
                    echo $item;
                echo CHtml::closeTag('li');
            }
            echo CHtml::closeTag('ul');
        echo CHtml::closeTag('div');


    }

    // public function renderSorter()
    // {
    //     if($this->dataProvider->getItemCount()<=0 || !$this->enableSorting || empty($this->sortableAttributes))
    //         return;
    //     echo CHtml::openTag('div',['class'=>$this->sorterCssClass])."\n";
    //     echo $this->sorterHeader===null ? Yii::t('zii','Sort by: ') : $this->sorterHeader;
    //     echo "<ul>\n";
    //     $sort=$this->dataProvider->getSort();
    //     foreach($this->sortableAttributes as $name=>$label)
    //     {
    //         echo "<li>";
    //         if(is_integer($name))
    //             echo $sort->link($label);
    //         else
    //             echo $sort->link($name,$label);
    //         echo "</li>\n";
    //     }
    //     echo "</ul>";
    //     echo $this->sorterFooter;
    //     echo CHtml::closeTag('div');
    // }
    public function renderSummary()
    {
        if(($count=$this->dataProvider->getItemCount())<=0)
            return;

        echo CHtml::openTag($this->summaryTagName, ['class'=>$this->summaryCssClass]);
        if($this->enablePagination)
        {
            $pagination=$this->dataProvider->getPagination();
            $total=$this->dataProvider->getTotalItemCount();
            $start=$pagination->currentPage*$pagination->pageSize+1;
            $end=$start+$count-1;
            if($end>$total)
            {
                $end=$total;
                $start=$end-$count+1;
            }
            if(($summaryText=$this->summaryText)===null)
                $summaryText=Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.',$total);
            echo strtr($summaryText,[
                '{start}'=>$start,
                '{end}'=>$end,
                '{count}'=>$total,
                '{page}'=>$pagination->currentPage+1,
                '{pages}'=>$pagination->pageCount,
            ]);
        }
        else
        {
            if(($summaryText=$this->summaryText)===null)
                $summaryText=Yii::t('zii','Total 1 result.|Total {count} results.',$count);
            echo strtr($summaryText,[
                '{count}'=>$count,
                '{start}'=>1,
                '{end}'=>$count,
                '{page}'=>1,
                '{pages}'=>1,
            ]);
        }
        echo CHtml::closeTag($this->summaryTagName);
    }

}
