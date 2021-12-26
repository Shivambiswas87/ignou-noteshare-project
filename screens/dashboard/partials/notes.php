<?php
global $jsArr, $cssArr;
$cssArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css';
$jsArr[] = 'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js';

$serviceNote = \services\Note::getInstance();

?>
<?php if(empty($_GET['isAjax'])){?>
    <div class="h-50">

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
                <!--                <th>Edit</th>-->
                <!--                <th>Delete</th>-->
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

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