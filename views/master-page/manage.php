<?php $page = "manage"; include_once("../layout/header.php") ?>

<?php include_once("../layout/nav.php") ?>
<body>
    <div id="addEmployeeModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="firstName" class="form-control" type="text" placeholder="First Name" /><label class="form-label">First Name</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="middleName" class="form-control" type="text" placeholder="Middle Name" /><label class="form-label">Middle Name</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="lastName" class="form-control" type="text" placeholder="Last Name" /><label class="form-label">Last Name</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="birthday" class="form-control" type="date" /><label class="form-label">Birthdate</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label class="form-label">Please Select Gender</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="salary" class="form-control" type="text" placeholder="Salary Rate"><label class="form-label">Salary Rate</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="contactNumber" class="form-control" type="text" placeholder="Contact Number" /><label class="form-label">Contact Number</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="emailAddress" class="form-control" type="email" placeholder="Email Address" /><label class="form-label">Email Address</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="street" class="form-control" type="text" placeholder="Street" /><label class="form-label">Street</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="barangay" class="form-control" type="text" placeholder="Barangay" /><label class="form-label">Barangay</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="municipality" class="form-control" type="text" placeholder="Municipality" /><label class="form-label">Municipality</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="province" class="form-control" type="text" placeholder="Province" /><label class="form-label">Province</label></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success" id="addEmployeeModalNext" type="button">Next</button></div>
            </div>
        </div>
    </div>
    <div id="addEmployeeModalConfirm" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">First Name </strong><span id="firstNameText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Middle Name </strong><span id="middleNameText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Last Name </strong><span id="lastNameText" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Birthday </strong><span id="birthdayText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Gender </strong><span id="genderText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Salary </strong><span id="salaryText" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Contact Number </strong><span id="contactNumberText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Email Address </strong><span id="emailAddressText" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Street </strong><span id="streetText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Barangay </strong><span id="barangayText" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Municipality </strong><span id="municipalityText" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Province </strong><span id="provinceText" style="font-size: 16.8px;">Text</span></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" id="addEmployeeModalBack" type="button">Back</button><button class="btn btn-success" type="button" onclick="Manage.addEmployee();">Save</button></div>
            </div>
        </div>
    </div>
    <div id="viewEmployeeModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Employee</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">First Name </strong><span id="firstNameView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Middle Name </strong><span id="middleNameView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Last Name </strong><span id="lastNameView" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Birthday </strong><span id="birthdayView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Gender </strong><span id="genderView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Salary </strong><span id="salaryView" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Contact Number </strong><span id="contactNumbeViewt" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Email Address </strong><span id="emailAddressView" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Street </strong><span id="streetView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Barangay </strong><span id="barangayView" style="font-size: 16.8px;">Text</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Municipality </strong><span id="municipalityView" style="font-size: 16.8px;">Text</span></div>
                            <div class="col"></div>
                            <div class="col text-truncate"><strong style="font-size: 16.8px;">Province </strong><span id="provinceView" style="font-size: 16.8px;">Text</span></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div id="editEmployeeModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="firstNameEdit" class="form-control" type="text" placeholder="First Name" /><label class="form-label">First Name</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="middleNameEdit" class="form-control" type="text" placeholder="Middle Name" /><label class="form-label">Middle Name</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="lastNameEdit" class="form-control" type="text" placeholder="Last Name" /><label class="form-label">Last Name</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="birthdayEdit" class="form-control" type="date" /><label class="form-label">Birthdate</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select name="gender" id="genderEdit" class="form-select">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label class="form-label">Please Select Gender</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="salaryEdit" class="form-control" type="text" placeholder="Salary Rate"><label class="form-label">Salary Rate</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="contactNumberEdit" class="form-control" type="text" placeholder="Contact Number" /><label class="form-label">Contact Number</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="emailAddressEdit" class="form-control" type="email" placeholder="Email Address" /><label class="form-label">Email Address</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="streetEdit" class="form-control" type="text" placeholder="Street" /><label class="form-label">Street</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="barangayEdit" class="form-control" type="text" placeholder="Barangay" /><label class="form-label">Barangay</label></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating"><input id="municipalityEdit" class="form-control" type="text" placeholder="Municipality" /><label class="form-label">Municipality</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating"><input id="provinceEdit" class="form-control" type="text" placeholder="Province" /><label class="form-label">Province</label></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success" onclick="Manage.update();" type="button">Update</button></div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <h1>Registered Employees</h1>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h4>Admin</h4>
                        </div>
                        <div class="col text-end p-2"><a class="btn btn-primary addEmployee" role="button" style="background: rgb(45,49,146);border-radius: 5px;width: 140.3px;height: 40px;" onclick="Manage.addEmployeeModal('Employee');"><i class="fas fa-user-plus" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">Add Employee</span></a></div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="col-3">Employee ID</th>
                            <th class="col-3">Employee Name</th>
                            <th class="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="adminTable">
                        <!-- <tr>
                            <td>Romeo Jr Bardillon</td>
                            <td>a68slk9287fdc</td>
                            <td>Admin</td>
                            <td><button class="btn btn-primary me-3" type="button"><i class="far fa-eye" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">View</span></button>
                            <button class="btn btn-success me-3" type="button"><i class="far fa-edit" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">Edit</span></button>
                            <button class="btn btn-danger me-3" type="button"><i class="far fa-trash-alt" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">Delete</span></button></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include_once("../layout/scripts.php") ?>
    <script src="../../libs/scripts/master-page/manage.js"></script>
</body>

</html>