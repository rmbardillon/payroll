$(document).ready(function () {
    Home.loadTableData();
});
const Home = (() => {
    const thisHome = {};

    thisHome.loadTableData = () => {
        $.ajax({
            type: "POST",
            url: ATTENDANCE_CONTROLLER + '?action=getAllPresentEmployees',
            dataType: "json",
            success: function (response) {
                $(".table").DataTable().destroy();
                $("#employeeAttendanceTable").html(response);
                $(".table").DataTable();
            },
            error: function () {

            }

        });
        $.ajax({
            type: "POST",
            url: ATTENDANCE_CONTROLLER + '?action=getTotalPresentEmployees',
            dataType: "json",
            success: function (response) {
                $("#totalPresent").html("Total: "+ response);
            },
            error: function () {

            }

        });
    };
    
    return thisHome;
})();