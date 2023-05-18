<?php $page = "attendance"; include_once("../layout/header.php") ?>

<?php include_once("../layout/nav.php") ?>
<body>
    <div id="viewEmployeeAttendanceModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Attendance</h4>
                    <button class="btn btn-success" type="button" id="printAttendance">Print Attendance</button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-2">No.</th>
                                <th class="col-2">Date</th>
                                <th class="col-2">Time In</th>
                                <th class="col-2">Time Out</th>
                                <th class="col-2">Total Hours</th>
                            </tr>
                        </thead>
                        <tbody id="employeeAttendanceTable"></tbody>
                    </table>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <h1>Employees Attendance</h1>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Employees</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="col-3">Employee ID</th>
                            <th class="col-4">Employee Name</th>
                            <th class="col-2">View</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTable"></tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/attendance.js"></script>
</body>

</html>