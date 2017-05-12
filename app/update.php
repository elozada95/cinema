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
  $args = array(
  'id'  => FILTER_SANITIZE_STRING,
);
  $post = (object)filter_input_array(INPUT_GET, $args);
  $users = $user->getMovie();
  $formerid=$post->id;
  $formername;
  $formersynopsis;
  $formerReleasedate;
  $formerduration;
  $formergen;
  $formerRating;

    foreach ($users as $usuar) {
    if($usuar->id==$formerid){
      $formername = $usuar->name;
      $formersynopsis= $usuar->synopsis;
      $formerReleasedate= $usuar->releasedate;
      $formerduration= $usuar->duration;
      $formergen= $usuar->gen;
      $formerRating= $usuar->rating;
    }
  }
  

  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Update Movie</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="modify_movie.php" method="post"> 
         <input type="hidden" name="id" value="<?php echo $formerid; ?>" class="form-control" />
         <br>
         <label for="name">Name</label>
         <input type="text" name="name" value="<?php echo $formername; ?>" class="form-control"/>
         <br> 
         <label for="synopsis">synopsis</label>
         <input type="text" name="synopsis" value="<?php echo $formersynopsis; ?>" class="form-control"/>
         <br> 
         <label for="releasedate">releasedate</label>
         <input type="text" name="releasedate" value="<?php echo $formerReleasedate; ?>" class="form-control"/>
         <br>
         <label for="duration">duration</label>
         <input type="text" name="duration" value="<?php echo $formerduration; ?>" class="form-control"/>
         <br>
         <label for="gen">Genere</label>
         <input type="text" name="genere" value="<?php echo $formergen; ?>" class="form-control" disabled/>
         <br>
         <label for="rating">rating</label>
         <input type="text" name="rating" value="<?php echo $formerRating; ?>" class="form-control"disabled/>
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