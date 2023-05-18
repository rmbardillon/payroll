<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: home.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../libs/css/styles.css">
    <link rel="shortcut icon" href="../../libs/images/logo.ico" type="image/x-icon">
    <title>Luca's Pizzeria</title>
    <style>
        .container {
            min-width: 90vw;
        }

        .login-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 75vh;
            min-width: 30vw;
            border-radius: 20px;
            padding: 50px 100px 20px 100px;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(7px) saturate(168%);
            color: rgb(0,0,0);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        #login-wrapper {
            height: 100vh;
            background: url("../../libs/images/background.jpg") center / cover space;
        }
    </style>
</head>
<body>
    <div class="container-fluid text-center d-flex justify-content-center align-items-center" id="login-wrapper">
        <form class="login-box">
            <img src="../../libs/images/pizzafont.png" alt="Lucas Pizeria Logo" width="300">
            <input type="text" class="form-control mb-2" id="username" placeholder="Username" required>
            <input type="password" class="form-control mb-2" id="password" placeholder="Password" required>
            <div class="password-wrapper">
                <input type="checkbox" class="form-check-input" id="show-password">
                <label class="form-check-label" for="show-password">Show Password</label>
            </div>
            <a href="forgot-password.php" class="text-secondary">Forgot Password?</a>
            <button class="btn btn-primary w-100 mb-2" type="submit" id="login">Login</button>
        </form>

    </div>
        <script src="../../libs/plugins/jquery/jquery-3.6.1.min.js"></script>
        <script src="../../libs/plugins/sweetalert/sweetalert.all.min.js"></script>
        <script src="../../config/system_name.js"></script>
        <script src="../../libs/scripts/vars.js"></script>
        <script src="../../libs/scripts/master-page/login.js"></script>
</body>
</html>