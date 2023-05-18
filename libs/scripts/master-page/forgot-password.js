$(document).ready(function () {
    $("#forgotPassword").click(function() {
        var email = $("#employeeEmail").val();

        if(email == "") {
            swal.fire({
                title: "Error!",
                text: "Please enter your email!",
                icon: "error",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#employeeEmail").focus();
                }
            })
            return;
        }

        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + "?action=forgotPassword",
            data: {
                email: email
            },
            dataType: "json",
            success: function (response) {
                if(response == "Successfully Updated") {
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
                } else {
                    swal.fire({
                        title: "Error!",
                        text: "Please enter your valid email that is registered in the system!",
                        icon: "error",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#3085d6",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#employeeEmail").focus();
                        }
                    })
                }
            }
        })
    });
});