<?php
    $flash = new \Plasticbrain\FlashMessages\FlashMessages();

    $program_code = isset($data['program_code'])?$data['program_code']:'';
    $course_code = isset($data['course_code'])?$data['course_code']:'';
    $semester = isset($data['semester'])?$data['semester']:'';
    $question = isset($data['question'])?$data['question']:'';
    $question_year = isset($data['question_year'])?$data['question_year']:'';
    $question_no = isset($data['question_no'])?$data['question_no']:'';

?>
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
                                               class="form-control form-control-lg" value="<?php echo $program_code;?>" />
                                    </div>

                                </div>

                                <!-- Course Code -->
                                <div class="col-12 mb-4 pb-2">

                                    <div class="form-outline ">
                                        <label class="form-label" for="courseCode">Course Code</label>
                                        <input type="text" id="courseCode" name="course_code"
                                               class="form-control form-control-lg" value="<?php echo $course_code;?>" />
                                    </div>

                                </div>


                                <!-- Semester -->
                                <div class="col-12 mb-4 pb-2">

                                    <div class="form-outline ">
                                        <label class="form-label" for="semester">Semester</label>
                                        <input type="text" id="semester" name="semester"
                                               class="form-control form-control-lg" value="<?php echo $semester;?>" />
                                    </div>

                                </div>

                                <!-- Question -->
                                <div class="col-12 mb-4 pb-2">

                                    <div class="form-outline ">
                                        <label class="form-label" for="question">Question</label>
                                        <input type="text" id="question" name="question"
                                               class="form-control form-control-lg" value="<?php echo $question;?>" />
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <!-- Question No & Question Year -->
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Question Year</label>
                                        <input type="text" id="firstName" name="question_year"
                                               class="form-control form-control-lg" value="<?php echo $question_year;?>" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Question No</label>
                                        <input type="text" id="lastName" name="question_no"
                                               class="form-control form-control-lg" value="<?php echo $question_no;?>" />
                                    </div>

                                </div>

                                <?php if($isUpdateNoteOp){?>
                                    <iframe class="embed-responsive-item"
                                            src="https://docs.google.com/gview?url=<?php echo \utils\Url::generateLink('uploads/notes/' . $data['id']);?>&embedded=true"
                                            style="width:100%; height:300px;" frameborder="0">

                                    </iframe>
                                <?php }else{?>
                                    <div class="input-group col-md-6 mt-4 mb-4">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file ">
                                            <input type="file" class="custom-file-input " id="file"
                                                   aria-describedby="inputGroupFileAddon01" name="file">
                                            <label class="custom-file-label my-secondary-btn " for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                <?php }?>


                            </div>


                            <div class="mt-2 pt-2 ">
                                <button type="submit" class="btn-lg my-primary-btn text-white">
                                    <?php echo $isUpdateNoteOp ? 'Update':'Upload';?> Note </button>
                            </div>





                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    Form End-->
