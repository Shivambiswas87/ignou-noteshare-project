<?php
$flash = new \Plasticbrain\FlashMessages\FlashMessages();
$serviceUser = \services\User::getInstance();
if( !empty($_POST['user']) && !empty($_POST['pass']) && $serviceUser->login()){
    \utils\Url::redirect(\utils\Url::generateLink('my-notes', true));
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo \utils\Url::getAssetUrl('css/style.css');?>">

    <title>Online Notes Sharing</title>
</head>
<body>

<!-- Login Page -->
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-4 pb-1">Online Notes Sharing</h4>
                                </div>

                                <form method="post">
                                    <div class="text-center mb-5">
                                        <p>Please login to your account</p>

                                        <?php $flash->display();?>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Username Or Email</label>
                                        <input type="text" id="form2Example11" name="user" class="form-control" placeholder="Username or email address"/>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Password</label>
                                        <input type="password" id="form2Example22" name="pass" class="form-control" />

                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                                        <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 mr-3 me-2">Don't have an account?</p>
                                        <a class="btn btn-outline-danger" href="<?php echo \utils\Url::generateLink('signup');?>"> Create new</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">This is more than just a Project</h4>
                                <p class="small mb-0">This website is aim to help Ignou students With their notes. Where each student
                                is able to Upload, Download any notes they want.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Page -->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>