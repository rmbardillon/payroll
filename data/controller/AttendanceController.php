<?php
    include_once('../../config/database.php');
    include_once('../model/Attendance.php');

    $action = $_GET['action'];
    $Attendance = new Attendance($conn);
    
    if($action == "getAllPresentEmployees")
    {
        $result = $Attendance->getAllPresentEmployees();

        $table_data = '';
        foreach ($result as $employee) {
            $table_data .= '<tr>';
            $table_data .= '<td>' . $employee['EMPLOYEE_ID'] . '</td>';
            $table_data .= '<td>' . $employee['FULL_NAME'] . '</td>';
            $table_data .= '<td>' . $employee['TIME_IN'] . '</td>';
            $table_data .= '<td>' . $employee['TIME_OUT'] . '</td>';
            $table_data .= '<td>' . $employee['TOTAL_HOURS_WORKED'] . '</td>';
            $table_data .= '<td>₱' . $employee['TOTAL_HOURS_WORKED'] * $employee['SALARY_RATE'] . '</td>';
            $table_data .= '</tr>';
        }

        echo json_encode($table_data);
    }

    else if($action == "getTotalPresentEmployees")
    {
        $result = $Attendance->getAllPresentEmployees();
        echo json_encode(count($result));
    }
?>