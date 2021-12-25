<div class="sidebar-container">
    <div class="sidebar-logo">
        Hi, <?php echo \services\User::getInstance()->getLoggedInUserSession()['firstname'];?>
    </div>
    <ul class="sidebar-navigation">
        <li class="header">My Account</li>
        <li>
            <a href="<?php echo \utils\Url::generateLink('view-notes');?>" class="text-dark pt-4">
                <i class="fa fa-globe" aria-hidden="true"></i> All Notes
            </a>
        </li>
        <li id="selector">
            <a href="<?php echo \utils\Url::generateLink('my-notes', true);?>" class="text-white pt-4" style="background-color: #b3b0a9">
                <i class="fa fa-sticky-note" aria-hidden="true"></i> My Notes
            </a>
        </li>
        <li>
            <a href="<?php echo \utils\Url::generateLink('my-downloads', true);?>" class="text-dark pt-4">
                <i class="fa fa-download" aria-hidden="true"></i> My Downloads
            </a>
        </li>

    </ul>
</div>