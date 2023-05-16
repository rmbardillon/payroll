<script src="../../libs/plugins/jquery/jquery-3.6.1.min.js"></script>
<script src="../../libs/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../libs/plugins/datatables/dataTables.bootstrap5.min.js"></script>
<script src="../../libs/plugins/chart.js/chart.js"></script>
<script src="../../libs/plugins/select2/js/select2.full.min.js"></script>
<script src="../../libs/plugins/sweetalert/sweetalert.all.min.js"></script>
<script src="../../libs/plugins/sha1/src/sha1.js"></script>
<script src="../../libs/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="../../config/system_name.js"></script>
<script src="../../libs/scripts/vars.js"></script>
<script>
    $(document).on('keyup change', 'input[type="text"]:not(.password[type="text"]),textarea', function() {
        $(this).val($(this).val().toUpperCase());
    });
    
    $(document).on('keypress', '.numbers', function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    
    $(document).on('keyup', '.telephone', function() {
        if ($(this).val().length > 11) {
            $(this).val($(this).val().substring(0, 11));
        }
    });
    
    function updateDatetime() {
        const datetime = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const formattedDatetime = datetime.toLocaleString('en-US', options);
        $("#currentDate").html(formattedDatetime);
    }



    // call the updateDatetime() function immediately to display the current datetime
    updateDatetime();

    // call the updateDatetime() function every second to update the datetime display
    setInterval(updateDatetime, 1000);

    const logout = () => {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "../../data/controller/LoginController.php?action=logout",
                    dataType: "json",
                    success: function (response) 
                    {
                        window.location.href = "../../views/master-page/login.php";
                    },
                    error: function () {
                    }
                }); 
            }
        })
    }
</script>