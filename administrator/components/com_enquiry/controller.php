<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Enquiry
 * @author     instanceof <support@instanceof.in>
 * @copyright  2019 Bhavesh Lakhapati
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Class EnquiryController
 *
 * @since  1.6
 */
class EnquiryController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   mixed    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return   JController This object to support chaining.
	 *
	 * @since    1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$view = JFactory::getApplication()->input->getCmd('view', 'enquiries');
		JFactory::getApplication()->input->set('view', $view);

		parent::display($cachable, $urlparams);

		return $this;
	}
}