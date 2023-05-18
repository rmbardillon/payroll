<?php
    include_once('../../config/database.php');
    include_once('../model/User.php');

    $action = $_GET['action'];
    $User = new User($conn);
    if($action == "registerUser")
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $request = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ];
        $result = $User->addAdmin($request);

        echo json_encode($result);
    }
    else if ($action == 'getAllAdmin') 
    {
        $result = $User->getAllAdmin();

        $table_data = '';
        $counter = 1;
        foreach ($result as $user) {
            $fullName = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'] ;
            $table_data .= '<tr>';
            $table_data .= '<td>' . $counter . '</td>';
            $table_data .= '<td>'  . $fullName . '</td>';
            $table_data .= '<td>'  . $user['EMAIL'] . '</td>';
            $table_data .= '<td>'  . $user['USERNAME'] . '</td>';
            $table_data .= '<td class="col-actions">';
            $table_data .= '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
            $table_data .= '<button type="button" id="update" onclick="Admin.clickUpdate(`'.$user['ADMINISTRATOR_ID'] .'`)" class="btn btn-warning btn-sm update"><i class="bi bi-list-check"></i> Update </button>';
            $table_data .= '<button type="button" id="reset" onclick="Admin.clickResetPassword(`'. $user['ADMINISTRATOR_ID'] .'`)" class="btn btn-info btn-sm reset"><i class="bi bi-key"></i> Reset Password </button>';
            $table_data .= '<button type="button" id="delete" onclick="Admin.clickDelete(`'. $user['ADMINISTRATOR_ID'] .'`)" class="btn btn-danger btn-sm delete"> <i class="bi bi-trash"></i> Delete</button>';
            $table_data .= '</div>';
            $table_data .= '</td>';
            $table_data .= '</tr>';

            $counter++;
        }

        echo json_encode($table_data);
    }
    else if ($action == 'getById')
    {
        $user_id = $_POST['user_id'];

        echo json_encode($User->getById($user_id));
    }
    else if($action == "login")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $request = [
            'username' => $username,
            'password' => $password
        ];
        $result = $User->login($request);

        echo json_encode($result);
    }
    else if ($action == 'update')
    {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $request = [
            'user_id' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ];

        $result = $User->update($request);

        echo json_encode($result);
    }
    else if ($action == 'deleteAdmin')
    {
        $user_id = $_POST['user_id'];

        $result = $User->deleteAdmin($user_id);

        echo json_encode($result);
    }
    else if($action == 'resetPassword') 
    {
        $password = DEFAULT_PASSWORD;
        $user_id = $_POST['user_id'];

        $request = [
            'user_id' => $user_id,
            'password' => $password
        ];

        $result = $User->update_password($request);

        echo json_encode($result);
    }
    else if ($action == 'logout')
    {
        session_destroy();
        echo json_encode('Success');
    }

    else if($action == 'checkOldPassword')
    {
        $username = $_POST['username'];
        $oldPassword = $_POST['oldPassword'];

        $request = [
            'username' => $username,
            'oldPassword' => $oldPassword
        ];

        $result = $User->checkOldPassword($request);
        echo json_encode($result);
    }

    else if($action == 'changePassword') 
    {
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        $request = [
            'user_id' => $user_id,
            'password' => $password
        ];

        $result = $User->update_password($request);
        echo json_encode($result);
    }

    else if($action == 'forgotPassword') 
    {
        $email = $_POST['email'];

        $result = $User->sendEmail($email);
        echo json_encode($result);
    }


?>