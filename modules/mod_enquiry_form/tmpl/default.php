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
$document = JFactory::getDocument();
//$document->addStyleSheet($this->baseurl."/templates/".$this->template."/css/modal.css");
$document->addScript("/joomla-4/templates/jumbotron/js/enquiry-form.js");
$document->addStyleSheet("/joomla-4/templates/jumbotron/css/modal.css");
$document->addStyleSheet("/joomla-4/templates/jumbotron/css/enquiry-form.css");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$app = JFactory::getApplication();
	$data = array();
	$data = $app->input->post->getArray($_POST);
	
	/*$dbo = JFactory::getDbo();
	$query = $dbo->getQuery(true);
	$conditions = array(
		$dbo->quoteName('contact').'=8779694327',
		$dbo->quoteName('silent_enquiry').'!='.'0'
	);
	$query->select($dbo->quoteName('id'));
	$query->from($dbo->quoteName('#__enquiry'));
	$query->where($conditions);
	$dbo->setQuery($query);
	$results = $dbo->loadObjectList();
	echo $results[0]->id;*/
	/*$enquiry = new stdClass();		
	$enquiry->id =  '1';
	$enquiry->employee_count = mysqli_real_escape_string($dbo->getConnection(), '10');
	$enquiry->using_biometric_machine = mysqli_real_escape_string($dbo->getConnection(), 'no');
	$enquiry->biometric_machine_model = mysqli_real_escape_string($dbo->getConnection(), 'no');
	$enquiry->salary_processing = mysqli_real_escape_string($dbo->getConnection(), 'manual');
	$enquiry->solution_required = mysqli_real_escape_string($dbo->getConnection(), 'yes');
	$enquiry->internet_connectivity = mysqli_real_escape_string($dbo->getConnection(), 'permanent');
	$enquiry->computer_at_office_location = mysqli_real_escape_string($dbo->getConnection(), 'yes');
	$enquiry->name = mysqli_real_escape_string($dbo->getConnection(), 'Hey');
	$enquiry->mobile = mysqli_real_escape_string($dbo->getConnection(), '8779694327');
	$enquiry->plan = mysqli_real_escape_string($dbo->getConnection(), 'standard');
	$enquiry->silent_enquiry = mysqli_real_escape_string($dbo->getConnection(), '0');
	$dbo->updateObject('#__enquiry', $enquiry, 'id');*/

	if(isset($data['contact']) || isset($data['email'])) { 
		$dbo = JFactory::getDbo();

		$enquiry = new stdClass();		
		$enquiry->employee_count = mysqli_real_escape_string($dbo->getConnection(), $data['ec']);
		$enquiry->using_biometric_machine = mysqli_real_escape_string($dbo->getConnection(), $data['ubm']);
		$enquiry->biometric_machine_model = mysqli_real_escape_string($dbo->getConnection(), $data['bmm']);
		$enquiry->salary_processing = mysqli_real_escape_string($dbo->getConnection(), $data['sp']);
		$enquiry->solution_required = mysqli_real_escape_string($dbo->getConnection(), $data['sr']);
		$enquiry->internet_connectivity = mysqli_real_escape_string($dbo->getConnection(), $data['ic']);
		$enquiry->computer_at_office_location = mysqli_real_escape_string($dbo->getConnection(), $data['caol']);
		$enquiry->name = mysqli_real_escape_string($dbo->getConnection(), $data['name']);
		$enquiry->contact= mysqli_real_escape_string($dbo->getConnection(), $data['contact']);
		$enquiry->email = mysqli_real_escape_string($dbo->getConnection(), $data['email']);
		$enquiry->plan = mysqli_real_escape_string($dbo->getConnection(), $data['plan']);
		$enquiry->silent_enquiry = mysqli_real_escape_string($dbo->getConnection(), $data['silent']);

		$query = $dbo->getQuery(true);
		$where_conditions = array(
			$dbo->quoteName('silent_enquiry').'!='.'0'
		);
		
		if($data['contact'] != null)
			array_push($where_conditions, $dbo->quoteName('contact')."='".$data['contact']."'");

		$or_where = array();
		if($data['email'] != null)
			array_push($or_where, $dbo->quoteName('email')."=".$dbo->quote($data['email']));

		$query->select($dbo->quoteName('id'));
		$query->from($dbo->quoteName('#__enquiry'));
		$query->where($where_conditions);
		if($data['email'] != null && $data['contact'] != null)
			$query->orWhere($or_where);
		else
			$query->andWhere($or_where);
		
		$dbo->setQuery($query);
		$results = $dbo->loadObjectList();

		$response = new stdClass();
		try {
			if(count($results) > 0) { //count($results) > 0
				$enquiry->id = $results[0]->id;
				$result = $dbo->updateObject('#__enquiry', $enquiry, 'id');
			}else {
				// Insert the object into the user enquiry table.
				$result = $dbo->insertObject('#__enquiry', $enquiry);
			}
			$response->status = 200;
			$response->message = 'success';
		} catch(Exception $exce) {
			$response->status = 500;
			$response->message = 'failure';
		}
		echo json_encode($response);
	}else { ?>
		<script>
			$(document).ready(function() {
				$('#plan-selector').val("<?php echo $data['plan']; ?>");
			});
		</script>

<style type="text/css">
	.bg-image {
	  background-image: url(<?php echo $background_image; ?>);
	  background-size: cover;
	  background-position: center;
	  background-attachment: fixed;
	}
</style>

<div class="modal fade wait">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 48px">
            <span class="fa fa-spinner fa-spin fa-3x"></span>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
				<div class="success-modal">
					<img src="/joomla-4/images/tick.png?>Tick.png" alt="">
					<h1>Thank You!</h1>
					<p>Your submission is received and we will mobile you soon</p>
					<button type="button" class="btn btn-primary btn-lg modal-close" data-dismiss="modal">Close</button>
				</div>
            </div>
			
        </div>
    </div>
</div>

<div class="enquiry-form container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-5 bg-image"></div>
    <div class="col-md-8 col-lg-7">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h1 class="login-heading mb-4">SME Solution</h1>
              <div class="enquiry-form">

              	<div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                  <label for="name">Name</label>
                </div>
                <div class="form-label-group">
                  <input type="text" id="contact" name="contact" class="form-control" placeholder="contact">
                  <label for="contact">Mobile</label>
                </div>
                <div class="form-label-group">
                  <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                  <label for="email">Email</label>
                </div>
                <div class="form-group">
					<select class="form-control form-control-lg" id="plan-selector" name="plan-selector">
						<option value="basic">W/O MACHINE ₹6000</option>
						<option value="standard">K31 PRO MACHINE ₹9,900</option>
						<option value="premium">WL20 MACHINE ₹10,900</option>
					</select>
				</div>
				<div class="switch switch-sm mt-3 mb-4">
				    <input type="checkbox" class="switch" id="switch-sm">
					<label for="switch-sm">Additional Information</label>
			  	</div>

			  	<div class="advanced-form">
			  		<div class="question-answer">
	                	<h4 for="answers" class="question">Employee Count</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="0" name="ec" value="<10" type="radio" checked>
						      <label for="0">< 10</label>
						      <input id="1" name="ec" value="10-20" type="radio">
						      <label for="1">10 - 20</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="2" name="ec" value=">20" type="radio">
						      <label for="2">> 20</label>
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Using Biometric Machine?</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="3" name="ubm" value="yes" type="radio" checked>
						      <label for="3">Yes</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="4" name="ubm" value="no" type="radio">
						      <label for="4">No</label>
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Biometric Machine Model (If using)</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="5" name="bmm" value="identix" type="radio" checked>
						      <label for="5">Identix</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="6" name="bmm" value="biomax" type="radio">
						      <label for="6">Biomax</label>
						    </div>
					     	<div class="md-radio md-radio-inline">
						      <input id="7" name="bmm" value="3" type="radio">
						      <label for="7">Other</label>
						    </div>
						    <div id="input_device_brand_div" class="md-radio md-radio-inline">
						      <input type="text" name="input_device_brand" id="input_device_brand" class="form-control" placeholder="Device">
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Salary Processing</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="8" name="sp" value="manual" type="radio" checked>
						      <label for="8">Manual</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="9" name="sp" value="software" type="radio">
						      <label for="9">Software Based</label>
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Is Attendance and Payroll Management solution required?</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="10" name="sr" value="yes" type="radio" checked>
						      <label for="10">Yes</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="11" name="sr" value="no" type="radio">
						      <label for="11">No</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="12" name="sr" value="maybe" type="radio">
						      <label for="12">Maybe</label>
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Internet Connectivity</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="13" name="ic" value="no" type="radio" checked>
						      <label for="13">No</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="14" name="ic" value="temporary" type="radio">
						      <label for="14">Temporary</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="15" name="ic" value="permanent" type="radio">
						      <label for="15">Permanent</label>
						    </div>
	                	</div>
					</div>
					<div class="question-answer">
	                	<h4 for="answers" class="question">Computer at office location?</h4>
	                	<div class="answers">
	                		<div class="md-radio md-radio-inline">
						      <input id="16" name="caol" value="yes" type="radio" checked>
						      <label for="16">Yes</label>
						    </div>
						    <div class="md-radio md-radio-inline">
						      <input id="17" name="caol" value="no" type="radio">
						      <label for="17">No</label>
						    </div>
	                	</div>
					</div>
			  	</div>

                <button href="<?php echo JUri::getInstance(); ?>" class="btn btn-lg btn-primary btn-block btn-submit text-uppercase font-weight-bold mb-2">Sumbit Enquiry</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
	//end else 
		}
	//end post else
	}
?>