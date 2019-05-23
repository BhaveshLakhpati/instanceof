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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'media/com_enquiry/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'enquiry.cancel') {
			Joomla.submitform(task, document.getElementById('enquiry-form'));
		}
		else {
			
			if (task != 'enquiry.cancel' && document.formvalidator.isValid(document.id('enquiry-form'))) {
				
				Joomla.submitform(task, document.getElementById('enquiry-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_enquiry&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="enquiry-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ENQUIRY_TITLE_ENQUIRY', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

									<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[employee_count]" value="<?php echo $this->item->employee_count; ?>" />
				<input type="hidden" name="jform[using_biometric_machine]" value="<?php echo $this->item->using_biometric_machine; ?>" />
				<input type="hidden" name="jform[biometric_machine_model]" value="<?php echo $this->item->biometric_machine_model; ?>" />
				<input type="hidden" name="jform[salary_processing]" value="<?php echo $this->item->salary_processing; ?>" />
				<input type="hidden" name="jform[solution_required]" value="<?php echo $this->item->solution_required; ?>" />
				<input type="hidden" name="jform[internet_connectivity]" value="<?php echo $this->item->internet_connectivity; ?>" />
				<?php echo $this->form->renderField('computer_at_office_location'); ?>
				<?php echo $this->form->renderField('name'); ?>
				<?php echo $this->form->renderField('email'); ?>
				<?php echo $this->form->renderField('mobile'); ?>


					<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
					<?php endif; ?>
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
