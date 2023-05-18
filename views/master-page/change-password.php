<?php include_once("../layout/header.php") ?>
<?php 
    $page = "Profile";
    if(!$_SESSION['user']) {
        header("Location: login.php"); 
    }
?>
    <?php include_once("../layout/nav.php") ?>
<body>
    <div class="container mt-5">
        <h1>Change Password</h1>
        <form>
            <input type="hidden" id="username" value="<?php echo($_SESSION['user']['ADMINISTRATOR_ID']); ?>">
            <div class="form-group">
                <label class="form-label" for="oldPassword">Old Password</label>
                <input type="password" class="form-control" id="oldPassword" placeholder="Old Password" autofocus>
                <span class="text-danger" id="oldPasswordError"></span>
            </div>
            <div class="form-group">
                <label class="form-label" for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                <span class="text-danger" id="newPasswordError"></span>
                <div id="password-strength-container">
                    <div id="password-strength-meter"></div>
                    <div id="password-strength-text"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="confirmPassword">Re-type New Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                <span class="text-danger" id="confirmPasswordError"></span>
            </div>
            <button type="button" class="btn btn-primary mt-3 w-100" onclick="changePassword.changePassword();">Submit</button>
        </form>
    </div>
<?php include_once("../layout/scripts.php") ?>
<script src="../../libs/scripts/master-page/change-password.js"></script>
</body>
</html>