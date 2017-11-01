(function ($, root, undefined) {
  
 $(function () {
  'use strict';
   $("#menu-bars").click( function() {
     $("nav.nav").fadeToggle();
   });
 
   $(window).resize(function () {
     $("nav.nav").css('display', '');
   });
 });
  
})(jQuery, this);