$(document).ready(function () {
    $("#forgotPassword").click(function() {
        var email = $("#employeeEmail").val();
        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + "?action=forgotPassword",
            data: {
                email: email
            },
            success: function (response) {
                swal.fire({
                    title: "Success!",
                    text: "New Password has been sent to your email!",
                    icon: "success",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#3085d6",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                    }
                })
            }
        })
    });
});