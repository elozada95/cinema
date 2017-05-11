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
    $selmovie = filter_input(INPUT_POST, 'movie');
    $type = $_SESSION['type'];
    
    if($type != 1)
    {
        header("Location: logout.php");
    }

    if(!$selmovie)
    {
        header("Location: logout.php");
    }

    $db = new Database;
    $user = new User($db);
    $user->setId($selmovie);
    
    $users = $user->viewMovie();
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Movie info</h2>
            <?php
            if( ! empty( $users ) )
            {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Synopsis</th>
                        <th>Release Date</th>
                        <th>Duration</th>
                        <th>Genere</th>
                        <th>Rating</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                        ?>
                        <tr>
                            <td><?php echo $user->name?></td>
                            <td><?php echo $user->synopsis?></td>
                            <td><?php echo $user->releasedate ?></td>
                            <td><?php echo $user->duration ?></td>
                            <td><?php echo $user->gen ?></td>
                            <td><?php echo $user->rating ?></td>
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
                <div class="alert alert-danger" style="margin-top: 100px">You dont have movie</div>
                <?php
            }
            ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 100px">
            <br>
            <br>
            <a class="btn btn-info btn-block" href="usuario.php">Home</a>
        </div>
    </div>
</body>
</html>