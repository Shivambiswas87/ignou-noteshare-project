<!--    Hero Section -->
    <div class="">
        <!--Section: Content-->
        <section>
            <!-- Jumbotron -->
            <div id="intro" class=" p-5 text-center shadow-5 rounded-5 mb-2">
                <h1 class="mb-2 h2">Have Notes?</h1>
                <h1 class="mb-2 h2">Share with your friend</h1>
                <h1 class="mb-4 h2">Get better Grades</h1>
                <p class="mb-3">Best & free guide of responsive web design</p>
                <a class="btn my-primary-btn m-2 text-white" href="<?php echo \utils\Url::generateLink('upload-note', true);?>" role="button">Upload Notes</a>
                <a class="btn my-secondary-btn m-2" href="<?php echo \utils\Url::generateLink('view-notes');?>">View Notes</a>
            </div>
            <!-- Jumbotron -->
        </section>

    </div>


<!--    Search bar-->

    <div class="container">
        <br/>

        <div class="row">
            <div class="col-12">
                    <div class="card-body row no-gutters align-items-center">

                        <!--end of col-->
                        <div class="col">

                            <input class="form-control form-control-lg" type="search" placeholder="Subject's Name Or Subject Code">
                        </div>
                        <!--end of col-->
                        <div class="col-auto ">
                            <button class="btn btn-lg my-primary-btn text-white" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                    </div>

            </div>
                        <!--end of col-->
        </div>
    </div>
    <div class="container ">
    <h2 class="text-center mt-5 mb-5">Be a part of shared learning</h2>
    </div>
    <!--====== CARD PART START ======-->
    <section class="card-area pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-card card-style-one">
                        <div class="card-image">
                            <img width="175" height="150" src="<?php echo \utils\Url::getAssetUrl('images/banner_image_1.svg');?>" alt="Image" />
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="javascript:void(0)">Share Notes</a>
                            </h4>
                            <p class="text">
                                Share your previous year notes to friends. Share Love. Care.
                            </p>
                        </div>
                    </div>
                    <!-- single-card -->
                </div>
                <!-- col -->
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-card card-style-one">
                        <div class="card-image">
                            <img width="175" height="150" src="<?php echo \utils\Url::getAssetUrl('images/banner_image_2.svg');?>" alt="Image" />
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="javascript:void(0)">Find Notes</a>
                            </h4>
                            <p class="text">
                                Find previous and current years notes that shared by one of your senior or friends
                            </p>
                        </div>
                    </div>
                    <!-- single-card -->
                </div>
                <!-- col -->
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-card card-style-one">
                        <div class="card-image">
                            <img width="175" height="150" src="<?php echo \utils\Url::getAssetUrl('images/banner_image_1.svg');?>" alt="Image" />
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="<?php echo \utils\Url::generateLink('upload-note', true);?>">Get Better Grades</a>
                            </h4>
                            <p class="text">
                                Study notes and get better grades together. Grow Together. Leave Good footprints.
                            </p>
                        </div>
                    </div>
                    <!-- single-card -->
                </div>
                <!-- col -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== CARD PART ENDS ======-->

<!--Footer-->
<!-- End of .container -->
<!--Footer End-->
