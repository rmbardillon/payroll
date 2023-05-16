<?php
    include_once('../../config/database.php');
    include_once('../model/User.php');

    $action = $_GET['action'];
    $User = new User($conn);
    if($action == "registerUser")
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        
        $request = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => $password,
            'role' => $role,
            'username' => $username
        ];
        $result = $User->save($request);

        echo json_encode($result);
    }
    else if ($action == 'getTableData') 
    {
        $result = $User->getAll();

        $table_data = '';
        $counter = 1;
        foreach ($result as $user) {
            $fullName = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'] ;

            $role = 'Admin';
            if($user['ROLE'] == 3)
            {
                $role = 'User';
            }

            $is_locked = '<span class="badge bg-success">Active</span>';
            if($user['IS_LOCKED'] == 1)
            {
                $is_locked = '<span class="badge bg-danger">Inactive</span>';
            }

            $last_login = '';
            if($user['LAST_LOGIN']) 
            {
                $last_login = date('F j, Y, g:i a', strtotime($user['LAST_LOGIN']));
            }

            $table_data .= '<tr>';
            $table_data .= '<td>' . $counter . '</td>';
            $table_data .= '<td>'  . $fullName . '</td>';
            $table_data .= '<td>'  . $user['USERNAME'] . '</td>';
            $table_data .= '<td>'  . $role . '</td>';
            $table_data .= '<td>'  . $is_locked . '</td>';
            $table_data .= '<td>'  . $last_login . '</td>';
            $table_data .= '<td class="col-actions">';
            $table_data .= '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
            $table_data .= '<button type="button" id="update" onclick="Admin.clickUpdate(`'.$user['USER_ID'] .'`)" class="btn btn-warning btn-sm update"><i class="bi bi-list-check"></i> Update </button>';
            $table_data .= '<button type="button" id="reset" onclick="Admin.clickResetPassword(`'. $user['USER_ID'] .'`)" class="btn btn-info btn-sm reset"><i class="bi bi-key"></i> Reset Password </button>';
            if($_SESSION['user']['role'] == 1) {
                $table_data .= '<button type="button" id="delete" onclick="Admin.clickDelete(`'. $user['USER_ID'] .'`)" class="btn btn-danger btn-sm delete"> <i class="bi bi-trash"></i> Delete</button>';
            }
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
        $role = $_POST['role'];

        $request = [
            'user_id' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'role' => $role,
        ];

        $result = $User->update($request);

        echo json_encode($result);
    }
    else if ($action == 'delete')
    {
        $user_id = $_POST['user_id'];

        $result = $User->delete($user_id);

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

        $User->update_status($user_id, 0);
        $User->update_login_attempt($user_id, 0);
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
?>