<?php
global $jsArr, $cssArr;
$cssArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css';
$jsArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js';


$serviceNote = \services\Note::getInstance();

if($_POST && !empty($_POST['delete'])){

    $serviceUser = \services\User::getInstance();

    $canLoggedInUserDeleteNote = false;
    if($serviceUser->isAdmin())
        $canLoggedInUserDeleteNote = true;
    else
        $canLoggedInUserDeleteNote = $serviceNote->doUserOwnNote($_POST['delete'], $_SESSION['id']);

    if($canLoggedInUserDeleteNote)
        $serviceNote->deleteNote($_POST['delete']);
}

?>
<?php if(empty($_GET['isAjax'])){?>

    <?php
    $flash = new \Plasticbrain\FlashMessages\FlashMessages();

    ?>

    <div class="h-50">

        <?php echo $flash->display();?>


        <table
            data-toggle="table"
            data-url="<?php echo \utils\Url::getCurrentUrl(true);?>?isAjax=1"
            data-pagination="true"
            data-search="true"
        >
            <thead>
            <tr>
                <th>Subject Code</th>
                <th>Question No</th>
                <th>Question Year</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

    <div id="delete_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <input type="hidden" name="delete" value="" />
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Data</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Are you sure you want to delete this data?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="del" class="btn my-secondary-btn">Delete</button>
                        <button type="button" class="btn my-primary-btn text-white" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php }else{

    $userID = $_SESSION['id'];

    if($showAllNotes && \services\User::getInstance()->isAdmin()){
        $userID = null;
    }

    $count = $serviceNote->countNotes($userID);
    $rows = $serviceNote->getNotes($userID);

    $tableRows = [];
    foreach($rows as $row){
        $tableRows[] = [
            $row['course_code'],
            $row['question_no'],
            $row['question_year'],
            '<a type="button" class="update btn btn-warning btn-sm" href="' . \utils\Url::generateLink('update-note', true, ['id' => $row['id']]) . '"><i class="fa fa-pencil-square-o"></i></a>',
            '<button type="button" data-toggle="modal" data-target="#delete_modal" data-id="' . $row['id'] . '" class="delete btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>'

        ];
    }
    echo json_encode([
        'total' => $count,
        'rows' => $tableRows
    ]);


//    echo json_encode([
//        "total" => $count,
//        "rows" => [
//
//                [
//                        10,
//                    20, 30, 40, 50, 60
//                ]
//                [
//                    'id' => 10,
////                    'program_code'    => $row['program_code'],
//                    'course_code'    => '123', //$row['course_code'],
//                    'question_no'    => '1', //$row['question_no'],
//                    'question_year'    => '1980',// $row['question_year'],
////                    'semester'    => $row['semester'],
////                    'question'    => $row['question'],
//
//                ]
//        ]
//    ]);

}?>