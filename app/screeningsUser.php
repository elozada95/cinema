<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Movies</title>
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
        $db = new Database;
        $user = new User($db);
        $users = $user->getScreening();
    ?>
    <div class="container" style="width:100%" align="center">
        <div class="col-lg-12" style="width:100%" align="center">
            <h2 class="text-center text-primary">Screenings</h2>
            <div style="width:80%" align="center">
                <table class="table table-striped table-bordered" align="center">
                    <thead>
                        <tr>
                            <th style="width:20%">Name</th>
                            <th style="width:7%">Rating</th>
                            <th style="width:5%">Room</th>
                            <th style="width:5%">type</th>
                            <th style="width:5%">Price</th>
                            <th style="width:5%">Date</th>
                            <th style="width:5%">Time</th>
                            <th style="width:7%">Make Reservation</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $users as $user ) {
                            echo '<tr>';
                                echo '<td>' .$user->name. '</td>';
                                echo '<td>' .$user->rating. '</td>';
                                echo '<td>' .$user->idroom. '</td>';
                                echo '<td>' .$user->type. '</td>';
                                echo '<td>' .$user->price. '</td>';
                                echo '<td>' .$user->sdate. '</td>';
                                echo '<td>' .$user->stime. '</td>';
                                echo '<td>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-success" href="makeReservation.php? id='.$user->id.'">Make reservation</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>     
            </div>
            <div class="col-lg-12" style="margin-bottom: 100px" align="center">
                <br>
                <br>
                <a class="btn btn-info btn-block" align="center"  style="width:10%" href="usuario.php">Home</a>
            </div>
        </div>
    </div>
</body>
</html>