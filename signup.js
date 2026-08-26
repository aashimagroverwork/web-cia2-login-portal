$(document).ready(function() {

    $("#signup-btn").click(function(e) {
    e.preventDefault();



    var fullname = $('#fullname').val();
    var email = $('#signup-email').val();
    var password = $('#signup-password').val();
    var confirmPassword = $('#confirm-password').val();

    var isValid = true;

    $('#fullname-error').text('');
    $('#signup-email-error').text('');
    $('#signup-password-error').text('');
    $('#confirm-password-error').text('');

if(fullname === "") {
    $('#fullname-error').text('full name is required')
    isValid = false;
}


if(email === "" ) {
    $('#signup-email-error').text("Enter email!");
    isValid = false;

} else if (!email.includes("@")  || !email.includes(".")  ) {
    $("#signup-email-error").text("please enter correct format");
    isValid = false;
}


if(password === "") {
    $('#signup-password-error').text("enter password");
    isValid = false;
}
else if(password.length<6){
    $('#signup-password-error').text("Password should be atleast 6 characters");
    isValid = false;
}

else if (confirmPassword === "") {
    $("#confirm-password-error").text("Please confirm your password");
    isValid = false;
}

else if(confirmPassword !== password) {
    $('#confirm-password-error').text("password does not match !");
    isValid = false;
}


if(isValid) {

$.ajax({
    url : "signup.php",
    type : "POST",

    data: {
        fullname: fullname,
        email: email,
        password: password
    },

success: function(response) {
    $("#signup-status").text(response.message);
},

error:function () {
    $("#signup-status").text("something went wrong");
}

});

}



    });
});