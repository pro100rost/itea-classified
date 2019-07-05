<?php
/**
 * @var $filter \ClientModels\models\forms\AdFilter
 * @var $ads \ClientModels\models\Ad
 * @var $ad \ClientModels\models\Ad
 */
?>
<section class="container mt-5 pb-3 border-bottom">
    <h2 class="h4 mb-3">Filters</h2>
    <form action="" method="GET" class="d-flex align-items-center">
        <select name="filterCategory" id="categoriesTree" style="width: 300px;">
            <?php foreach ($filter->categories as $category) { ?>
                <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
            <?php } ?>
        </select>
        <input name="filterMinPrice" type="text" class="form-control input-price ml-3 mr-2" placeholder="Price from">
        <input name="filterMaxPrice" type="text" class="form-control input-price mr-2" placeholder="Price to">
        <select name="filterCurrency" id="currency" style="width: 75px;">
            <?php foreach ($filter->currencies as $currency) { ?>
                <option value="<?php echo $currency->currency; ?>"><?php echo $currency->currency; ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-success ml-2">Search</button>
    </form>
</section>

<section class="container pt-4">
    <h2 class="h2 mb-4">New ads</h2>
    <div class="listing d-flex flex-wrap">
        <?php foreach ($ads as $ad) { ?>
            <a href="/ads/<?php echo $ad->id; ?>" class="card mb-3 mr-2">
                <div class="h-50">
                    <img src="img/posts-img/<?php echo $ad->main_photo; ?>" class="card-img-top" alt="user post"></div>
                <div class="card-body p-2 mt-3">
                    <h5 class="card-title mb-2"><?php echo $ad->title; ?></h5>
                    <p class="card-text description"><?php echo $ad->description; ?></p>
                    <p class="card-text font-weight-bold mt-2"><?php echo $ad->price . ' ' . $ad->currency; ?></p>
                </div>
            </a>
        <?php } ?>
    </div>
</section>