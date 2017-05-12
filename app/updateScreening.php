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
  if (empty($_GET['id']))
{
  echo "hola";
  header("Location: admin.php");
  exit;
}
  if($type != 0)
  {
    header("Location: logout.php");
  }
  $db = new Database;
  $user = new User($db);
  $args = array('id'  => FILTER_SANITIZE_STRING,);
  $post = (object)filter_input_array(INPUT_GET, $args);
  $users = $user->getScreening();
  $formerid=$post->id;
  $formermovie;
  $formerRoom;
  $formerdate;
  $formertime;
foreach ($users as $usuar) {
    if($usuar->id==$formerid){
      $formermovie = $usuar->name;
      $formerRoom = $usuar->idroom;
      $formerdate = $usuar->sdate;
      $formertime = $usuar->stime;
    }
  }
  
  

  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Update screening</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="modify_screening.php" method="post"> 
         <input type="hidden" name="id" value="<?php echo $formerid; ?>" class="form-control" />
         <br>
         <label for="idmovie">Movie</label>
         <input type="text" name="idmovie" value="<?php echo $formermovie; ?>" class="form-control" disabled/>
         <br> 
         <label for="room">Room</label>
         <input type="text" name="room" value="<?php echo $formerRoom; ?>" class="form-control" disabled/>
         <br> 
         <label for="date">date(2017-05-11)e</label>
         <input type="text" name="date" value="<?php echo $formerdate; ?>" class="form-control"/>
         <br>
         <label for="time">time(10:30)</label>
         <input type="text" name="time" value="<?php echo $formertime; ?>" class="form-control"/>
         <br>
     

         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Submit Changes"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
    </div>
  </div>
  <div class="col-lg-12" style="margin-bottom: 100px" align="center">
                <a class="btn btn-info btn-block" align="center"  style="width:10%" href="admin.php">Home</a>
  </div>
</div>
</body>
</html>