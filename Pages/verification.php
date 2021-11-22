<?php
    session_start();
    // session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/verification.css">
</head>
<body>
  <?php
    if(isset($_POST["Submit"]) && isset($_SESSION["otp"]))
    {
      // $otp=$_SESSION["otp"];
      $otp=str_split($_SESSION["otp"]);
      $name=["first","second","third","fourth","fifth","sixth"];
      $correct=0;
      // print_r($otp);
      // echo $otp;
      for($i=0;$i<6;$i++)
      {
        if($otp[$i]==$_POST[$name[$i]])
        {
          $correct=1;
        }
        else
        {
          $correct=0;
          break;
        }
      }
      if($correct==1)
      {
          include 'connection.php';
          $fname=$_SESSION["fname"];
          $uname=$_SESSION["uname"];
          $email=$_SESSION["email"];
          $password=hash('sha256',$_SESSION["password"]);
          $sql="INSERT INTO users(user_mainname,user_name,user_email,user_password,user_question,user_answer,user_rept) VALUES ('$fname','$uname','$email','$password',0,0,0)";
          $result=mysqli_query($conn,$sql);
          // session_unset
          header("Location:loginform.php");
      }
      // foreach($otp as $i)
      // {
      //   echo $i;
      // }
    }
  ?>
<div class="card">
  <div class="card-body">
    An One Time Password(OTP) is sent your Email Address.<br>Please Enter the OTP to get registered
    <form action="" method="post">
    <div class="fields">
        <input type="text" name="first">
        <input type="text" name="second">
        <input type="text" name="third">
        <input type="text" name="fourth">
        <input type="text" name="fifth">
        <input type="text" name="sixth">
    </div>
    <input type="submit" value="Submit" name="Submit">
    </form>
  </div>
</div>
</body>
</html>