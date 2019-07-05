<?php

namespace ClientModels\models;

/**
 * @property int $category_id
 * @property int $city_id
 * @property int $created_time
 * @property string $currency
 * @property string $description
 * @property int $id
 * @property bool $is_deleted
 * @property string $main_photo
 * @property int $price
 * @property int $reason_id
 * @property int $status_id
 * @property string $title
 * @property int $updated_time
 * @property int $user_id
 *
 */
class Ad
{
    public $category_id;
    public $city_id;
    public $created_time;
    public $currency;
    public $description;
    public $id;
    public $is_deleted;
    public $main_photo;
    public $price;
    public $reason_id;
    public $status_id;
    public $title;
    public $updated_time;
    public $user_id;
    /** @var Category */
    public $category;
    /** @var Category[] */
    public $categories;
    /** @var User */
    public $user;
    /** @var City */
    public $city;
    /** @var Photo[] */
    public $photos;
    /** @var Ad[] */
    public $prices;
    /** @var Ad[] */
    public $currencies;
}