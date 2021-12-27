<?php
if(!empty($_GET['id'])){

    $id = $_GET['id'];
    $serviceNote = \services\Note::getInstance();
    $note = $serviceNote->getNote($id);

    ?>

    <div class="container py-5">
        <!--Pdf Reader-->
        <div class="embed-responsive embed-responsive-21by9">
            <iframe class="embed-responsive-item"
                    src="https://docs.google.com/gview?url=<?php echo \utils\Url::generateLink('uploads/notes/' . $note['file']);?>&embedded=true"
                    style="width:100%; height:700px;" frameborder="0">

            </iframe>
        </div>
    </div>



<?php
}else{
    \utils\Layout::show_404_page();
}