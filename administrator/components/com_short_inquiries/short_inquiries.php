<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Short_inquiries
 * @author     instanceof <support@instanceof.in>
 * @copyright  2019 Bhavesh Lakhapati
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_short_inquiries'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Short_inquiries', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('Short_inquiriesHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'short_inquiries.php');

$controller = JControllerLegacy::getInstance('Short_inquiries');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
