<?php
    include_once('../../config/database.php');
    include_once('../model/Clocking.php');

    $action = $_GET['action'];
    $Clocking = new Clocking($conn);
    
    if($action == "timeIn")
    {
        $employeeNumber = $_POST['employeeNumber'];
        $result = $Clocking->timeIn($employeeNumber);

        echo json_encode($result);
    }
    else if($action == "timeOut")
    {
        $employeeNumber = $_POST['employeeNumber'];
        $result = $Clocking->timeOut($employeeNumber);

        echo json_encode($result);
    }
?>