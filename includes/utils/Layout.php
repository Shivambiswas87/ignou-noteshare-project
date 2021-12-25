<?php
namespace utils;

class Layout
{

    public static function generateDashboardPage($filename){

        include BASE_PATH . '/screens/layouts/header.php';

        ?>
        <div class="my-background">
            <div class="container">
                <div class="row">
                    <div class="col-2 my-background-dark">
                        <?php include BASE_PATH . '/screens/dashboard/layouts/sidebar.php';?>
                    </div>
                    <div class="col-10 my-background vh-100">

                        <?php include BASE_PATH . '/screens/' . $filename . '.php';?>
                    </div>
                </div>

            </div>
        </div>

        <?php include BASE_PATH . '/screens/layouts/footer.php';?>

<?php
    }
    public static function generatePage($filename, $config = []){

        $defaultConfig = [
            'doShowHeader' => true,
            'doShowFooter' => true,
            'doShowEmptyFooter' => false,

        ];
        $config = array_merge($defaultConfig, $config);

        if($config['doShowHeader'])
            include BASE_PATH . '/screens/layouts/header.php';

        include BASE_PATH . '/screens/' . $filename . '.php';

        if($config['doShowFooter']) {

            if ($config['doShowEmptyFooter'])
                include BASE_PATH . '/screens/layouts/footer-empty.php';
            else
                include BASE_PATH . '/screens/layouts/footer.php';

        }
    }


}