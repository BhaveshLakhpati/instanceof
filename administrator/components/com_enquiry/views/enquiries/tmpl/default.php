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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'administrator/components/com_enquiry/assets/css/enquiry.css');
$document->addStyleSheet(JUri::root() . 'media/com_enquiry/css/list.css');

$user      = JFactory::getUser();
$userId    = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn  = $this->state->get('list.direction');
$canOrder  = $user->authorise('core.edit.state', 'com_enquiry');
$saveOrder = $listOrder == 'a.`ordering`';

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_enquiry&task=enquiries.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'enquiryList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}

$sortFields = $this->getSortFields();
?>

<form action="<?php echo JRoute::_('index.php?option=com_enquiry&view=enquiries'); ?>" method="post"
	  name="adminForm" id="adminForm">
	<?php if (!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<?php else : ?>
		<div id="j-main-container">
			<?php endif; ?>

			<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
			
			<table class="table table-striped" id="enquiryList">
				<!---->
				<thead>
				<tr>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Name', 'a.`name`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Contact', '', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Email', '', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Plan', 'a.`plan`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Employee Count', 'a.`employee_count`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Machine Available', 'a.`using_biometric_machine`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Machine Model', 'a.`biometric_machine_model`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Salary Processing', 'a.`salary_processing`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Solution Required', 'a.`solution_required`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Internet Connectivity', 'a.`internet_connectivity`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Computer At Office', 'a.`computer_at_office_location`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Silent Enquiry', 'a.`silent_enquiry`', $listDirn, $listOrder); ?>
					</th>
					<th class='left'>
						<?php echo JHtml::_('searchtools.sort',  'Date Of Submission', 'a.`date_of_submission`', $listDirn, $listOrder); ?>
					</th>
					
				</tr>
				</thead>
				<!--<thead>
					<tr>
						<td>Name</td>
						<td>Contact</td>
						<td>Employee Count</td>
						<td>Using Biometric Machine</td>
						<td>Biometric Machine Model</td>
						<td>Salary Processing</td>
						<td>Solution Required</td>
						<td>Internet Connectivity</td>
						<td>Computer At Office Location</td>
						<td>Date Of Submission</td>
					</tr>
				</thead>-->
				<tbody>
				<?php foreach ($this->items as $i => $item) : ?>
					<tr class="row<?php echo $i % 2; ?>">
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->contact; ?></td>
						<td><?php echo $item->email; ?></td>
						<td><?php echo $item->plan; ?></td>
						<td><?php echo $item->employee_count; ?></td>
						<td><?php echo $item->using_biometric_machine; ?></td>
						<td><?php echo $item->biometric_machine_model; ?></td>
						<td><?php echo $item->salary_processing; ?></td>
						<td><?php echo $item->solution_required; ?></td>
						<td><?php echo $item->internet_connectivity; ?></td>
						<td><?php echo $item->computer_at_office_location; ?></td>
						<td><?php echo $item->silent_enquiry; ?></td>
						<td><?php echo date('d-m-Y', strtotime($item->date_of_submission)); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<input type="hidden" name="task" value=""/>
			<input type="hidden" name="boxchecked" value="0"/>
            <input type="hidden" name="list[fullorder]" value="<?php echo $listOrder; ?> <?php echo $listDirn; ?>"/>
			<?php echo JHtml::_('form.token'); ?>
		</div>
</form>
<script>
    window.toggleField = function (id, task, field) {

        var f = document.adminForm, i = 0, cbx, cb = f[ id ];

        if (!cb) return false;

        while (true) {
            cbx = f[ 'cb' + i ];

            if (!cbx) break;

            cbx.checked = false;
            i++;
        }

        var inputField   = document.createElement('input');

        inputField.type  = 'hidden';
        inputField.name  = 'field';
        inputField.value = field;
        f.appendChild(inputField);

        cb.checked = true;
        f.boxchecked.value = 1;
        window.submitform(task);

        return false;
    };
</script>