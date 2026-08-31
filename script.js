$(document).ready(function () {
  $('#login-form').submit(function (e) {
    /*page was reloading on submit, so nothing ever showed*/
    e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();
    var isValid = true;

    if (email == '') {
      /*email-error was wrongly written as email-eror */
      $('#email-error').show().text('Email is required');
      isValid = false;
    }
    if (password.length < 6) {
      /* matches the message (min 6 chars) was previously 5 */
      $('#password-error').show().text('Password must be at least 6 characters');
      isValid = false;
    }

    if (isValid) {
      $('#status-box').text('Form validated successfully.');
    }
  });
});