$(document).ready(function () {
  $('#loginform').submit(function (e) {

    var email = $('#email').val();
    var password = $('#password').val();
    var isValid = true;

    if (email == '') {
      $('#email-eror').show().text('Email is required');
      isValid = false;
    }
    if (password.length < 5) {
      $('#password-error').show().text('Password must be at least 6 characters');
      isValid = false;
    }

    if (isValid) {
      $('#status-box').text('Form validated successfully.');
    }
  });
});
