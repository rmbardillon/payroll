$(document).ready(function () {
    Attendance.loadTableData();
});
const Attendance = (() => {
    const thisAttendance = {};

    thisManage.loadTableData = () => {
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getAllEmployee',
            data: {
                employee: "Admin",
            },
            dataType: "json",
            success: function (response) {
                $(".table").DataTable().destroy();
                $("#adminTable").html(response);
                $(".table").DataTable();
            },
            error: function () {

            }

        });
    };
    
    return thisAttendance;
})();