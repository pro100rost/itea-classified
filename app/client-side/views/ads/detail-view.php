<?php
/**
 * @var $ad \ClientModels\models\Ad
 */
?>
<section class="container mt-5 w-50 m0-auto mb-5">

    <div class="swiper-container detail-view-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="../img/posts-img/<?php echo $ad->main_photo; ?>" alt="main photo"></div>
            <?php foreach ($ad->photos as $photo) { ?>
                <div class="swiper-slide"><img src="../img/posts-img/<?php echo $photo->name; ?>" alt="post photo"></div>
            <?php } ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <h2 class="h5 mb-3 mt-3 font-weight-bold"><?php echo $ad->title; ?></h2>
    <p><?php echo $ad->description; ?></p>
    <ul class="list-unstyled d-flex flex-wrap mt-3">
        <li class="w-50 pr-2 mb-2"><span class="font-weight-bold">Category: </span><?php echo $ad->category->name; ?>
        </li>
        <li class="w-50 pr-2 mb-2"><span class="font-weight-bold">Price: </span><?php echo $ad->price; ?></li>
        <li class="w-50 pr-2 mb-2"><span class="font-weight-bold">Name: </span><?php echo $ad->user->first_name; ?></li>
        <li class="w-50 pr-2 mb-2"><span class="font-weight-bold">City: </span><?php echo $ad->city->city; ?></li>
    </ul>

    <form action="#" method="POST">
        <div class="form-group mt-5 text-center d-flex flex-column">
            <label for="user-chat" class="font-weight-bold ">Write me!</label>
            <textarea class="form-control mt-2 mb-2" id="user-chat" placeholder="Enter your message"></textarea>
            <button type="submit" class="btn btn-info align-self-end">Send</button>
        </div>
    </form>
</section>