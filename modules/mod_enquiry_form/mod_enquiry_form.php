<?php
/**
 * @version     1.4
 * @package     mod_jumbotron
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@joomdigi.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;

/* Params */
$sub_heading_tag = $params->get('sub_heading_tag');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$show_read_more =  $params->get('show_read_more');
$read_more_text =  $params->get('read_more_text');
$read_more_link =  $params->get('read_more_link');
$header_text =  $params->get('header_text');
$paragraph_text =  $params->get('paragraph_text');
$background_image = $params->get('background_image');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

require JModuleHelper::getLayoutPath('mod_enquiry_form', $params->get('layout', 'default'));
?>