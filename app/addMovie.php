<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add a Movie</title>
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
      <h2 class="text-center text-primary">Add movie</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="saveMovie.php" method="post"> 

        <label for="name">Name of movie</label>
         <input type="text" name="name" class="form-control"/>
         <br> 
        <label for="synopsis">Synopsis</label>
         <input type="text" name="synopsis" class="form-control"/>
         <br>
         <label for="date">Release date(2017-05-09)</label>
         <input type="text" name="date" class="form-control"/>
         <br>
         <label for="duration">Duration of movie</label>
         <input type="text" name="duration" class="form-control"/>
         <br>
         <label for="genere">Genere:</label> <br>
         <input type="radio" name="genere" value="Drama" checked> Drama<br>
         <input type="radio" name="genere" value="Comedy"> Comedy<br>
         <input type="radio" name="genere" value="Action"> Action<br>
         <input type="radio" name="genere" value="Sci-Fi"> Sci-Fi<br>
         <input type="radio" name="genere" value="Fantasy"> Fantasy<br>
         <input type="radio" name="genere" value="Horror"> Horror<br>
         <input type="radio" name="genere" value="Romance"> Romance<br>
         <input type="radio" name="genere" value="Musical"> Musical<br>
         <input type="radio" name="genere" value="Suspenso"> Suspenso<br>

         <label for="rating">Clasification</label>  <br>
         <input type="radio" name="rating" value="AA" checked> AA<br>
         <input type="radio" name="rating" value="A"> A<br>
         <input type="radio" name="rating" value="B"> B<br> 
         <input type="radio" name="rating" value="B15"> B15<br> 
         <input type="radio" name="rating" value="C"> C<br> 
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