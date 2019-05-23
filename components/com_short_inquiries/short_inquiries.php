<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Short_inquiries
 * @author     instanceof <support@instanceof.in>
 * @copyright  2019 Bhavesh Lakhapati
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Short_inquiries', JPATH_COMPONENT);
JLoader::register('Short_inquiriesController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Short_inquiries');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
