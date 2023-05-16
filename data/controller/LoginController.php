<?php
    include_once('../../config/database.php');
    include_once('../model/User.php');

    $action = $_GET['action'];
    $User = new User($conn);
    
    if($action == "login")
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
    else if ($action == 'logout')
    {
        session_destroy();
        echo json_encode('Success');
    }
?>