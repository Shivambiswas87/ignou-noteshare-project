<?php
namespace utils;

class Url
{

    /**
     * @param $path string
     * @param $isDashboard bool
     * @param $params Array key value array
     * @return string
     */
    static function generateLink($path = '', $isDashboard = false, $params = []){

        $url = BASE_URL;

        if($isDashboard)
            $url .= '/' . DASHBOARD_URL_SLUG;

        $url .= '/' . $path;

        if(!empty($params)) {
            $url .= '?';
            $url .= http_build_query($params);

        }

        return $url;

    }
    static function printLink($title, $path, $isDashboard = false, $params = []){

        $link = self::generate_link($path, $isDashboard, $params);

        echo "<a href='$link'>$title</a>";

    }

    static function getAssetUrl($assetPath){


        $url = BASE_URL . '/assets';
        return $url . '/' . $assetPath;
    }


    static function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
}