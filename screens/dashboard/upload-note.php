<?php
if (isset($_POST['upload'])) {
    $serviceNote = \services\Note::getInstance();
    $serviceNote->insertOrUpdateNote();
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

<?php

$data = $_POST;
$isUpdateNoteOp = false;

include BASE_PATH . '/screens/dashboard/partials/update-upload-notes.php';?>