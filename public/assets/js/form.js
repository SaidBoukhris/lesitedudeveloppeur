

$(document).ready(function() {
    var panelLogin = $('.form-panel.register').height(),
      panelRegister = $('.form-panel.register')[0].scrollHeight;
  
    $('.form-panel.register').not('.form-panel.register.active').on('click', function(e) {
      e.preventDefault();
  
      $('.form-toggle').addClass('visible');
      $('.form-panel.login').addClass('hidden');
      $('.form-panel.register').addClass('active');
      $('.form').animate({
        'height': panelRegister
      }, 200);
    });
  
    $('.form-toggle').on('click', function(e) {
      e.preventDefault();
      $(this).removeClass('visible');
      $('.form-panel.login').removeClass('hidden');
      $('.form-panel.register').removeClass('active');
      $('.form').animate({
        'height': panelLogin
      }, 200);
    });
  });
  
  