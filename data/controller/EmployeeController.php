<?php
    include_once('../../config/database.php');
    include_once('../model/Employee.php');

    $action = $_GET['action'];
    $Employee = new Employee($conn);
    
    if($action == "saveEmployee")
    {
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $salary = $_POST['salary'];
        $contactNumber = $_POST['contactNumber'];
        $emailAddress = $_POST['emailAddress'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $municipality = $_POST['municipality'];
        $province = $_POST['province'];

        $request = [
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
            'birthday' => $birthday,
            'gender' => $gender,
            'salary' => $salary,
            'contactNumber' => $contactNumber,
            'emailAddress' => $emailAddress,
            'street' => $street,
            'barangay' => $barangay,
            'municipality' => $municipality,
            'province' => $province
        ];
        $result = $Employee->saveEmployee($request);

        echo json_encode($result);
    }
    else if ($action == 'getAllEmployee')
    {
        $result = $Employee->getEmployee();

        $table_data = '';
        foreach ($result as $employee) {
            $table_data .= '<tr>';
            $table_data .= '<td>' . $employee['EMPLOYEE_ID'] . '</td>';
            $table_data .= '<td>' . $employee['FULL_NAME'] . '</td>';
            $table_data .= '<td><button class="btn btn-primary me-3" type="button" onclick="Manage.view(`'.$employee['EMPLOYEE_ID'].'`);"><i class="far fa-eye" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">View</span></button>';
            $table_data .= '<button class="btn btn-success me-3" type="button" onclick="Manage.clickEdit(`'.$employee['EMPLOYEE_ID'].'`);"><i class="far fa-edit" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">Edit</span></button>';
            $table_data .= '<button class="btn btn-danger me-3" type="button" onclick="Manage.delete(`'.$employee['EMPLOYEE_ID'].'`);"><i class="far fa-trash-alt" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">Delete</span></button></td>';
            $table_data .= '</tr>';
        }

        echo json_encode($table_data);
    }
    else if ($action == 'getAllEmployee2')
    {
        $result = $Employee->getEmployee();

        $table_data = '';
        foreach ($result as $employee) {
            $table_data .= '<tr>';
            $table_data .= '<td>' . $employee['EMPLOYEE_ID'] . '</td>';
            $table_data .= '<td>' . $employee['FULL_NAME'] . '</td>';
            $table_data .= '<td><button class="btn btn-primary me-3" type="button" onclick="Attendance.view(`'.$employee['EMPLOYEE_ID'].'`);"><i class="far fa-eye" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">View</span></button>';
            $table_data .= '<button class="btn btn-success me-3" type="button" onclick="Attendance.viewSalary(`'.$employee['EMPLOYEE_ID'].'`);"><i class="far fa-eye" style="color: rgb(255,255,255);font-size: 12px;"></i><span class="ps-3" style="font-size: 12px;">View Salary</span></button></td>';
            $table_data .= '</tr>';
        }

        echo json_encode($table_data);
    }
    else if ($action == 'getEmployeeAttendanceById')
    {
        $employeeId = $_POST['employeeId'];
        $result = $Employee->getEmployeeAttendanceById($employeeId);

        $table_data = '';
        $counter = 1;
        foreach ($result as $employee) {
            $table_data .= '<tr>';
            $table_data .= '<td>' . $counter . '</td>';
            $table_data .= '<td>' . $employee['FORMATTED_DATE'] . '</td>';
            $table_data .= '<td>' . $employee['TIME_IN'] . '</td>';
            $table_data .= '<td>' . $employee['TIME_OUT'] . '</td>';
            $table_data .= '<td>' . $employee['TOTAL_HOURS_WORKED'] . '</td>';
            $table_data .= '</tr>';
            $counter++;
        }

        $response = [
        'result' => $result,
        'table_data' => $table_data
        ];

        echo json_encode($response);
    }
    else if ($action == 'getEmployeeById')
    {
        $employeeId = $_POST['employeeId'];
        $result = $Employee->getEmployeeById($employeeId);

        echo json_encode($result);
    }
    else if($action == 'updateEmployee')
    {
        $employeeID = $_POST['employeeId'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $salary = $_POST['salary'];
        $contactNumber = $_POST['contactNumber'];
        $emailAddress = $_POST['emailAddress'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $municipality = $_POST['municipality'];
        $province = $_POST['province'];

        $request = [
            'employeeId' => $employeeID,
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
            'birthday' => $birthday,
            'gender' => $gender,
            'salary' => $salary,
            'contactNumber' => $contactNumber,
            'emailAddress' => $emailAddress,
            'street' => $street,
            'barangay' => $barangay,
            'municipality' => $municipality,
            'province' => $province
        ];
        $result = $Employee->updateEmployee($request);

        echo json_encode($result);
    }
    else if($action == 'deleteEmployee')
    {
        $employeeId = $_POST['employeeId'];
        $result = $Employee->deleteEmployee($employeeId);

        echo json_encode($result);
    }
?>