<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Check Movies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/User.php";
    $db = new Database;
    $user = new User($db);
    $users = $user->getMovie();
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Select a Movie</h2>
            <div class="col-lg-6 col-lg-offset-3">
                <form action="showMovie.php" method="post">
                    <select name="movie" class="form-control">
                        <?php foreach( $users as $user ) {
                            echo '<option value="'.$user->id.'">'.$user->name.'</option>';
                        }
                        ?>
                    </select>
                    <br>
                    <input class="btn btn-success col-lg-2 col-lg-offset-5" value="Continuar" type="submit">
                </form>
            </div>
            <div class="col-lg-12" style="margin-bottom: 100px">
                <br>
                <br>
                <a class="btn btn-info btn-block" href="usuario.php">Home</a>
            </div>
        </div>
    </div>
</body>
</html>