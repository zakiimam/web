<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
    <div>
      <h1>Sign up</h1>
    <form method="POST">
  <label for="">Enter Your name :</label><br>
  <input type="text" name="getname"><br>

  <label for="">Enter username :</label><br>
  <input type="text" name="getusername"><br>

  <label for="">Enter Password :</label><br>
  <input type="password" name="getpass"><br>

  <label for="">Enter confirm password :</label><br>
  <input type="password" name="conpass"><br>
  <button type="submit" name="sub">Sign up</button>
    </form>

    <?php

    if(isset($_POST['sub'])){
      require 'partials/_dbcon.php';
      $getname=$_POST['getname'];
      $getusername=$_POST['getusername'];
      $getpass=$_POST['getpass'];
      $conpass=$_POST['conpass'];

      $sql="select user_name from user_details where user_name = '$getusername' ";
      $sqlres=mysqli_query($connect, $sql);
      $rowcount=mysqli_num_rows($sqlres);

      if($rowcount !=0){
        echo "user name is not available. try another one";
      }
      if ($getpass != $conpass) {
          echo "confirm password properly";
      }
      if(($rowcount ==0) &&($getpass == $conpass)){
        echo"you have successfully signed up.";
        $gotologin = "<a href='login.php'>log in.</a>";
        echo $gotologin;
        
        $sql="insert into user_details (full_name, user_name, password) values ('$getname','$getusername','$getpass')";
        $sqlres=mysqli_query($connect ,$sql);
      }
    }
    ?>
    </div>
    </div>
</body>
</html>

