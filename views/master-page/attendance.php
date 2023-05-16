<?php $page = "attendance"; include_once("../layout/header.php") ?>

<?php include_once("../layout/nav.php") ?>
<body>
    
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
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="col-3">Employee ID</th>
                                <th class="col-4">Employee Name</th>
                                <th class="col-1">View</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTable"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/attendance.js"></script>
</body>

</html>