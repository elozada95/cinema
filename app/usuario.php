<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
        require_once "../models/User.php";
        session_start();
        $type = $_SESSION['type'];
        $paysheet = $_SESSION['paysheet'];
        if($type != 1)
        {
            header("Location: logout.php");
        }
        if(!$paysheet){
            header("Location: logout.php");
        }
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Welcome to our Cinema</h2>
            <div class="col-lg-12" style="margin-bottom: 100px">
                <a class="btn btn-info btn-block" href="checkMovies.php">Movies</a>
            </div>
            <div class="col-lg-12" style="margin-bottom: 100px">
                <a class="btn btn-info btn-block" href="editInfoUser.php">Edit your info</a>
            </div>
            <div class="col-lg-12" style="margin-bottom: 100px">
                <a class="btn btn-info btn-block" href="screeningsUser.php">Screenings</a>
            </div>
            <div class="col-lg-12" style="margin-bottom: 100px">
                <a class="btn btn-info btn-block" href="reservations.php">Reservations</a>
            </div>
            <div class="col-lg-12" align="center" style="margin-bottom: 100px">
                <br>
                <br>
                <a class="btn btn-danger" align="center" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
