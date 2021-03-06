<?php
$serviceNote = \services\Note::getInstance();


$searchText = !empty($_GET['s'])?$_GET['s']:null;

$notes = $serviceNote->getNotes(null,$searchText);
$countNotes = $serviceNote->countNotes();


?>
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
        <form method="get" action="<?php echo \utils\Url::generateLink('view-notes');?>">
            <div class="row">
            <div class="col-12">
                <div class="card-body row no-gutters align-items-center">

                    <!--end of col-->
                    <div class="col">

                        <input class="form-control form-control-lg" type="search" placeholder="Search Course Code"
                               name="s" value="<?php echo empty($searchText)?'':$searchText;?>">
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
        </form>
    </div>


    <!--Main Cards Grid-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center">
                <h4 class="mb-5"><strong>Latest Upload</strong></h4>

                <div class="row">

                <?php
                $noteNo = 0;
                foreach($notes as $note){?>

                    <div class="col-lg-6 mb-4">

                        <div class="card "style="background-color: #fffefa">


                            <iframe class="embed-responsive-item"
                                    src="https://docs.google.com/gview?url=<?php echo \utils\Url::generateLink('uploads/notes/' . $note['file']);?>&embedded=true"
                                    style="width:100%; height:300px;" frameborder="0">

                            </iframe>


                            <div class="card-body" >
                                <h5 class="card-title">
                                    Course Code :
                                    <?php echo $note['course_code'];?></h5>
                                <p class="card-text">
                                    <?php echo $note['question'];?>
                                </p>
                                <div class="row pt-3 align-items-baseline">
                                    <div class="col-3">
                                        <h6>Question No : <?php echo $note['question_no'];?></h6>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php echo \utils\Url::generateLink('read-note', false, ['id' => $note['id']]);?>" class="btn my-primary-btn text-white">Read</a>
                                        <a class="btn my-secondary-btn" target="_blank"
                                           href="<?php echo \utils\Url::generateLink('download-note', false, ['id' => $note['id']]);?>">Download</a>
                                    </div>
                                    <div class="col-3">
                                        <h6>Question Year : <?php echo $note['question_year'];?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }?>
                </div>



            </section>

            <!--Section: Content-->

            <!-- Pagination -->
            <nav class="my-4" aria-label="...">
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
