$(document).ready(function () {

    Admin.loadTableData();

    $('.btn').click(function (event) {
        event.preventDefault()
    })

});


const Admin = (() => {
    
     var username;
    $("#txt_newpassword").keyup(function() {
        $("#password-requirements").show();
        $("#txt_newpassword").css("border-color", "red");
        // Get the password value
        var password = $(this).val();
        var requirementsMet = true;

        // Check password length
        if (password.length < 8) {
            $("#pass-length").addClass("invalid");
            $("#pass-length").removeClass("valid");
            $("#length").prop('checked', false);
            requirementsMet = false;
        } else {
            $("#pass-length").removeClass("invalid");
            $("#pass-length").addClass("valid");
            $("#length").prop('checked', true);
        }

        // Check for uppercase letter
        if (!/[A-Z]/.test(password)) {
            $("#pass-uppercase").addClass("invalid");
            $("#pass-uppercase").removeClass("valid");
            $("#uppercase").prop('checked', false);
            requirementsMet = false;
        } else {
            $("#pass-uppercase").removeClass("invalid");
            $("#pass-uppercase").addClass("valid");
            $("#uppercase").prop('checked', true);
        }

        // Check for lowercase letter
        if (!/[a-z]/.test(password)) {
            $("#pass-lowercase").addClass("invalid");
            $("#pass-lowercase").removeClass("valid");
            $("#lowercase").prop('checked', false);
            requirementsMet = false;
        } else {
            $("#pass-lowercase").removeClass("invalid");
            $("#pass-lowercase").addClass("valid");
            $("#lowercase").prop('checked', true);
        }

        // Check for digit
        if (!/\d/.test(password)) {
            $("#pass-digit").addClass("invalid");
            $("#pass-digit").removeClass("valid");
            $("#digit").prop('checked', false);
            requirementsMet = false;
        } else {
            $("#pass-digit").removeClass("invalid");
            $("#pass-digit").addClass("valid");
            $("#digit").prop('checked', true);
        }

        // Check for special character
        if (!/[!@#$%^&*]/.test(password)) {
            $("#pass-specialchar").addClass("invalid");
            $("#pass-specialchar").removeClass("valid");
            $("#specialchar").prop('checked', false);
            requirementsMet = false;
        } else {
            $("#pass-specialchar").removeClass("invalid");
            $("#pass-specialchar").addClass("valid");
            $("#specialchar").prop('checked', true);
        }

        if(requirementsMet) {
            $("#password-requirements").hide();
            $("#txt_newpassword").css("border-color", "green");
        }
    });

    $("#txt_confirm_password").keyup(function() {
        var password = $("#txt_newpassword").val();
        var confirm_password = $("#txt_confirm_password").val();
        if (password == confirm_password) {
            $("#txt_confirm_password").css("border-color", "green");
            $(".error-message").text("");
        } else {
            $("#txt_confirm_password").css("border-color", "red");
            $(".error-message").text("Password does not match");
        }
    });

    const thisAdmin = {};

    let toUpdate = false;
    let user_id = '';

    thisAdmin.loadTableData = () => {
        $.ajax({
            type: "GET",
            url: USER_CONTROLLER + '?action=getAllAdmin',
            dataType: "json",
            success: function (response) {
                $('.table').DataTable().destroy();
                $('#adminTable').html(response);
                $('.table').DataTable({
                    columnDefs: [{
                        targets: 'no-sort',
                        orderable: false
                    }]
                });
            },
            error: function () {

            }
        });
    }

    thisAdmin.clickSaveButton= () => {
        if(!toUpdate) {
            thisAdmin.save()
        }
        else {
            thisAdmin.update()
        }
    }

    thisAdmin.save = () => {
        var first_name = $('#txt_first_name').val();
        var last_name = $('#txt_last_name').val();
        var email = $('#txt_email').val();
        var password = $('#txt_newpassword').val();
        var username = ("admin" + first_name[0] + last_name).toLowerCase();

        if (first_name == "" || last_name == "" || password == "" || email == "") {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Please fill out all fields',
                showConfirmButton: false,
            })
        } else {
            $.ajax({
                type: "POST",
                url: USER_CONTROLLER + "?action=registerUser",
                dataType: "json",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    password: password,
                    username: username
                },
                success: function (response) 
                {
                    if(response == "Successfully Save") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'User successfully saved',
                            showConfirmButton: false,
                        })
                        setTimeout(function() {
                            window.location.href = "admin.php";
                        }, 1000);
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: response,
                            showConfirmButton: false,
                        })
                    }
                },
                error: function () {
                    
                }
            });
        } 
    }

    thisAdmin.clickUpdate = (id) => {
        user_id = id;

        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + '?action=getById',
            dataType: "json",
            data:{
                user_id: user_id
            },
            success: function (response) 
            {
                $('#txt_first_name').val(response.FIRST_NAME);
                $('#txt_last_name').val(response.LAST_NAME);
                $('#txt_email').val(response.EMAIL);
                $('#txt_newpassword').hide()
                $('#txt_confirm_password').hide()
                $('#pwd').hide()
                $('#confirmPwd').hide()
                
                toUpdate = true;

                $('#btn_save').html("Update Account");
                $('#lbl_title').html("Update Account");
            },
            error: function () {

            }
        });

    }

    thisAdmin.update = () => {
        const first_name = $('#txt_first_name').val();
        const last_name = $('#txt_last_name').val();
        const email = $('#txt_email').val();


        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + '?action=update',
            dataType: "json",
            data:{
                user_id: user_id,
                first_name: first_name,
                last_name: last_name,
                email: email,
            },
            success: function (response) 
            {
                thisAdmin.resetFields();
                thisAdmin.loadTableData();
                toUpdate = false;
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'User updated successfully',
                    showConfirmButton: true,
                })
            },
            error: function () {

            }
        }); 
    }

    thisAdmin.clickDelete = (id) => {
        user_id = id;

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                thisAdmin.delete(user_id);
            }
        })
    }

    thisAdmin.delete = (user_id) => {
        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + '?action=deleteAdmin',
            dataType: "json",
            data:{
                user_id: user_id
            },
            success: function (response) 
            {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'User account was deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                thisAdmin.resetFields();
                thisAdmin.loadTableData();
            },
            error: function () {

            }
        }); 
    }

    thisAdmin.clickResetPassword = (id) => {
        user_id = id
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update to Default Password!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                thisAdmin.resetPassword();
            }
        })
    }

    thisAdmin.resetPassword = () => {

        $.ajax({
            type: "POST",
            url: USER_CONTROLLER + '?action=resetPassword',
            dataType: "json",
            data:{
                user_id: user_id
            },
            success: function (response) 
            {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Password Reset Successfully ',
                    showConfirmButton: false,
                    timer: 1500
                })
                thisAdmin.resetFields();
                thisAdmin.loadTableData();
            },
            error: function () {

            }
        }); 
    }


    thisAdmin.resetFields = () => {
        $('#txt_first_name').val("");
        $('#txt_last_name').val("");
        $('#txt_email').val("");
        $('#txt_newpassword').val("");
        $('#txt_confirm_password').val("");
        $('#txt_newpassword').show()
        $('#txt_confirm_password').show()
        $('#pwd').show()
        $('#confirmPwd').show()

        $('.form-control').prop("disabled", false);

        $('#btn_save').html("Create Account");
        $('#lbl_title').html("Create Account");
    }

    return thisAdmin;
})();