<?php
namespace services;

use Plasticbrain\FlashMessages\FlashMessages;
use utils\Url;
use utils\Util;

class Download
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

    function insert($userID, $noteID){

        $downloadedOn = Util::getToday(true);

        global $conn;
        $query = "INSERT INTO downloads(userID, noteID, downloadedOn)  
                  VALUES ($userID, $noteID, '$downloadedOn')";
        $result = mysqli_query($conn , $query) or die(mysqli_error($conn));

        if (mysqli_affected_rows($conn) > 0)
            return true;

        return false;
    }


    function all($userID){

        global $conn;

        $query = "SELECT notes.*, downloads.id as download_id FROM notes inner join downloads on notes.id = downloads.noteID 
WHERE downloads.userID = $userID ORDER BY downloadedOn DESC";


        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $return = [];
        if (mysqli_num_rows($run_query) > 0) {

            while ($row = mysqli_fetch_assoc($run_query)) {

                $return[] = [
                    'note_id' => $row['id'],
                    'download_id' => $row['download_id'],
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
    function count($userID){

        global $conn;

        $query = "SELECT count(*) FROM downloads WHERE userID = $userID";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_num_rows($run_query);
    }

    function delete($downloadID){

        $flash = new FlashMessages();

        $query = "delete from downloads where id = $downloadID";
        global $conn;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            $hasErrors = false;
            $flash->success('Download is deleted successfully.');
        } else {
            $flash->error('Error deleting the download..Try again');
        }

    }
    function doUserOwn($downloadID, $userID){

        global $conn;

        $query = "SELECT count(*) FROM downloads WHERE id = $downloadID AND userID = $userID";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if(mysqli_num_rows($run_query) > 0)
            return true;
        return false;
    }

}