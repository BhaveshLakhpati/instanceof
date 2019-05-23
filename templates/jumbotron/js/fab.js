jQuery(function($) {
    $(document).ready(function(){

        //$("body").tooltip({ selector: '[data-toggle=tooltip]' });

        /*$('.url-to-div').each(function(index, elem) {
            var span = "<li><span href=\"#"+$(elem).attr('id')+"\">"+$(elem).attr('title')+"</span><li>";
            $('.floatingMenu').append(span);
        });*/

        $('#close-btn').click(function() {
            togglePlusButton();
        });

        function togglePlusButton() {
            $('.floatingButton').toggleClass('open');
            $('.bak').toggleClass('overlay');
        }

        $('.floatingButton').on('click',
            function(e){
                e.preventDefault();
                togglePlusButton();
            }
        );
        $(this).on('click', function(e) {
            var container = $(".floatingButton");
            if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) {
                if(container.hasClass('open'))
                    togglePlusButton();
            }
        });
        
        // $('.floatingMenu span').click(function() {
        //     console.log($('.featured_product').offset());
        //     $('html, body').animate({
        //         scrollTop: $($(this).attr('href')).offset().top
        //     }, 0);
        //     togglePlusButton();
        // });

        /*FORM METHODS START*/
        /*$('#short-enquiry-submit').click(function() {
            if(validateName($("#fab-name").val())) {
                if(validateEmail($("#fab-email").val())) {
                    if(validateMbno($("#fab-contact").val())) {
                        submitShortInquiry('http://localhost/joomla-4/enquiry');
                    }else
                        $('#fab-contact').focus();
                }else
                    $('#fab-email').focus();
            }else
                $('#fab-name').focus();
        });
        $('[id="fab-name"]').blur(function() {
            if(!validateName($(this).val()))
                addTooltip('#fab-name', 'Name should be at least 3 Characters Long.', 'right');
            else
                removeErrField('#fab-name');
        });
        $('[id="fab-email"]').blur(function() {
            if(!validateEmail($(this).val()))
                addTooltip('#fab-email', 'Invalid Email Format.', 'right');
            else
                removeErrField('#fab-email');
        });
        $('[id="fab-contact"]').blur(function() {
            if(!validateMbno($(this).val()))
                addTooltip('#fab-contact', 'Mobile number should contain 10 Digits.', 'right');
            else
                removeErrField('#fab-contact');
        });
        function removeErrField(field) {
            $(field).parent().removeClass('err-field');
        }
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
        function validateName(name) {
            var name_patt = /^[a-zA-Z]{3,30}(\s[a-zA-Z]{1,30}){0,2}$/;
            return name.match(name_patt);
        }
        function validateEmail(email) {
            var email_patt = /^[a-zA-Z0-9]{3,20}(.[a-zA-Z]{1,10})?@([a-zA-Z]{2,6})(\.[a-zA-Z]{2,6}){1,2}$/;
            return email.match(email_patt) == null ? false : true;
        }
        function validateMbno(contact) {
            var mbno_patt = /^[0-9]{10}$/;
            return contact.match(mbno_patt) == null ? false : true;
        }
        function submitShortInquiry(url) {
            showLoading();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    name: $('#fab-name').val(),
                    email: $('#fab-email').val(),
                    mobile: $('#fab-contact').val(),
                },
                success: function(data) {
                    jsonData = JSON.parse(data);
                    if(jsonData['status'] == 200) {
                        showSuccess();
                    }
                }
            });
        }
        function showHideWait(span, label) {
            $('.fab-wait').find('span').remove();
            $('.fab-wait').find('label').text(label);
            $('.fab-wait .modal-content').append(span);
        }
        function showSuccess() {
            togglePlusButton();
            var span = '<span class="fa fa-check-circle-o fa-5x" style="color: green;"></span>';
            var label = 'Thanks You, our team will get back to you soon.';
            showHideWait(span, label);
            $('.form-label-group > input').val('');
            setTimeout(function() {
                var label = 'Please wait...';
                var span = '<span class="fa fa-spinner fa-spin fa-3x" style="color: white;"></span>';
                showHideWait(span, label);
                $('.fab-wait').modal('hide');
            }, 4000);
        }
        function showLoading() {
            $('.fab-wait').modal('show', {
                backdrop: 'static',
                keyboard: false
            });
        }*/
        /*FORM METHODS ENDS*/

    });
});