<?php
namespace utils;

class Layout
{

    public static function generateDashboardPage($filename){

        if(!empty($_GET['isAjax'])) {
            include BASE_PATH . '/screens/' . $filename . '.php';
        }
        else{
            include BASE_PATH . '/screens/layouts/header.php';


        ?>
        <div class="my-background">
            <div class="container">
                <div class="row">
                    <div class="col-2 my-background-dark">
                        <?php include BASE_PATH . '/screens/dashboard/layouts/sidebar.php';?>
                    </div>
                    <div class="col-10 my-background" style="min-height: 100vh">

                        <?php include BASE_PATH . '/screens/' . $filename . '.php';?>
                    </div>
                </div>

            </div>
        </div>

        <?php include BASE_PATH . '/screens/layouts/footer.php';?>

<?php
        }
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


    public static function generateGrid($keyValData, $columns = [], $actionButtons = [], $idColName = 'id'){

        ?>
        <div class="h-50">

            <?php if(empty($keyValData)){?>
                <p>There are no data.</p>
            <?php }?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <?php foreach($columns as $k => $col){?>
                        <th><?php echo $col;?></th>
                    <?php }?>
                    <?php foreach($actionButtons as $btn){?>
                        <th><?php echo $btn['label'];?></th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($keyValData as $vArr){?>
                    <tr id="d<?php echo $vArr[$idColName];?>">>
                    <?php foreach($columns as $colK => $colV){?>
                        <?php $v = $vArr[$colK];?>
                        <td><?php echo $v;?></td>

                    <?php }?>

                    <?php foreach($actionButtons as $btn){?>
                        <th><?php echo $btn['label'];?></th>
                        <td>
                            <?php if($btn['isModal']){?>
                                <button type="button" data-toggle="modal" data-target="#edit" data-uid="<?php echo $vArr[$idColName];?>"
                                    class="<?php echo $btn['class'];?>"><i class="<?php echo $btn['iconClass'];?>"></i></button>
                            <?php }else{?>
                                <a class="<?php echo $btn['class'];?>"><i class="<?php echo $btn['iconClass'];?>"></i></a>
                            <?php }?>
                        </td>

                    <?php }?>
                    </tr>

                <?php }?>


                </tbody>
            </table>

        </div>
        <?php foreach($actionButtons as $btn){?>

        <div id="<?php echo $btn['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"><?php echo $btn['modal']['title'];?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $btn['modal']['content'];?>
                    </div>
                    <div class="modal-footer">
                        <?php if(!empty($btn['modal']['btn'])){?>
                        <button type="button" id="up" class="btn my-primary-btn text-white" data-dismiss="modal"><?php echo $btn['modal']['btn']['title'];?>></button>
                        <?php }?>
                        <button type="button" class="btn btn-default my-secondary-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

<?php


    }

    static function show_404_page(){
        \utils\Layout::generatePage('404');
    }
}