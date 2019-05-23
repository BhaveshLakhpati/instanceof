jQuery(function($) {
	$(document).ready(function() {
		$("body").tooltip({ selector: '[data-toggle=tooltip]' });
	});

	$('#switch-sm').click(function() {
		if(this.checked)
			$('.advanced-form').slideDown();
		else
			$('.advanced-form').slideUp();
	});

	$(':radio[name=ubm]').change(function() {
		if($(':radio[name=ubm]:checked').val() == "no")
			$('.question-answer:nth-of-type(3)').slideUp();
		else
			$('.question-answer:nth-of-type(3)').slideDown();
	});
	$(':radio[name=bmm]').change(function() {
		if($(':radio[name=bmm]:checked').val() != "3"){
			$('#input_device_brand_div').css('display', 'none');
			$('#input_device_brand_div #input_device_brand').prop('required', 'false');
		}
		else{
			$('#input_device_brand_div').css('display', 'inline-block');
			$('#input_device_brand_div #input_device_brand').prop('required', 'true');
		}
	});

	var contact;
	var submitted = 0;
	$(window).on('unload', function(){
         if(submitted == 0) {
         	submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'), 1);
         }
	});
	/*$(window).on("beforeunload", function() {
		if(submitted == 0 && validateContact($('#contact').val())) {
     		submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'));
     	}
		//return confirm'Are you sure you want to leave?';
	});*/

	$('.btn-submit, #short-enquiry-submit').click(function() {
		if($('#name').val().trim() == "") {
			addTooltip('#name', 'Invalid Name', 'top');
			$('#name').focus();
		}else {
			if(!validateName($('#name').val())) {
				addTooltip('#name', 'Invalid Name', 'top');
				$('#name').focus();
			}
			else {
				removeTooltip('#name');
			}
		}
		if($('#contact').val().trim() == "") {
			addTooltip('#contact', 'Email / Mobile is Required', 'bottom');
		}else {
			if(!validateContact($('#contact').val())) {
				addTooltip('#contact', 'Email / Mobile is Required', 'bottom');
			}
			else {
				removeTooltip('#contact');
				showLoading();
				submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'), 0).done(function(data) {
					showSuccess();
					submitted = 1;
				});
			}
		}
	});
	function addTooltip(field, title, pos) {
		$(field).parent().attr({
			'data-toggle':'tooltip',
			'data-placement': pos,
			'data-original-title': title
		});
		$(field).parent().addClass('err-field');
	}
	function removeTooltip(field) {
		$(field).parent().removeAttr('data-placement');
		$(field).parent().removeAttr('data-original-title');
	}

	$('input[type=text]').on('input', function(e) {
		$(this).parent().removeClass('err-field');
		removeTooltip('#'+$(this).attr('id'));
	});
	$('input[type=text]').blur(function() {
		if($(this).val().trim() == "") {
			$(this).parent().addClass('err-field');
		}
	});

	/*Silent Submission Starts*/
	$('#contact').on('input', function() {
		if(validateContact($(this).val())) {
			submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'), 1);
		}
	});
	$('#email').on('input', function() {
		if(validateEmail($(this).val())) {
			submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'), 1);
		}
	});
	/*$('#contact').blur(function() {
		if(validateContact($(this).val())) {
			submitEnquiry($('.btn-submit, #short-enquiry-submit').attr('href'), 1);
		}
	});*/
	/*Silent Submission Ends*/

	$('.modal-close').click(function() {
		location.reload();
	});

	function validateName(name) {
		var name_patt = /^[a-zA-Z]{3,30}(\s[a-zA-Z]{1,30}){0,2}$/;
		return name.match(name_patt);
	}
	function validateContact(contact) {
		var mbno_patt = /^[0-9]{10}$/;
		return contact.match(mbno_patt) == null ? false : true;
	}
	function validateEmail(contact) {
		var email_patt = /^[a-zA-Z0-9]{3,20}(.[a-zA-Z]{1,10})?@([a-zA-Z]{2,6})(\.[a-zA-Z]{2,6}){1,2}$/;
		return contact.match(email_patt) == null ? false : true;
	}
	function submitEnquiry(url, silent) {

		var ec = $('#switch-sm').is(':checked') ? $('[name="ec"]:checked').val() : null;
		var ubm = $('#switch-sm').is(':checked') ? $('[name="ubm"]:checked').val() : null;
		var bmm = $('#switch-sm').is(':checked') ? $('[name="bmm"]:checked').val() : null;
		if(bmm == "3") {
			bmm = $("#input_device_brand").val();
		}
		var sp = $('#switch-sm').is(':checked') ? $('[name="sp"]:checked').val() : null;
		var sr= $('#switch-sm').is(':checked') ? $('[name="sr"]:checked').val() : null;
		var ic = $('#switch-sm').is(':checked') ? $('[name="ic"]:checked').val() : null;
		var caol = $('#switch-sm').is(':checked') ? $('[name="caol"]:checked').val() : null;
		var name = $('[name="name"]').val() == "" ? 'UNKNOWN_NAME' : $('[name="name"]').val();
		var email = $('[name="email"]').val();
		var contact = $('[name="contact"]').val();
		var plan = $('[name="plan-selector"]').val();

		return $.ajax({
			url: url,
			type: "POST",
			data: {
				"ec": ec, 
				"ubm": ubm, 
				"bmm": bmm, 
				"sp": sp, 
				"sr": sr, 
				"ic": ic, 
				"caol": caol, 
				"name": name, 
				"contact": contact,
				"email": email,
				"plan": plan,
				"silent" : silent
			},
			success: function(data) {
				
			}
		});
	}
	function showSuccess() {
		$('#successModal').modal({
			backdrop: 'static',
			keyboard: false
		});
	}
	function showLoading() {
		$('.wait').modal('show', {
			backdrop: 'static',
			keyboard: false
		});
	}
});