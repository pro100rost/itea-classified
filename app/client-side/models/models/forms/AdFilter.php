<?php

namespace ClientModels\models\forms;

use ClientModels\models\Ad;
use ClientModels\models\Category;

/**
 * @property string $category
 * @property int $maxPrice
 * @property int $minPrice
 * @property string $currency
 */
class AdFilter
{
    public $category;
    public $maxPrice;
    public $minPrice;
    public $currency;
    /** @var Category[] */
    public $categories;
    /** @var Ad[] */
    public $currencies;
}