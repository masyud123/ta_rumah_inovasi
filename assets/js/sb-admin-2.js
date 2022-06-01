(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  (function() {
  
      var showHide = function( element, field ) {
          this.element = element;
          this.field = field;
          
          this.toggle();    
      };
      
      showHide.prototype = {
          toggle: function() {
              var self = this;
              self.element.addEventListener( "change", function() {
                  if(self.element.checked) {self.field.setAttribute( "type", "text" );}
                  else {self.field.setAttribute( "type", "password" );}
              }, false);
          }
      };
      
      document.addEventListener( "DOMContentLoaded", function() {
          var checkbox = document.querySelector( "#show-hide" ),
              password = document.querySelector( "#password" ),
              form = document.querySelector( "#form" );
              
              form.addEventListener( "submit", function( e ) {
                  e.preventDefault();
              }, false);
              
              var toggler = new showHide( checkbox, password );
      });
      
  })();

})(jQuery); // End of use strict
