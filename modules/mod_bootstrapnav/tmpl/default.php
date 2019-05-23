<?php
/**
 * @version     1.7
 * @package     mod_bootstrapnav
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@bootstrapjoomla.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>
<?php if($use_css == 1) : ?>
    <link rel="stylesheet" href="<?php echo JURI::base(); ?>media/mod_bootstrapnav/css/bootstrap.css" type="text/css" />
<?php endif; ?>
<?php //print_r($list); ?>
<style>

.navbar, .navbar .container{
    /*background: <?php echo $ackground_color; ?> !important;
    background-color: #1D293A;*/
    background-color: #2196f3; /*#39506F*/
    transition: 0.5s;
}
.navbar-branding > a{
    color: #fff; /*burlywood*/
}
.navbar-nav > li > a{
     color: white !important; /*#d2d1d1*/
     text-shadow: 0 0 0 !important;
}

.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    visibility: hidden;
    margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
    margin-top: 0;
}

.navbar .sub-menu:before {
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .sub-menu:after {
    border-top: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-bottom: 6px solid transparent;
    left: 10px;
    top: 11px;
    left: -6px;
}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus{
     background: <?php echo $active_background_color; ?> !important;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
    margin-left: -1px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}



.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: 5px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
.multi-level li {
    width: 100% !important;
}

</style>
<?php if($nav_type == 'navbar') : ?>

    <nav class="navbar navbar-expand-md navbar-black <?php echo $fixed; ?>"">
      <!-- Brand -->
        <div class="navbar-branding">
            <?php if($brand_type == 'text') : ?>
                <a class="navbar-brand" href="/joomla-4/home"><?php echo $brand_text; ?></a>
            <?php elseif($brand_type == 'image') : ?>
                <a class="navbar-brand" href="index.php"><img src="<?php echo $brand_image; ?>" /></a>
            <?php endif; ?>
        </div>

        <div class="navbar-toggle-icon-div">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
               <span class="icon-bar top-bar"></span>
               <span class="icon-bar middle-bar"></span>
               <span class="icon-bar bottom-bar"></span>
            </button>
        </div>

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <?php
                $bootstrap_menu_generator = new ModBootStrapMenuGenerator();
            
                $bootstrap_menu = $bootstrap_menu_generator->Build_BootStrap_Menu($list, $path, $active_id, $show_subnav);
                echo $bootstrap_menu;
            ?>
            <li class="nav-item active">
                <a href="/joomla-4/pricing" class="start-trial">Start your free trial</a>
            </li>
        </ul>
      </div> 
    </nav>

<?php endif; ?>