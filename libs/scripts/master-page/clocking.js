$(document).ready(function () {
    $("#timeIn").click(function () {
        var employeeNumber = $("#employeeNumber").val();

        $.ajax({
            type: "POST",
            url: CLOCKING_CONTROLLER + "?action=timeIn",
            data: { 
                employeeNumber: employeeNumber,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data == "Employee is already timed in") {
                    swal.fire({
                        title: "Error!",
                        text: "Employee is already timed in.",
                        icon: "error",
                        confirmButtonText: "Okay"
                    }).then((result) => {
                        location.reload();
                    });
                } else if(data == "Successfully Saved") {
                    swal.fire({
                        title: "Success!",
                        text: "You have successfully clocked in.",
                        icon: "success",
                        confirmButtonText: "Okay"
                    }).then((result) => {
                        location.reload();
                    });
                }
            }, 
            error: function (data) {
                swal.fire({
                    title: "Error!",
                    text: "Employee Number not found.",
                    icon: "error",
                    confirmButtonText: "Okay"
                }).then((result) => {
                    location.reload();
                });
            }
        });
    });

    $("#timeOut").click(function () {
        var employeeNumber = $("#employeeNumber").val();

        $.ajax({
            type: "POST",
            url: CLOCKING_CONTROLLER + "?action=timeOut",
            data: { 
                employeeNumber: employeeNumber,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data == "Employee does not timed In") {
                    swal.fire({
                        title: "Error!",
                        text: "Employee needs to time in first.",
                        icon: "error",
                        confirmButtonText: "Okay"
                    }).then((result) => {
                        location.reload();
                    });
                } else if(data == "Successfully Saved") {
                    swal.fire({
                        title: "Success!",
                        text: "You have successfully clocked out.",
                        icon: "success",
                        confirmButtonText: "Okay"
                    }).then((result) => {
                        location.reload();
                    });
                }
            }, 
            error: function (data) {
                swal.fire({
                    title: "Error!",
                    text: "Employee Number not found.",
                    icon: "error",
                    confirmButtonText: "Okay"
                }).then((result) => {
                    location.reload();
                });
            }
        });
    });
});