<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reservation</title>
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
  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Make your Reservation</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="make_reservation.php" method="post"> 

        <label for="name">Seat number</label>
         <input type="text" name="name" class="form-control"/>
         <br> 
         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Make reservation"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
      <br>
    </div>
  </div>
</div>
</body>
</html>