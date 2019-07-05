<?php
/**
 * @var $login \ClientModels\models\forms\LoginUser
 * @var $register \ClientModels\models\forms\RegisterUser
 */
?>
<section class="container mt-5">
    <ul class="nav nav-pills mb-3 m0-auto w-50 d-flex justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active font-weight-bold" id="pills-home-tab" data-toggle="pill" href="#pills-login"
               role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" id="pills-contact-tab" data-toggle="pill" href="#pills-register"
               role="tab" aria-controls="pills-login" aria-selected="false">Register</a>
        </li>
    </ul>

    <div class="tab-content m0-auto w-50" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-home-tab">
            <form action="/login" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="loginEmail" class="form-control mt-2" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="loginPassword" class="form-control mt-2" id="exampleInputPassword1"
                           placeholder="Enter your password">
                </div>
                <div class="w-50 m0-auto text-center">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form action="/registration" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="registerInputName">Your First Name</label>
                        <input name="registerFirstName" type="text" class="form-control mt-2" id="registerInputName"
                               placeholder="Enter first name" value="<?php $register->first_name ?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="registerInputSurname">Your Last Name</label>
                        <input name="registerLastName" type="text" class="form-control mt-2" id="registerInputSurname"
                               placeholder="Enter last name" value="<?php $register->last_name ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="registerInputEmail">Your email address</label>
                    <input name="registerEmail" type="email" class="form-control mt-2" id="registerInputEmail"
                           placeholder="Enter your email address" value="<?php $register->email ?>"/>
                </div>
                <div class="form-group">
                    <label for="registerInputMobile">Your phone mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend mt-2">
                            <span class="input-group-text" id="inputGroupPrepend">+380</span>
                        </div>
                        <input name="registerMobile" type="text" class="form-control mt-2" id="registerInputMobile"
                               placeholder="Enter your mobile number" value="<?php $register->mobile ?>"/>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="registerInputPassword">Your password</label>
                        <input name="registerPassword" type="password" class="form-control mt-2" id="registerInputPassword"
                               placeholder="Enter your password"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="registerInputPasswordAgain">Confirm Your Password</label>
                        <input name="registerPasswordConfirmation" type="password" class="form-control mt-2" id="registerInputPasswordAgain"
                               placeholder="Enter your password again"/>
                    </div>
                </div>
                <div class="w-50 m0-auto text-center">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>