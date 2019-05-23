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

jimport('joomla.application.component.controllerform');

/**
 * Enquiry controller class.
 *
 * @since  1.6
 */
class EnquiryControllerEnquiry extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'enquiries';
		parent::__construct();
	}
}
