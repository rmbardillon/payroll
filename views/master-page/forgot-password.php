<?php 
    include_once("../layout/header.php");
?>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
        <div class="row">
            <div class="col">
                <h1 class="h3">Forgot password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="">
                    <div class="input-group">
                        <span class="input-group-text">Email</span>
                        <input class="form-control" type="email" id="employeeEmail" placeholder="email@email.com">
                    </div>
                    <button class="btn btn-success mt-3 w-100" type="button" id="forgotPassword">Forgot Password</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/forgot-password.js"></script>
</body>
</html>