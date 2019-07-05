<?php

namespace ClientModels\repositories;

use ClientModels\models\Ad;
use ClientModels\models\Category;
use ClientModels\models\City;
use ClientModels\models\Photo;
use ClientModels\models\User;
use ClientModels\services\ErrorRecord;
use Common\base\Request;
use Common\exceptions\NotFoundHttpException;
use Common\repositories\Repository;

class AdRepository extends Repository
{

    /**
     * @return Ad[]
     */
    public function findAdsById(): array
    {
        $pdoStatement = $this->getPdo()->prepare('SELECT * FROM "ads" ORDER BY updated_time DESC LIMIT 10');
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Ad');
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return Ad
     *
     * @throws NotFoundHttpException
     */
    public function findAdById(int $id): Ad
    {
        $sqlRequest = 'SELECT * FROM ads WHERE id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Ad');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof Ad) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * @param int $id
     *
     * @return array|Photo
     *
     * @throws NotFoundHttpException
     */
    public function findPhotosByAdId(int $id)
    {
        $sqlRequest = 'SELECT name FROM photos LEFT JOIN ads ON photos.ad_id = ads.id WHERE ad_id = :id AND is_main = false';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Photo');
        $pdoStatement->execute(['id' => $id]);

        return $pdoStatement->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return Category
     *
     * @throws NotFoundHttpException
     */
    public function findCategoryById(int $id): Category
    {
        $sqlRequest = 'SELECT name FROM categories LEFT JOIN ads ON ads.category_id = categories.id WHERE ads.id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Category');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof Category) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * @param int $id
     *
     * @return User
     *
     * @throws NotFoundHttpException
     */
    public function findUserById(int $id): User
    {
        $sqlRequest = 'SELECT first_name FROM users LEFT JOIN ads ON ads.user_id = users.id WHERE ads.id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\User');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof User) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * @param int $id
     *
     * @return City
     *
     * @throws NotFoundHttpException
     */
    public function findCityById(int $id): City
    {
        $sqlRequest = 'SELECT city FROM cities LEFT JOIN ads ON ads.city_id = cities.id WHERE ads.id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\City');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof City) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * @return array|Category
     *
     * @throws NotFoundHttpException
     */
    public function findAllCategoriesByAdsId()
    {
        $sqlRequest = 'SELECT name FROM categories LEFT JOIN ads ON ads.category_id = categories.id WHERE ads.category_id = categories.id GROUP BY categories.name';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Category');
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }

    /**
     * @return array|Category
     *
     * @throws NotFoundHttpException
     */
    public function findParentCategoriesId()
    {
        $sqlRequest = 'SELECT id FROM categories GROUP BY id, parent_id HAVING parent_id = 1';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Category');
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return array|Category
     *
     * @throws NotFoundHttpException
     */
    public function findCategoriesByIdAndParentId(int $id)
    {
        $sqlRequest = 'SELECT * FROM categories GROUP BY id, parent_id HAVING id = :id AND parent_id = 1 OR parent_id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Category');
        $pdoStatement->execute(['id' => $id]);

        return $pdoStatement->fetchAll();
    }

    /**
     * @return array|City
     *
     * @throws NotFoundHttpException
     */
    public function findAllCities()
    {
        $sqlRequest = 'SELECT city FROM cities';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\City');
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }

    /**
     * @param string $category
     * @param int $minPrice
     * @param int $maxPrice
     * @param string $currency
     *
     * @return array|Ad
     *
     * @throws NotFoundHttpException
     */
    public function findAllFilteredAds(string $category, int $minPrice, int $maxPrice, string $currency)
    {
        $sqlRequest = 'SELECT ads.* FROM ads LEFT JOIN categories c ON ads.category_id = c.id 
                       WHERE c.name = :category AND 
                             (ads.price BETWEEN :minPrice AND :maxPrice) AND 
                             ads.currency = :currency';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Ad');
        $pdoStatement->execute([
            'category' => $category,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'currency' => $currency]);

        return $pdoStatement->fetchAll();
    }

    /**
     * @return array|Ad
     *
     * @throws NotFoundHttpException
     */
    public function findAllCurrenciesByAdsId()
    {
        $sqlRequest = 'SELECT currency FROM ads GROUP BY currency';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Ad');
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }


    /**
     * @param Ad $ad
     *
     * @throws NotFoundHttpException
     */
    public function insertAd(Ad $ad)
    {
        $sqlRequest = 'INSERT INTO "ads" ("category_id", "city_id", "created_time", "currency", "description", "is_deleted",
                                          "main_photo", "price", "reason_id", "status_id", "title", "updated_time", "user_id")
                       VALUES (' . $ad->category_id . ', ' . $ad->city_id . ', EXTRACT(epoch FROM now()), \'' . $ad->currency . '\', \'' .
                               $ad->description . '\', false, \'' . $ad->main_photo . '\', ' . $ad->price . ', null, 1, \'' . $ad->title . '\', null, ' . $ad->user_id . ')';

        if (!$this->getPdo()->exec($sqlRequest)) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        };
    }
}