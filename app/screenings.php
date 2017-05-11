<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Screenings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
        require_once "../models/User.php";
        session_start();
        $type = $_SESSION['type'];
        
        if($type != 0)
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
            <br>
            <a class="btn btn-success btn-block" style="width:10%" href="admin.php">Add Screening</a>
            <br>
            <div style="width:80%" align="center">
                <table class="table table-striped table-bordered" align="center">
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th>Rating</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $users as $user ) {
                            echo '<tr>';
                                echo '<td>' .$user->name. '</td>';
                                echo '<td>' .$user->rating. '</td>';
                                echo '<td>' .$user->idroom. '</td>';
                                echo '<td>' .$user->sdate. '</td>';
                                echo '<td>' .$user->stime. '</td>';
                                echo '<td>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-info" href="update.php? id='.$user->id.'">Update</a>';
                                echo '</td>';
                                echo '<td>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$user->id.'">Delete</a>';
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
                <a class="btn btn-info btn-block" align="center"  style="width:10%" href="admin.php">Home</a>
            </div>
        </div>
    </div>
</body>
</html>