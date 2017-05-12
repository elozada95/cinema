<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Users</title>
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
        $users = $user->getUsuario();
    ?>
    <div class="container" style="width:100%" align="center">
        <div class="col-lg-12" style="width:100%" align="center">
            <h2 class="text-center text-primary">Users</h2>
            <div style="width:80%" align="center">
                <table class="table table-striped table-bordered" align="center">
                    <thead>
                        <tr>
                            <th style="width:20%">Id</th>
                            <th style="width:10%">Name</th>
                            <th style="width:5%">Surname</th>
                            <th style="width:8%">email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $users as $user ) {
                            if ($user->id != 0) {
                                echo '<tr>';
                                echo '<td>' .$user->id. '</td>';
                                echo '<td>' .$user->name. '</td>';
                                echo '<td>' .$user->surname. '</td>';
                                echo '<td>' .$user->email. '</td>';
                                echo '<td>';
                                echo '&nbsp;';
                                echo '<a class="btn btn-danger" href="deleteUser.php?id='.$user->id.'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                            }
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