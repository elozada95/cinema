<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create your account</title>
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
      <h2 class="text-center text-primary">Create your account</h2>
      <div class="col-lg-6 col-lg-offset-3">
       <form action="save_usr.php" method="post"> 

        <label for="name">Name</label>
         <input type="text" name="name" class="form-control"/>
         <br> 
        <label for="surname">Surname</label>
         <input type="text" name="surname" class="form-control"/>
         <br>
         <label for="email">email</label>
         <input type="text" name="email" class="form-control"/>
         <br>

         <input class="btn btn-success btn-block btn-md" type="submit" name="submit" value="Create account"></input>
       </form>
     </div>
     <div class="col-lg-12" style="margin-bottom: 100px">
      <br>
    </div>
  </div>
</div>
</body>
</html>