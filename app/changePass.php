<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Change password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php
  require_once "../models/User.php";
  session_start();
  $type = $_SESSION['type'];
  $paysheet = $_SESSION['paysheet'];
  if($type != 1 )
  {
    header("Location: logout.php");
  }
  

  $db = new Database;
  $user = new User($db);
  $users = $user->getUsuario();
  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Edit Password</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="savePass.php" method="post"> 
         <br>
         <label for="password">New password</label>
         <input type="password" name="password" class="form-control"/>
         <br>   
         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Change Password"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
      <br>
    </div>
  </div>
</div>
</body>
</html>