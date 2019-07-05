<?php
/** @var $content string */

/** @var \Common\base\View $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&amp;subset=cyrillic,cyrillic-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css" rel="stylesheet">
    <title>Classified</title>
</head>
<body>
<header class="shadow p-3">
    <div class="d-flex justify-content-between align-items-center container">
        <a href="/" class="main-logo">
            <img src="../img/logo.png" alt="logotype marketplace">
        </a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
        </form>
        <nav class="main-nav">
            <a href="/login" class="btn btn-info main-nav-link mr-4">Log In</a>
            <a href="/ads/create" class="btn btn-success btn-lg">Create new ad</a>
        </nav>
    </div>
</header>

<?php echo $content; ?>

<footer class="border-top pt-4 mt-5 main-footer">
    <div class="container d-flex justify-content-around">
        <ul class="list-unstyled w-25">
            <li class="mb-3"><a href="#" class="text-dark">About us</a></li>
            <li class="mb-3"><a href="#" class="text-dark">Private policy &amp; User agreement</a></li>
            <li class="mb-3"><a href="#" class="text-dark">Careers</a></li>
        </ul>
        <ul class="list-unstyled 25">
            <li class="mb-3"><a href="#" class="text-dark">Facebook</a></li>
            <li class="mb-3"><a href="#" class="text-dark">Twitter</a></li>
            <li class="mb-3"><a href="#" class="text-dark">Instagram</a></li>
        </ul>
    </div>
</footer>
<script src="../js/jquery.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<script src="../js/main.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
</body>
</html>