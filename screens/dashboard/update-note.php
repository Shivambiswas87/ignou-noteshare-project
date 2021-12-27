<?php
if (isset($_GET['id'])) {

    $serviceNote = \services\Note::getInstance();

    $serviceUser = \services\User::getInstance();

    $canLoggedInUserEditNote = false;
    if($serviceUser->isAdmin())
        $canLoggedInUserEditNote = true;
    else
        $canLoggedInUserEditNote = $serviceNote->doUserOwnNote($_GET['id'], $_SESSION['id']);

    if(!$canLoggedInUserEditNote) {
        \utils\Layout::show_404_page();
    }
    else {

        if($_POST){
            $serviceNote->insertOrUpdateNote($_GET['id']);
        }


        $data = $serviceNote->getNote($_GET['id']);

        if (empty($data))
            \utils\Layout::show_404_page();
        else {

            $isUpdateNoteOp = true;
            include BASE_PATH . '/screens/dashboard/partials/update-upload-notes.php';
        }
    }

}
else{
    \utils\Layout::show_404_page();
}