$(document).ready(function () {
    $('#show-password').click(function() {
        if ($(this).is(':checked')) {
            $('#password').attr('type', 'text');
            $(this).next('label').text('Hide Password');
        } else {
            $('#password').attr('type', 'password');
            $(this).next('label').text('Show Password');
        }
    });
    
    $("#login").click(function(event) {
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == '' || password == '') {
            swal.fire({
                title: "Error!",
                text: "Please enter username and password",
                icon: "error",
                confirmButtonText: "OK"
            });
        } else {
            $.ajax({
                type: "POST",
                url: LOGIN_CONTROLLER + "?action=login",
                data: {
                    username: username,
                    password: password
                },
                success: function (data) {
                    if (data == "true") {
                        window.location.href = "home.php";
                    } else {
                        swal.fire({
                            title: "Error!",
                            text: "Username or password is incorrect",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function (data) {
                    alert("Error: " + data);
                }
            });
        }
    });
});