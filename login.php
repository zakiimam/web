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
      <h1>Log in</h1>
    <form method="POST">

  <label for="">Enter username :</label><br>
  <input type="text" name="getusername"><br>

  <label for="">Enter Password :</label><br>
  <input type="password" name="getpass"><br><br>

  <button type="submit" name="sub">Log in</button>
    </form>

    <?php

    if(isset($_POST['sub'])){
      require 'partials/_dbcon.php';
        $getusername =$_POST['getusername'];
        $getpassword =$_POST['getpass'];

        $sql1="select * from user_details where user_name ='$getusername' and password = '$getpassword';";
        $sqlres=mysqli_query($connect, $sql1);
        $countrows=mysqli_num_rows($sqlres);

        if($countrows == 0){
            echo "Acount not available.please <a href='index.php'>sign up.</a>";
        }else{
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['sendusername']=$getusername;
            header("location: dashboard.php");
        }
        
    }
    ?>
    </div>
    </div>
</body>
</html>

