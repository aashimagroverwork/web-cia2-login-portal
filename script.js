$(document).ready(function () {
  /* '-' was missing */
  $('#login-form').submit(function (e) {

  /* prevents the form from refreshing so that we are able to see the validation messages */
  e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();
    var isValid = true;

    if (email == '') {
      /* 'error' spelling is wrong so the message would never display */
      $('#email-error').show().text('Email is required');
      isValid = false;
    }
    /* the error message says atleast six characters so length should be less than 6 not 5 */
    if (password.length < 6) {
      $('#password-error').show().text('Password must be at least 6 characters');
      isValid = false;
    }

    if (isValid) {
      $('#status-box').text('Form validated successfully.');
    }
  });
});
