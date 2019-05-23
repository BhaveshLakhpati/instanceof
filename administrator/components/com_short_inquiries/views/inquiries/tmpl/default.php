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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'administrator/components/com_short_inquiries/assets/css/short_inquiries.css');
$document->addStyleSheet(JUri::root() . 'media/com_short_inquiries/css/list.css');

$user      = JFactory::getUser();
$userId    = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn  = $this->state->get('list.direction');
$canOrder  = $user->authorise('core.edit.state', 'com_short_inquiries');
$saveOrder = $listOrder == 'a.`ordering`';

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_short_inquiries&task=inquiries.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'inquiryList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}

$sortFields = $this->getSortFields();
?>

<form action="<?php echo JRoute::_('index.php?option=com_short_inquiries&view=inquiries'); ?>" method="post"
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

			<div class="clearfix"></div>
			<table class="table table-striped" id="inquiryList">
				<thead>
					<tr>
						<th class='left'>
							<?php echo JHtml::_('searchtools.sort',  'ID', 'a.`id`', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo JHtml::_('searchtools.sort',  'Name', 'a.`name`', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo JHtml::_('searchtools.sort',  'Email', 'a.`email`', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo JHtml::_('searchtools.sort',  'Mobile', 'a.`phone`', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo JHtml::_('searchtools.sort',  'Date Of Submission', 'a.`date_of_submission`', $listDirn, $listOrder); ?>
						</th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
				</tfoot>
				<tbody>
				<?php foreach ($this->items as $i => $item) : ?>
					<tr class="row<?php echo $i % 2; ?>">
						<td>
							<?php echo $item->id; ?>
						</td>
						<td>
							<?php echo $this->escape($item->name); ?>
						</td>
						<td>
							<?php echo $item->email; ?>
						</td>
						<td>
							<?php echo $item->phone; ?>
						</td>
						<td>
							<?php echo date('d-m-Y', strtotime($item->date_of_submission)); ?>
						</td>
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