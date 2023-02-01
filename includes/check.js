$(document).ready(function() {

    $('.checking_email.').keyup(function(e) {


        var email = $('.checking_email.').val();


        $.ajax({
            type: "POST",
            url: "signup.php",
            data: {
                "check_submit_btn": 1,
                "user_email": email,
            },

            success: function(response) {
                alert(email);

            }
        });

    });
});