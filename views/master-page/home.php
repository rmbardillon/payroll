<?php 
    include_once("../layout/header.php");
    $page = "home";
    if(!isset($_SESSION['user'])) {
        header("Location: login.php"); 
    } 
?>

<?php include_once("../layout/nav.php") ?>
<body>
    <div class="container p-3">
        <h1>Attendance Today</h1>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4>Present Employees</h4>
                            </div>
                            <div class="col">
                                <h4 id="totalPresent" class="text-end">Total: 2</h4>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">Employee ID</th>
                                    <th class="col-4">Employee Name</th>
                                    <th class="col-1">Time In</th>
                                    <th class="col-1">Time Out</th>
                                    <th class="col-1">Total Hours</th>
                                    <th class="col-1">Salary</th>
                                </tr>
                            </thead>
                            <tbody id="employeeAttendanceTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/home.js"></script>
</body>
</html>