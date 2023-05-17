<?php
    include_once('../../config/database.php');
    include_once('../model/Report.php');

    $action = $_GET['action'];
    $Report = new Report($conn);
    
    if($action == "1")
    {
        $from = $_POST['fromDate'];
        $to = $_POST['toDate'];
        $result = $Report->getAllEmployeesSalaryReport($from, $to);

        echo json_encode($result);
    }
?>