<?php
/**
 * @var $categories \ClientModels\models\Category
 * @var $category \ClientModels\models\Category
 * @var $cities \ClientModels\models\City
 * @var $city \ClientModels\models\City
 */
?>
<section class="container mt-5 w-50 m0-auto mb-5">
    <h2 class="h2 text-center">Create your advertisement</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="title" class="font-weight-bold">Title</label>
            <input name="title" type="text" class="form-control mt-2" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="description" class="font-weight-bold">Description</label>
            <textarea name="description" class="form-control mt-2" id="description" placeholder="Enter description"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="categoriesTree" class="font-weight-bold d-block mb-2">Select category</label>
        <select name="categories" id="categoriesTree"  style="width: 300px;">
                <?php foreach ($categories as $allCategories) { ?>
                    <?php foreach ($allCategories as $category) { ?>
                        <option value=""><?php echo $category->name; ?></option>
                    <?php } ?>
                <?php } ?>
        </select>
        </div>
<!--        <div class="form-group">-->
<!--            <label class="font-weight-bold">Param1-->
<!--            <input type="text" class="form-control mt-2" placeholder="Text param"></label>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label class="font-weight-bold">Param2-->
<!--                <input type="text" class="form-control mt-2" placeholder="Text param"></label>-->
<!--        </div>-->
        <div class="form-group">
            <label class="font-weight-bold">Price, currency
                <div class="d-flex mt-2">
                <input name="price" type="text" class="form-control mr-3" placeholder="Enter price" id="price-input">
                <select name="currency" class="form-control w-50">
                    <option value="">UAH</option>
                    <option value="">USD</option>
                    <option value="">EUR</option>
                </select>
                </div>
            </label>
            <label><input type="checkbox" class="mr-2 ml-2" id="price-negotiable">Договорная</label>
        </div>
        <div class="form-group mt-2">
            <label for="photo" class="font-weight-bold">Add some photos</label>
            <input name="files[]" type="file" multiple class="form-control-file mt-2" id="photo">
        </div>
        <div class="form-group">
            <label for="city" class="font-weight-bold d-block mb-2">Your city</label>
            <select name="city" id="city"  style="width: 150px;">
                <?php foreach ($cities as $city) { ?>
                    <option value=""><?php echo $city->city; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Phone number
                <input type="tel" class="form-control mt-2" placeholder="Enter your phone number"></label>
        </div>
        <div class="text-center w-50 m0-auto">
        <button type="submit" class="btn btn-success btn-lg">Create</button></div>
    </form>
</section>