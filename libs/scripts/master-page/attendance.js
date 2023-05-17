$(document).ready(function () {
    Attendance.loadTableData();
});
const Attendance = (() => {
    const thisAttendance = {};
    var employeeID = 0;

    $("#printAttendance").click(function () {
        // Open new page
        window.open("../report/employee-attendance.php?employeeId=" + employeeID, "_blank");
    });

    thisAttendance.loadTableData = () => {
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getAllEmployee2',
            data: {
                employee: "Admin",
            },
            dataType: "json",
            success: function (response) {
                $(".table").DataTable().destroy();
                $("#employeeTable").html(response);
                $(".table").DataTable();
            },
            error: function () {

            }

        });
    };

    thisAttendance.view = (employeeId) => {
        employeeID = employeeId;
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getEmployeeAttendanceById',
            data: {
                employeeId: employeeId,
            },
            dataType: "json",
            success: function (response) {
                var fullName = response.result[0]['FULL_NAME'];
                var table_data = response.table_data;
                
                $(".table").DataTable().destroy();
                $("#employeeAttendanceTable").html(table_data);
                $(".table").DataTable();
                $(".modal-title").html(fullName + "  ATTENDANCE");
            },
            error: function () {
                // Handle error
            }
        });

        $("#viewEmployeeAttendanceModal").modal("show");
    };

    thisAttendance.viewSalary = (employeeId) => {
        employeeID = employeeId;
        window.open("../report/employee-salary-per-month.php?employeeId=" + employeeID, "_blank");
    };
    
    return thisAttendance;
})();