<?php
namespace utils;

class Util
{

    public static function getToday($showDateWithTime = false){

        if($showDateWithTime){
            return date('Y-m-d H:i:s');
        }
        else{
            return date('Y-m-d');
        }
    }
    static function setHeadersForFileDownload($fileName, $contentType = 'application/pdf'){

        header('Content-disposition: attachment; filename="' . $fileName . '"');
        header('Content-type: ' . $contentType);
//        header('Content-Length: ' . filesize($filePath));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

    }


}