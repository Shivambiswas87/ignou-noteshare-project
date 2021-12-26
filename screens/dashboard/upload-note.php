<?php
$flash = new \Plasticbrain\FlashMessages\FlashMessages();
if (isset($_POST['upload'])) {
    $serviceNote = \services\Note::getInstance();
    $serviceNote->uploadeNote();
}
?>
<!--    Upload Notes Text -->
    <div class="container-fluid" style="height: 150px">
        <div class="container text-center pt-4">
            <h2 class="display-5">Upload Notes</h2>
            <p class="lead ">Upload your current or previous year notes and get better grades</p>
            <hr class="my-4 bg-light" />
        </div>
    </div>

<!--    Upload text end-->


<!--    Form -->
    <section class="">
        <div class="py-3 h-100">
            <div class="row justify-content-center align-items-center ">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">

                            <div class="row">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 col-6 ">Notes</h3>
                                <h3 class=" col-6 text-center fs-5 fw-light text-decoration-underline ">IGNOU</h3>
                            </div>

                            <form method="post" enctype="multipart/form-data">

                                <input type="hidden" name="upload" value="upload" />
                                <div class="row">
                                    <?php echo $flash->display();?>
                                </div>

                                <!-- Program Code -->
                                <div class="row">
                                    <div class="col-12 mb-4 pb-2">

                                        <div class="form-outline ">
                                            <label class="form-label" for="programCode">Program Code</label>
                                            <input type="text" id="programCode" name="program_code"
                                                   class="form-control form-control-lg" value="<?php echo isset($_POST['program_code'])?$_POST['program_code']:'';?>" />
                                        </div>

                                    </div>

                                    <!-- Course Code -->
                                    <div class="col-12 mb-4 pb-2">

                                        <div class="form-outline ">
                                            <label class="form-label" for="courseCode">Course Code</label>
                                            <input type="text" id="courseCode" name="course_code"
                                                   class="form-control form-control-lg" value="<?php echo isset($_POST['course_code'])?$_POST['course_code']:'';?>" />
                                        </div>

                                    </div>


                                <!-- Semester -->
                                <div class="col-12 mb-4 pb-2">

                                    <div class="form-outline ">
                                        <label class="form-label" for="semester">Semester</label>
                                        <input type="text" id="semester" name="semester"
                                               class="form-control form-control-lg" value="<?php echo isset($_POST['semester'])?$_POST['semester']:'';?>" />
                                    </div>

                                </div>

                                <!-- Question -->
                                <div class="col-12 mb-4 pb-2">

                                        <div class="form-outline ">
                                            <label class="form-label" for="question">Question</label>
                                            <input type="text" id="question" name="question"
                                                   class="form-control form-control-lg" value="<?php echo isset($_POST['question'])?$_POST['question']:'';?>" />
                                        </div>

                                </div>
                                </div>

                                <div class="row">
                                    <!-- Question No & Question Year -->
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">Question Year</label>
                                            <input type="text" id="firstName" name="question_year"
                                                   class="form-control form-control-lg" value="<?php echo isset($_POST['question_year'])?$_POST['question_year']:'';?>" />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Question No</label>
                                            <input type="text" id="lastName" name="question_no"
                                                   class="form-control form-control-lg" value="<?php echo isset($_POST['question_no'])?$_POST['question_no']:'';?>" />
                                        </div>

                                    </div>

                                    <div class="input-group col-md-6 mt-4 mb-4">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file ">
                                            <input type="file" class="custom-file-input " id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01" name="file">
                                            <label class="custom-file-label my-secondary-btn " for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-2 pt-2 ">
                                    <button type="submit" class="btn-lg my-primary-btn text-white"> Upload Notes </button>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--    Form End-->
