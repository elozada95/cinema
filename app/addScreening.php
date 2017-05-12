<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add a Screening</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <?php
  require_once "../models/User.php";
  $db = new Database;
  $user = new User($db);
  ?>
  <div class="container">
    <div class="col-lg-12">
      <h2 class="text-center text-primary">Add screening</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="saveScreening.php" method="post"> 

        <label for="idmovie">Movie</label>
         <input type="text" name="idmovie" class="form-control"/>
         <br> 
         <label for="Room">Room</label>
         <input type="text" name="room" class="form-control"/>
         <br> 
        <label for="date">date(2017-05-11)</label>
         <input type="text" name="date" class="form-control"/>
         <br> 
         <label for="time">time(10:30)</label>
         <input type="text" name="time" class="form-control"/>
         <br> 
         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Add movie"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
      <br>
    </div>
  </div>
</div>
</body>
</html>