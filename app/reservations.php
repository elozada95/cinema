<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
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

    if( ! $paysheet )
    {
        header("Location: logout.php");
    }

    $db = new Database;
    $user = new User($db);
    $user->setId($paysheet);
    $users = $user->viewReservations();
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Your reservations</h2>
            <?php
            if( ! empty( $users ) )
            {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Screening</th>
                        <th>Seat number</th>
                        
                    </tr>
                    <?php foreach( $users as $user )
                    {
                        ?>
                        <tr>
                            <td><?php echo $user->idscreening ?></td>
                            <td><?php echo $user->seatnumber?></td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            else
            {
                ?>
                <div class="alert alert-danger" style="margin-top: 100px">You dont have reservations.</div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-lg-12" style="margin-bottom: 100px">
                <br>
                <br>
                <a class="btn btn-info btn-block" href="usuario.php">Home</a>
    </div>
</body>
</html>
