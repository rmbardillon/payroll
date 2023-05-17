$(document).ready(function() {
    $("#selectMonth").change(function(){
        // Get the selected month
        var selectedMonth = $(this).val();
        
        // Get the current year
        var currentYear = new Date().getFullYear();
        
        // Create a date object for the first day of the selected month
        var fromDate = new Date(currentYear, selectedMonth-1, 1);
        
        // Create a date object for the last day of the selected month
        var toDate = new Date(currentYear, selectedMonth, 0);
        
        // Format the dates as strings in the format yyyy-mm-dd
        var fromDateString = fromDate.getFullYear() + "-" + (fromDate.getMonth()+1).toString().padStart(2, '0') + "-" + fromDate.getDate().toString().padStart(2, '0');
        var toDateString = toDate.toISOString().substring(0, 10);
        
        // Set the values of the date inputs
        $("#from").val(fromDateString);
        $("#to").val(toDateString);
    });


    $("#generateReport").click(function() {
        var fromDate = $("#from").val();
        var toDate = $("#to").val();
        var selectReport = $("#selectReport").val();

        if(fromDate == "" || toDate == "" || selectReport == null) {
            swal.fire({
                title: "Error!",
                text: "Please select all fields",
                icon: "error",
                confirmButtonText: "OK"
            });
        } else {
            if(selectReport == "1") {
                $.ajax({
                    url: REPORT_CONTROLLER + "?action=1",
                    type: "POST",
                    data: {
                        fromDate: fromDate,
                        toDate: toDate
                    },
                    success: function(data) {
                        console.log(data);
                        if(data == "[]") {
                            swal.fire({
                                title: "Error!",
                                text: "No data found",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        } else {
                            window.open("../report/employee-salary.php?from=" + fromDate + "&to=" + toDate, "_blank");
                        }
                    },
                    error: function() {
                        swal.fire({
                            title: "Error!",
                            text: "Something went wrong",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                })
            }
        }
    });

    $("#from, #to").change(function() {
        var fromDate = $("#from").val();
        var toDate = $("#to").val();
        if(fromDate != "" && toDate != "") {
            if (fromDate > toDate) {
                swal.fire({
                    title: "Error!",
                    text: "From date must be less than to date",
                    icon: "error",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#from").val("");
                        $("#to").val("");
                    }
                });
            } else {
                console.log("fromDate < toDate");
            }
        }
    });
});