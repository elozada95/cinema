<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cinema</title>
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
  $db = new Database;
  $user = new User($db);
  $users = $user->getUsuario();
  $formerid;
  $formersurname;
  $formeremail;
  $formername;

  //desencriptar la contraseña
  foreach ($users as $usuar) {
    if($usuar->id==$paysheet){
      $formerid = $usuar->id;
      $formersurname = $usuar->surname;
      $formeremail = $usuar->email;
      $formername = $usuar->name;
    }
  }

  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Edit your info</h2>
      <div class="col-lg-12" style="margin-bottom: 100px">
                <br>
                <a class="btn btn-info btn-block" href="changePass.php">Change Password</a>
      </div>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="modify_user.php" method="post"> 
         <input type="hidden" name="id" value="<?php echo $formerid; ?>" class="form-control" />
         <br>
         <label for="name">name</label>
         <input type="text" name="name" value="<?php echo $formername; ?>" class="form-control"/>
         <br> 
         <label for="surname">Surname</label>
         <input type="text" name="surname" value="<?php echo $formersurname; ?>" class="form-control"/>
         <br> 
         <label for="email">Email</label>
         <input type="text" name="email" value="<?php echo $formeremail; ?>" class="form-control"/>
         <br>
     

         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Submit Changes"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
      <br>
    </div>
  </div>
</div>
</body>
</html>