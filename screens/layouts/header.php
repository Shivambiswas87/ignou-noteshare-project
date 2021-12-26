<?php
$serviceUser = \services\User::getInstance();
$isLoggedIn = $serviceUser->isLoggedIn();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Index</title>
</head>
<body>
<div class="my-background">

    <header>
        <!-- Navbar -->
        <!--====== NAVBAR ONE PART START ======-->
        <section class="navbar-area navbar-one pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo \utils\Url::generateLink();?>">
                                <!--              <img src="" alt="Logo" />-->
                                <p class="font-weight-bold text-white">NoteShare</p>
                            </a>

                            <!--            Navbar Menu Items -->

                            <div class=" navbar-collapse " id="navbarOne">

                            </div>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <ul>
                                    <?php if(!$isLoggedIn){?>
                                    <li>
                                        <a class="btn primary-btn-outline" href="<?php echo \utils\Url::generateLink('login');?>">Login</a>
                                    </li>
                                    <li>
                                        <a class="btn primary-btn" href="<?php echo \utils\Url::generateLink('signup');?>">Sign Up</a>
                                    </li>
                                    <?php }else{?>
                                        <li>
                                            <a class="btn primary-btn-outline"
                                               href="<?php echo \utils\Url::generateLink('my-notes', true);?>">My account</a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn" href="<?php echo \utils\Url::generateLink('logout', true);?>">Log Out</a>
                                        </li>

                                    <?php }?>

                                </ul>
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <!--====== NAVBAR ONE PART ENDS ======-->
    </header>
