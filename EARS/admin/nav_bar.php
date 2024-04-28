<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="navi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            DEJA BREW CAFE
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        Home
                        <i class="fas fa-home" style="margin-left: 5px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employee.php">
                        Profile
                        <i class="fas fa-user" style="margin-left: 5px;"></i>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="employee.php">
                        Salary
                        <i class="fas fa-dollar-sign" style="margin-left: 5px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="attendance.php">
                        Attendance
                        <i class="fas fa-check-circle" style="margin-left: 5px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login2.php">
                        Users
                        <i class="fas fa-user" style="margin-left: 5px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  Logout
                  <i class="fa fa-power-off" style="margin-left: 5px;"></i>
                </a>

                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>