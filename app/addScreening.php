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
         <label for="room">Room</label>  <br>
         <input type="radio" name="room" value="1" checked>1 4DX<br>
         <input type="radio" name="room" value="2">2 IMAX 3D <br>
         <input type="radio" name="room" value="3">3 IMAX 3D <br> 
         <input type="radio" name="room" value="4">4 IMAX<br> 
         <input type="radio" name="room" value="5">5 IMAX <br> 
         <input type="radio" name="room" value="6">6 IMAX <br>
         <input type="radio" name="room" value="7">7 3D <br>
         <input type="radio" name="room" value="8">8 3D <br>
         <input type="radio" name="room" value="9">9 3D <br>
         <input type="radio" name="room" value="10">10 regular <br>
         <input type="radio" name="room" value="11">11 regular <br>
         <input type="radio" name="room" value="12">12 regular <br>
         <input type="radio" name="room" value="13">13 regular <br>
         <input type="radio" name="room" value="14">14 regular <br>
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