<?php
global $jsArr, $cssArr;
$cssArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css';
$jsArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js';


$serviceDownload = \services\Download::getInstance();

if($_POST && !empty($_POST['delete'])){

    $serviceUser = \services\User::getInstance();

    $canLoggedInUserDelete = false;
    if($serviceUser->isAdmin())
        $canLoggedInUserDelete = true;
    else
        $canLoggedInUserDelete = $serviceDownload->doUserOwn($_POST['delete'], $_SESSION['id']);

    if($canLoggedInUserDelete)
        $serviceDownload->delete($_POST['delete']);
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
                <th>View</th>
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

    $count = $serviceDownload->count($userID);
    $rows = $serviceDownload->all($userID);


    $tableRows = [];
    foreach($rows as $row){
        $tableRows[] = [
            $row['course_code'],
            $row['question_no'],
            $row['question_year'],
            '<a type="button" class="update btn btn-warning btn-sm" href="' . \utils\Url::generateLink('read-note', false, ['id' => $row['note_id']]) . '">
<i class="fa fa-eye"></i></a>',
            '<button type="button" data-toggle="modal" data-target="#delete_modal" data-id="' . $row['download_id'] . '" class="delete btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>'

        ];
    }
    echo json_encode([
        'total' => $count,
        'rows' => $tableRows
    ]);
}?>
