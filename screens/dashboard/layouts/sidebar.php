<?php
global $path;
$herePath = str_replace('dashboard/', '', $path);

?>
<div class="sidebar-container">
        <div class="sidebar-logo">
            Hi, <?php echo \services\User::getInstance()->getLoggedInUserSession()['firstname'];?>
        </div>
        <ul class="sidebar-navigation">
            <li class="header">My Account</li>
            <li>
                <?php if(\services\User::getInstance()->isAdmin()){?>
                    <a href="<?php echo \utils\Url::generateLink('all-users-notes', true);?>"
                       class="text-dark pt-4 <?php echo ($herePath == 'all-users-notes')?'activeSidebarNav':'';?>">
                        <i class="fa fa-users" aria-hidden="true"></i> All Users Notes
                    </a>
                <?php }?>

                <a href="<?php echo \utils\Url::generateLink('view-notes');?>" class="text-dark pt-4 <?php echo ($herePath == 'view-notes')?'activeSidebarNav':'';?>">
                    <i class="fa fa-globe" aria-hidden="true"></i> All Notes
                </a>

            </li>

            <li id="selector">
                <a href="<?php echo \utils\Url::generateLink('my-notes', true);?>" class="text-dark pt-4 <?php echo ($herePath == 'my-notes')?'activeSidebarNav':'';?>">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i> My Notes
                </a>
            </li>
            <li>
                <a href="<?php echo \utils\Url::generateLink('my-downloads', true);?>" class="text-dark pt-4 <?php echo ($herePath == 'my-downloads')?'activeSidebarNav':'';?>">
                    <i class="fa fa-download" aria-hidden="true"></i> My Downloads
                </a>
            </li>

        </ul>
    </div>
