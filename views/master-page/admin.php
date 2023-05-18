<?php $page = "admin"; include_once("../layout/header.php") ?>

<?php include_once("../layout/nav.php") ?>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col col-8">
                <div class="user__table-wrapper">
                    <h2 class="section__sub-title">List of Accounts</h2>

                    <div class="table-wrapper">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-4">Name</th>
                                    <th class="col-3">Email</th>
                                    <th class="col-2">Username</th>
                                    <th class="col-2 no-sort">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="adminTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="user__form-wrapper">
                    <h2 class="section__sub-title" id="lbl_title">Create Account</h2>
                    <form class="row g-3" novalidate>
                        <div class="col-md-12">
                            <label for="txt_first_name" class="form-label required">First Name</label>
                            <input type="text" class="form-control" id="txt_first_name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="txt_last_name" class="form-label required">Last Name</label>
                            <input type="text" class="form-control" id="txt_last_name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="txt_email" class="form-label required">Email</label>
                            <input type="email" class="form-control" id="txt_email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="txt_newpassword" class="form-label required" id="pwd">Password</label>
                            <input type="password" class="form-control" id="txt_newpassword" required>
                            <div id="password-requirements" style="display: none;">
                                <input type="checkbox" id="length" disabled><span id="pass-length">At least 8 characters</span><br>
                                <input type="checkbox" id="uppercase" disabled><span id="pass-uppercase">Contains at least one uppercase letter</span><br>
                                <input type="checkbox" id="lowercase" disabled><span id="pass-lowercase">Contains at least one lowercase letter</span><br>
                                <input type="checkbox" id="digit" disabled><span id="pass-digit">Contains at least one number</span><br>
                                <input type="checkbox" id="specialchar" disabled><span id="pass-specialchar">Contains at least one special character</span><br>
                            </div>
                            <div id="password-validation"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="txt_confirm_password" class="form-label required" id="confirmPwd">Confirm Password</label>
                            <input type="password" class="form-control" id="txt_confirm_password" required>
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-12">
                            <div id="error-message" class='text-danger'></div>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="btn_save" onclick="Admin.clickSaveButton()" class="btn form-control btn-primary">Register User</button>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="btn_cancel" onclick="Admin.resetFields()" class="btn form-control btn-warning">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/admin.js" ></script>
</body>
</html>