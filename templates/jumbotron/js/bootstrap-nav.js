jQuery(function($) {
    AOS.init();
    $(window).resize(function() {
      resizeWindow();
    });
    $(window).load(function() {
      resizeWindow();
    });

    function resizeWindow() {
      var x = screen.width;
      if (x < 751) {
          $('body').addClass("Mobile");
          $('.desktop-menu').attr("id", "menu");
          $('.title-with-menutoggle').remove("#menu");
          $('#menu').removeClass("desktop-menu");
          $('#menu').appendTo($('#menuToggle'));

          /*$('.screenshot-with-frame').css('width',(x-15)+"px");
          $('.screenshot-with-frame').css('height',x+"px");
          $('.screenshot-with-frame').css('background-size',(x-15)+"px", x+"px");*/

      } else {
          $('body').removeClass("Mobile");
          $('#menu').appendTo($('.title-with-menutoggle'));
          $('#menu').addClass("desktop-menu");
          $('.desktop-menu').removeAttr("id");
      }

      /*if(x >= 640 && x < 768) {
          $('.screenshot-with-frame').css('width',"560px");
          $('.screenshot-with-frame').css('height',x+"px");
          $('.screenshot-with-frame').css('background-size',"560px", x+"px");
      }*/

    }
    // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 1);
    });
});