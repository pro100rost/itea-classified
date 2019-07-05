<?php print_r($_SESSION); ?>
<section class="container mt-5">
    <ul class="nav nav-pills mb-3 m0-auto w-50 d-flex justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active font-weight-bold" id="pills-home-tab" data-toggle="pill" href="#pills-posts"
               role="tab" aria-controls="pills-login" aria-selected="true">My ads</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" id="pills-contact-tab" data-toggle="pill" href="#pills-messages"
               role="tab" aria-controls="pills-login" aria-selected="false">Messages</a>
				</li>
				<li class="nav-item">
					<a class="nav-link font-weight-bold" id="pills-contact-tab" data-toggle="pill" href="#pills-settings"
						 role="tab" aria-controls="pills-login" aria-selected="false">Settings</a>
			</li>
    </ul>

    <div class="tab-content m0-auto w-75" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-home-tab">
            <a href="#" class="d-flex border-bottom p-3">
							<div class="img-small-wrapper mr-3"><img src="../../web/img/posts-img/car.jpg" alt="user post img"></div>
							<p class="account-ad-text w-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus soluta, minima facere optio sequi rem quasi tempora facilis ducimus nemo provident obcaecati modi, et libero temporibus? Voluptatibus nam quos natus.</p>
						  <button class="btn btn-info">Free push-up</button>
						</a>
						<a href="#" class="d-flex border-bottom p-3">
							<div class="img-small-wrapper mr-3"><img src="../../web/img/posts-img/car.jpg" alt="user post img"></div>
							<p class="w-75 account-ad-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus soluta, minima facere optio sequi rem quasi tempora facilis ducimus nemo provident obcaecati modi, et libero temporibus? Voluptatibus nam quos natus.</p>
						</a>

        </div>

        <div class="tab-pane fade" id="pills-messages" role="tabpanel" aria-labelledby="pills-contact-tab">
					<a href="/message" class="d-flex border-bottom p-3">
						<div class="img-small-wrapper mr-3"><img src="../../web/img/posts-img/car.jpg" alt="user post img"></div>
						<div class="w-75">
						<h4 class="h4">Title of the ad</h4>
						<p class="text-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus soluta, minima facere optio sequi rem quasi tempora facilis ducimus nemo provident obcaecati modi, et libero temporibus? Voluptatibus nam quos natus.</p>
					</div>
				</a>
        </div>

        <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Change Email address</label>
                    <input type="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter new email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Enter new Password</label>
                    <input type="password" class="form-control mt-2" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm your new Password" value=""/>
                </div>
                <div class="w-50 m0-auto text-center">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>

        </div>
    </div>
</section>