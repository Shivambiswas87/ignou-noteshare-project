<?php
namespace services;

use Plasticbrain\FlashMessages\FlashMessages;
use utils\Util;

class Note
{

    private static $_instance = null;
    static function getInstance(){
        if(empty(self::$_instance))
            self::$_instance = new self();

        return self::$_instance;

    }
    private function __construct()
    {
    }


    public function insertOrUpdateNote($noteID = null){



            $flash = new FlashMessages();

            require BASE_PATH . "/libs/gump/gump.class.php";
            $gump = new \GUMP();
            $_POST = $gump->sanitize($_POST);

            $gump->validation_rules(array(
                'program_code'    => 'required|max_len,60|min_len,3',
                'course_code'    => 'required|max_len,60|min_len,3',
                'semester'    => 'required|max_len,60|min_len,1',
                'question'    => 'required|max_len,255|min_len,3',
                'question_year'    => 'required|max_len,60|min_len,3',
                'question_no'    => 'required|max_len,60|min_len,1',
            ));
            $gump->filter_rules(array(
                'program_code'    => 'trim|sanitize_string',
                'course_code'    => 'trim|sanitize_string',
                'semester'    => 'trim|sanitize_string',
                'question'    => 'trim|sanitize_string',
                'question_year'    => 'trim|sanitize_string',
                'question_no'    => 'trim|sanitize_string',

            ));
            $validated_data = $gump->run($_POST);

            $hasErrors = true;
            if($validated_data === false) {
                $flash->error($gump->get_readable_errors(true));
            }
            else {

                $programCode = $_POST['program_code'];
                $course_code = $_POST['course_code'];
                $semester = $_POST['semester'];
                $question = $_POST['question'];
                $question_year = $_POST['question_year'];
                $question_no = $_POST['question_no'];

                if (empty($noteID)) {

                $file = $_FILES['file']['name'];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $validExt = array('pdf');//array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip');
                if (empty($file)) {
                    $flash->error('Attach a file');
                } else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size'] > 30720000) {
                    $flash->error('file size is not proper');
                } else if (!in_array($ext, $validExt)) {
                    $flash->error('Not a valid file');

                } else {
                    $folder = BASE_PATH . '/uploads/notes/';
                    if (!is_dir($folder))
                        mkdir($folder, 0775, true);

                    $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $notefile = $programCode . '-' . $course_code . '-' . $semester . '-' . $question_year . '-' . $question_no . '-' . rand(1000, 1000000) . '.' . $fileext;
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $folder . $notefile)) {


                        $file_uploaded_on = Util::getToday(true);
                        $userID = $_SESSION['id'];

                        $query = "INSERT INTO notes(program_code, course_code,semester, question, question_year, question_no, file, file_uploaded_on, userID)
VALUES ('$programCode', '$course_code' , '$semester' , '$question', '$question_year', '$question_no', '$notefile',  '$file_uploaded_on', $userID )";

                        global $conn;
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        if (mysqli_affected_rows($conn) > 0) {
                            $hasErrors = false;
                            $flash->success('Thank you for uploading the note.');
                        } else {
                            $flash->error('Error while uploading..try again');
                        }
                    }
                }
            }
                else{

                    $hasErrors = false;
                    $query = "update notes 
                            set program_code = '$programCode', 
                            course_code = '$course_code',
                            semester = '$semester', 
                            question = '$question', 
                            question_year = '$question_year', 
                            question_no = '$question_no'
                            where id = $noteID";
                    global $conn;
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if (mysqli_affected_rows($conn) > 0) {
                        $hasErrors = false;
                        $flash->success('Note is updated successfully.');
                    } else {
                        $flash->error('Error updating the note..Try again');
                    }
                }

            }
            return !$hasErrors;
    }
    function deleteNote($noteID){

        $flash = new FlashMessages();

        $query = "delete from notes where id = $noteID";
        global $conn;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            $hasErrors = false;
            $flash->success('Note is deleted successfully.');
        } else {
            $flash->error('Error deleting the note..Try again');
        }

    }

    function getNotes($userID = null, $searchText = null){

        global $conn;

        $query = "SELECT * FROM notes WHERE 1 = 1";
        if(!empty($userID))
            $query .= " AND userID = $userID";

        $query .= " ORDER BY file_uploaded_on DESC";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $return = [];
        if (mysqli_num_rows($run_query) > 0) {

            while ($row = mysqli_fetch_assoc($run_query)) {

                $return[] = [
                    'id' => $row['id'],
                    'program_code'    => $row['program_code'],
                    'course_code'    => $row['course_code'],
                    'semester'    => $row['semester'],
                    'question'    => $row['question'],
                    'question_year'    => $row['question_year'],
                    'question_no'    => $row['question_no'],
                    'file' => $row['file']

                ];


            }

        }
        return $return;

}
    function countNotes($userID = null){

        global $conn;

        $query = "SELECT count(*) FROM notes WHERE 1 = 1";
        if(!empty($userID))
            $query .= " AND userID = $userID";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_num_rows($run_query);
    }

    function getNote($noteID){

        global $conn;

        $query = "SELECT * FROM notes WHERE id = $noteID";
        if(!empty($userID))
            $query .= " AND userID = $userID";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $return = [];
        if (mysqli_num_rows($run_query) > 0) {

            $row = mysqli_fetch_assoc($run_query);

                $return = [
                    'id' => $row['id'],
                    'program_code'    => $row['program_code'],
                    'course_code'    => $row['course_code'],
                    'semester'    => $row['semester'],
                    'question'    => $row['question'],
                    'question_year'    => $row['question_year'],
                    'question_no'    => $row['question_no'],
                    'file' => $row['file']

                ];




        }
        return $return;

    }
    function doUserOwnNote($noteID, $userID){

        global $conn;

        $query = "SELECT count(*) FROM notes WHERE id = $noteID AND userID = $userID";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if(mysqli_num_rows($run_query) > 0)
            return true;
        return false;
    }

    function download($id, $userID){

        $note = $this->getNote($id);

        if(Download::getInstance()->insert($userID, $id)) {

            Util::setHeadersForFileDownload($note['file']);

            readfile(BASE_PATH . '/upload/notes/' . $note['file']);
        }

    }

}