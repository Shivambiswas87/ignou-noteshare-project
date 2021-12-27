<?php
if(!empty($_GET['id'])) {
    $serviceNote = \services\Note::getInstance();
    $serviceNote->download($_GET['id'], $_SESSION['id']);
    exit;
}
else
    \utils\Layout::show_404_page();