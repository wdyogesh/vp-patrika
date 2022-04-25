<?php
function PageName()
{
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}
$current_page = PageName();
?>
<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>">
            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
        </li>
        <li class="<?php echo $current_page == 'user_register.php' ? 'active':NULL ?>">
            <a href="user_register.php"><i class="icon-chevron-right"></i> Registred Users </a>
        </li>
        <li class="<?php echo $current_page == 'user_active.php' ? 'active':NULL ?>">
            <a href="user_active.php"><i class="icon-chevron-right"></i> Active Users </a>
        </li>
        <li class="<?php echo $current_page == 'user_paid.php' ? 'active':NULL ?>">
            <a href="user_paid.php"><i class="icon-chevron-right"></i> Paid Members </a>
        </li>
    </ul>
</div>