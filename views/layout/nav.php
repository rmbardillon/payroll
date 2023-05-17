<nav class="navbar navbar-light navbar-expand-md py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img src="../../libs/images/logo.png" width="50px"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-center <?php if($page == "home"){echo("active");} ?>" href="home.php" style="width: 90px;border-radius: 20px;">Home</a></li>
                <li class="nav-item"><a class="nav-link text-center <?php if($page == "manage"){echo("active");} ?>" href="manage.php" style="width: 90px;">Manage</a></li>
                <li class="nav-item"><a class="nav-link text-center <?php if($page == "attendance"){echo("active");} ?>" href="attendance.php" style="width: 90px;">Attendance</a></li>
                <li class="nav-item"><a class="nav-link text-center <?php if($page == "report"){echo("active");} ?>" href="generate-report.php" style="width: 90px;">Reports</a></li>
                <li class="nav-item"><a class="nav-link text-center <?php if($page == "clocking"){echo("active");} ?>" href="clocking.php" style="width: 90px;">Clocking</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown"><a class="dropdown-toggle nav-link text-center" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="width: 90px;">Profile</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="" onclick="logout()">Logout</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav
