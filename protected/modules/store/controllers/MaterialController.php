<?php
use yupe\components\controllers\FrontController;

/**
 * Class MaterialController
 */
class MaterialController extends FrontController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var StoreCategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var AttributeFilter
     */
    protected $attributeFilter;

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->productRepository = Yii::app()->getComponent('productRepository');
        $this->attributeFilter = Yii::app()->getComponent('attributesFilter');
        $this->categoryRepository = Yii::app()->getComponent('categoryRepository');
    }

    /**
     *
     */
    public function actionIndex()
    {
        $this->render(
            'index',
            [
                'dataProvider' => $this->categoryRepository->getAllDataProvider(),
            ]
        );
    }

    /**
     * @param $slug
     * @throws CHttpException
     */
    public function actionView($slug)
    {
        $category = $this->categoryRepository->getBySlug($slug);

        if (null === $category) {
            throw new CHttpException(404);
        }

        $typesSearchParam = $this->attributeFilter->getTypeAttributesForSearchFromQuery(Yii::app()->getRequest());

        $mainSearchParam = $this->attributeFilter->getMainAttributesForSearchFromQuery(
            Yii::app()->getRequest(),
            [
                AttributeFilter::MAIN_SEARCH_PARAM_CATEGORY => Yii::app()->getRequest()->getQuery('category',
                    [$category->id]),
            ]
        );

        if (!empty($mainSearchParam) || !empty($typesSearchParam)) {
            $data = $this->productRepository->getByFilter($mainSearchParam, $typesSearchParam);
        } else {
            $data = $this->productRepository->getListForCategory($category);
        }

        $this->render(
            'view',
            [
                'dataProvider' => $data,
                'category' => $category,
            ]
        );
    }
}