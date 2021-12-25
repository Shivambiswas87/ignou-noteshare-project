    <!--    View Notes -->
    <div class="container-fluid" style="height: 150px">
        <div class="container text-center pt-4">
            <h2 class="display-5">View Notes</h2>
            <p class="lead ">View and download all the notes shared by your friends</p>
            <hr class="my-4 bg-light" />
        </div>
    </div>

    <!--    Upload text end-->

<!-- Notes Cards-->



    <!-- Search -->

    <div class="container">
        <br/>

        <div class="row">
            <div class="col-12">
                <div class="card-body row no-gutters align-items-center">

                    <!--end of col-->
                    <div class="col">

                        <input class="form-control form-control-lg" type="search" placeholder="Search Course Code">
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


    <!--Main Cards Grid-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center">
                <h4 class="mb-5"><strong>Latest Upload</strong></h4>

                <?php for($i = 0; $i < 2; $i++){?>
                <div class="row">
                    <?php for($j = 0; $j < 2; $j++ ){?>
                    <div class="col-lg-6 mb-4">
                        <div class="card "style="background-color: #fffefa">
                            <div class="bg-image hover-overlay ripple " data-mdb-ripple-color="light">
                                <!-- Should show the pdf front page-->
                                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body" >
                                <h5 class="card-title">Course Code</h5>
                                <p class="card-text">
                                    Question.
                                </p>
                                <div class="row pt-3 align-items-baseline">
                                    <div class="col-3">
                                <h6>Question No</h6>
                                    </div>
                                    <div class="col-6">
                                    <a href="<?php echo \utils\Url::generateLink('read-note');?>" class="btn my-primary-btn text-white">Read</a>
                                    <a type="button" data-toggle="modal" data-target="#download" data-uid="1" class="btn my-secondary-btn">Download</a>
                                    </div>
                                    <div class="col-3">
                                     <h6>Question Year</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                </div>
                <?php }?>

            </section>

            <!--Section: Content-->

            <!-- Pagination -->
            <nav class="my-4 " aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
    <!--Main layout-->


<!--    Modal Download -->

    <div id="download" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Download</h4>
                </div>
                <div class="modal-body">
                   <p>Do yo want to download this subject?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="up" class="btn my-primary-btn text-white" data-dismiss="modal">Yes, Download</button>
                    <button type="button" class="btn btn-default my-secondary-btn" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>