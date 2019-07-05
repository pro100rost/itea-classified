<?php

namespace ClientControllers;

use ClientModels\models\forms\AdFilter;
use ClientModels\repositories\AdRepository;
use ClientModels\services\AuthService;
use Common\base\Controller;
use Common\base\Request;

class AdController extends Controller
{
    private $repository;
    private $auth;
    private $filter;

    public function __construct(string $side, Request $request)
    {
        parent::__construct($side, 'ad', $request);
        $this->repository = new AdRepository();
        $this->auth = new AuthService();
        $this->auth->isLogged() ? $this->setLayout('logged-layout') : $this->setLayout('main-layout');
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionIndex(): string
    {
        $this->filter = new AdFilter();
        $this->filter->category = $this->request->getGetParam('filterCategory');
        $this->filter->minPrice = $this->request->getGetParam('filterMinPrice');
        $this->filter->maxPrice = $this->request->getGetParam('filterMaxPrice');
        $this->filter->currency = $this->request->getGetParam('filterCurrency');
        $this->filter->categories = $this->repository->findAllCategoriesByAdsId();
        $this->filter->currencies = $this->repository->findAllCurrenciesByAdsId();
        $ads = $this->repository->findAdsById();

        if ($this->request->isGetParam('filterMinPrice') && $this->request->isGetParam('filterMaxPrice')) {
            $ads = $this->repository->findAllFilteredAds($this->filter->category, $this->filter->minPrice, $this->filter->maxPrice, $this->filter->currency);
        }

        return $this->render('index', [
            'ads' => $ads,
            'filter' => $this->filter,
        ]);
    }

    /**
     * @param $id
     *
     * @return string
     *
     * @throws \Common\exceptions\NotFoundHttpException
     * @throws \Throwable
     */
    public function actionView($id): string
    {
        $ad = $this->repository->findAdById($id);
        $ad->photos = $this->repository->findPhotosByAdId($id);
        $ad->category = $this->repository->findCategoryById($id);
        $ad->user = $this->repository->findUserById($id);
        $ad->city = $this->repository->findCityById($id);

        return $this->render('detail-view', [
            'ad' => $ad,
        ]);
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionCreate()
    {
        $ids = $this->repository->findParentCategoriesId();
        $categories = [];
        foreach ($ids as $id) {
            $categories[] = $this->repository->findCategoriesByIdAndParentId($id->id);
        }
        $cities = $this->repository->findAllCities();

        if ($this->request->isPost()) {
            // TODO: add create logic
        }

        return $this->render('create-ad', [
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }

    public function actionUpdate($id)
    {
        if ($this->request->isPost()) {
            // TODO: add update logic
        }
    }

    public function actionDeactivate($id)
    {
        if ($this->request->isPost()) {
            // TODO: add deactivate logic
        }
    }
}
