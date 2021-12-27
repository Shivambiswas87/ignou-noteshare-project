
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
global $cssArr;
if(!empty($cssArr)){
    foreach($cssArr as $cs){
        ?>
        <link rel="stylesheet" href="<?php echo $cs;?>">
        <?php
    }
}
global $jsArr;
if(!empty($jsArr)){
    foreach($jsArr as $js){
        ?>
        <script src="<?php echo $js;?>" crossorigin="anonymous"></script>
        <?php
    }
}

?>
<script src="<?php echo \utils\Url::getAssetUrl('js/script.js?v=2');?>"></script>
<?php if(\utils\Url::isDashboard()){?>
    <script src="<?php echo \utils\Url::getAssetUrl('js/admin.js?v=2');?>"></script>

<?php } ?>