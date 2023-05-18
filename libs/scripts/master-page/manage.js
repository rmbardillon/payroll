$(document).ready(function () {
    Manage.loadTableData();
});
const Manage = (() => {
    const thisManage = {};
    
    let employeeID = "";
    let firstName = ""; 
    let middleName = ""; 
    let lastName = "";
    let birthday = "";
    let gender = "";
    let salary = "";
    let contactNumber = "";
    let emailAddress = "";
    let street = "";
    let barangay = "";
    let municipality = "";
    let province = "";

    $("#addEmployeeModalNext").click(function() {
        firstName = $("#firstName").val();
        middleName = $("#middleName").val();
        lastName = $("#lastName").val();
        birthday = $("#birthday").val();
        gender = $("#gender").val();
        salary = $("#salary").val();
        contactNumber = $("#contactNumber").val();
        emailAddress = $("#emailAddress").val();
        street = $("#street").val();
        barangay = $("#barangay").val();
        municipality = $("#municipality").val();
        province = $("#province").val();
        // Assign value to confirmation modal
        $("#firstNameText").html(firstName);
        $("#middleNameText").html(middleName);
        $("#lastNameText").html(lastName);
        $("#birthdayText").html(birthday);
        $("#genderText").html(gender);
        $("#salaryText").html(salary);
        $("#contactNumberText").html(contactNumber);
        $("#emailAddressText").html(emailAddress);
        $("#streetText").html(street);
        $("#barangayText").html(barangay);
        $("#municipalityText").html(municipality);
        $("#provinceText").html(province);
        $("#addEmployeeModal").modal("hide");
        $("#addEmployeeModalConfirm").modal("show");
    });

    $("#editEmployeeModalNext").click(function() {
        firstName = $("#firstNameEdit").val();
        lastName = $("#lastNameEdit").val();
        contactNumber = $("#contactNumberEdit").val();
        emailAddress = $("#emailAddressEdit").val();
        address = $("#addressEdit").val();
        province = $("#provinceEdit").val();
        birthday = $("#birthdayEdit").val();
        employmentDate = $("#employmentDateEdit").val();

        // Assign value to confirmation modal
        $("#firstNameText").html(firstName);
        $("#lastNameText").html(lastName);
        $("#contactNumberText").html(contactNumber);
        $("#emailAddressText").html(emailAddress);
        $("#addressText").html(address);
        $("#provinceText").html(province);
        $("#birthdayText").html(birthday);
        $("#employmentDateText").html(employmentDate);
        $("#addEmployeeModal").modal("hide");
        $("#editEmployeeModal").modal("hide");
        $("#addEmployeeModalConfirm").modal("show");
    });

    $("#addEmployeeModalBack").click(function() {
        $("#addEmployeeModal").modal("show");
        $("#addEmployeeModalConfirm").modal("hide");
    });

    thisManage.loadTableData = () => {
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getAllEmployee',
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
    
    thisManage.addEmployeeModal = (employeeType) => {
        employee = employeeType;
        $(".modal-title").html("Add " + employeeType);
        $("#addEmployeeModal").modal("show");
    };

    thisManage.addEmployee = () => {
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=saveEmployee',
            data: {
                firstName: firstName,
                middleName: middleName,
                lastName: lastName,
                birthday: birthday,
                gender: gender,
                salary: salary,
                contactNumber: contactNumber,
                emailAddress: emailAddress,
                street: street,
                barangay: barangay,
                municipality: municipality,
                province: province,
            },
            dataType: "json",
            success: function (response) {
                if(response == "Successfully Save") {
                    swal.fire({
                        title: "Success!",
                        text: "Employee successfully added!",
                        icon: "success",
                        confirmButtonText: "Ok"
                    }).then((result) => {
                        if(result.isConfirmed) {
                            // Reload the page
                            location.reload();
                        }
                    });
                }
            },
            error: function () {
            
            }
        });
    };

    thisManage.view = (employeeId) => {
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getEmployeeById',
            data: {
                employeeId: employeeId,
            },
            dataType: "json",
            success: function (response) {
                $("#firstNameView").html(response[0]['FIRST_NAME']);
                $("#middleNameView").html(response[0]['MIDDLE_NAME']);
                $("#lastNameView").html(response[0]['LAST_NAME']);
                $("#birthdayView").html(response[0]['BIRTHDAY']);
                $("#genderView").html(response[0]['GENDER']);
                $("#salaryView").html("₱" + response[0]['SALARY_RATE'] + "/ Day");
                $("#contactNumberView").html(response[0]['CONTACT_NUMBER']);
                $("#emailAddressView").html(response[0]['EMAIL']);
                $("#streetView").html(response[0]['STREET']);
                $("#barangayView").html(response[0]['BARANGAY']);
                $("#municipalityView").html(response[0]['MUNICIPALITY']);
                $("#provinceView").html(response[0]['PROVINCE']);
                $("#viewEmployeeModal").modal("show");
            },
            error: function () {

            }

        });
    };

    thisManage.clickEdit = (employeeId) => {
        employeeID = employeeId;
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=getEmployeeById',
            data: {
                employeeId: employeeId,
            },
            dataType: "json",
            success: function (response) {
                $("#firstNameEdit").val(response[0]['FIRST_NAME']);
                $("#middleNameEdit").val(response[0]['MIDDLE_NAME']);
                $("#lastNameEdit").val(response[0]['LAST_NAME']);
                $("#birthdayEdit").val(response[0]['BIRTHDAY']);
                $("#genderEdit").val(response[0]['GENDER']);
                $("#salaryEdit").val(response[0]['SALARY_RATE']);
                $("#contactNumberEdit").val(response[0]['CONTACT_NUMBER']);
                $("#emailAddressEdit").val(response[0]['EMAIL']);
                $("#streetEdit").val(response[0]['STREET']);
                $("#barangayEdit").val(response[0]['BARANGAY']);
                $("#municipalityEdit").val(response[0]['MUNICIPALITY']);
                $("#provinceEdit").val(response[0]['PROVINCE']);
                $("#editEmployeeModal").modal("show");
            },
            error: function () {

            }

        });
    };

    thisManage.update = () => {
        firstName = $("#firstNameEdit").val();
        middleName = $("#middleNameEdit").val();
        lastName = $("#lastNameEdit").val();
        birthday = $("#birthdayEdit").val();
        gender = $("#genderEdit").val();
        salary = $("#salaryEdit").val();
        contactNumber = $("#contactNumberEdit").val();
        emailAddress = $("#emailAddressEdit").val();
        street = $("#streetEdit").val();
        barangay = $("#barangayEdit").val();
        municipality = $("#municipalityEdit").val();
        province = $("#provinceEdit").val();
        $.ajax({
            type: "POST",
            url: EMPLOYEE_CONTROLLER + '?action=updateEmployee',
            data: {
                employeeId: employeeID,
                firstName: firstName,
                middleName: middleName,
                lastName: lastName,
                birthday: birthday,
                gender: gender,
                salary: salary,
                contactNumber: contactNumber,
                emailAddress: emailAddress,
                street: street,
                barangay: barangay,
                municipality: municipality,
                province: province,
            },
            dataType: "json",
            success: function (response) {
                if(response == "Successfully Update") {
                    swal.fire({
                        title: "Success!",
                        text: "Employee successfully updated!",
                        icon: "success",
                        confirmButtonText: "Ok"
                    }).then((result) => {
                        if (result.value) {
                            thisManage.loadTableData();
                            $("#editEmployeeModal").modal("hide");
                        }
                    });
                }
            }
        })
    };

    thisManage.delete = (employeeId) => {
        swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton:true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel it!"
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: EMPLOYEE_CONTROLLER + '?action=deleteEmployee',
                    data: {
                        employeeId: employeeId,
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response == "Successfully Delete") {
                            swal.fire({
                                title: "Success!",
                                text: "Employee successfully deleted!",
                                icon: "success",
                                confirmButtonText: "Ok"
                            }).then((result) => {
                                if (result.value) {
                                    thisManage.loadTableData();
                                }
                            });
                        }
                    },
                    error: function () {
                    
                    }
                });
            }
        });
    };
    return thisManage;
})();