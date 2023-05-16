<?php 
    $page = "clocking";
    include_once("../layout/header.php");
    if(!isset($_SESSION['user'])) {
        header("Location: login.php"); 
    } 
?>

<?php include_once("../layout/nav.php") ?>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
        <div class="row">
            <div class="col">
                <h1 class="h3">Employee Clock</h1>
            </div>
            <div class="col">
                <h1 id="currentDate" class="h6"></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="">
                    <div class="input-group">
                        <span class="input-group-text">Employee Number</span>
                        <input class="form-control" type="text" id="employeeNumber" maxlength="6" autofocus="">
                        <button class="btn btn-success" type="button" id="timeIn">Time In</button>
                        <button class="btn btn-danger" type="button" id="timeOut">Time Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/clocking.js"></script>
</body>
</html>