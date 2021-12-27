<?php
include './config.php';

include './vendor/autoload.php';

spl_autoload_register('autoload_class');

include './includes/connection.php';

// Start a Session
if (!session_id()) session_start();

$path = isset($_GET['path'])?$_GET['path']:'index';

/**
 * Is it dashboard ?
 */
if(strpos($path, DASHBOARD_URL_SLUG) === 0){

    if(!\services\User::getInstance()->isLoggedIn()){
        $flash = new \Plasticbrain\FlashMessages\FlashMessages();
        $flash->error('Please Log-in to view this page.');
        \utils\Url::redirect(\utils\Url::generateLink('login'));
    }

    $dashboardPath = str_replace(DASHBOARD_URL_SLUG . '/', '', $path);



    switch ($dashboardPath){

        case 'my-notes':
        case 'my-downloads':
        case 'all-notes':

            \utils\Layout::generateDashboardPage($path);

            break;
        case 'upload-note':
            \utils\Layout::generatePage($path, [
                'doShowEmptyFooter' => true
            ]);


            break;

        case 'logout':
            $serviceUser = \services\User::getInstance();
            $serviceUser->logout();
            \utils\Url::redirect(\utils\Url::generateLink());
            break;
        default:
            \utils\Layout::show_404_page();
            break;
    }


}
else{


    switch ($path){

        case 'index':
        case 'about-me':
        case 'synopsis':
        case 'view-notes':
        case 'read-note':

            \utils\Layout::generatePage($path);

        break;

        case 'login':
        case 'signup':
            \utils\Layout::generatePage($path, [
                'doShowHeader' => false,
                'doShowFooter' => false,
            ]);
            break;

        default:
            \utils\Layout::show_404_page();

    }


}

function autoload_class($className){

    $className = str_replace('\\','/', $className);

    $class = BASE_PATH . '/includes/' . $className . '.php';

    if(file_exists($class))
        include($class);
}