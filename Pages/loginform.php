<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn & SignUp</title>
    <link rel="stylesheet" href="../Styles/loginform.css">
    <script src="../Scripts/loginform.js"></script>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="container">
        <div class="main" id="main">
            <div class="main1" id="signup">
                <div class="left">
                    <h1>Welcome</h1>
                    <input type="submit" value="SignIn" onclick="Signin()">
                </div>
                <div class="right">
                    <h2>Create Account</h2>
                    <form action="" method="POST">
                        <label for="fname">
                            Enter Your Name
                        </label>
                        <input type="text" name='fname' placeholder="Name" />
                        <?php
                            $fname=1;$uname=1;$email=1;$password=1;
                            if(isset($_POST["signup"]))
                            {
                                if($_POST["fname"]!='')
                                {
                                    if(preg_match("^[a-zA-Z\s]+$^",$_POST["fname"]))
                                    {
                                        $fname=0;
                                    }
                                    else
                                    {
                                        echo "<p>Please Enter correct name</p>";
                                    }
                                }
                                else
                                {
                                    echo "<p>Please Enter your name</p>";
                                }
                            }
                        ?>
                        <label for="uname">
                            Enter Your UserName
                        </label>
                        <input type="text" name='uname' placeholder="Username" />
                        <?php
                            if(isset($_POST["signup"]))
                            {
                                if($_POST["uname"]!='')
                                {
                                        $uname=0;
                                }
                                else
                                {
                                    echo "<p>Please Enter your Username</p>";
                                }
                            }
                        ?>
                        <label for="email">
                            Enter Your Email
                        </label>
                        <input type="email" name="email" placeholder=" Email">
                        <?php
                            if(isset($_POST["signup"]))
                            {
                                if($_POST["email"]!='')
                                {
                                        $email=0;
                                }
                                else
                                {
                                    echo "<p>Please Enter your Email</p>";
                                }
                            }
                        ?>
                        <label for="password">
                            Enter Your Password
                        </label>
                        <input type="password" name="password" placeholder=" Password">
                        <?php
                            if(isset($_POST["signup"]))
                            {
                                if($_POST["password"]!='')
                                {
                                    if(strlen($_POST["password"])>=8)
                                    {
                                        if(strlen($_POST["password"])<=20)
                                        {
                                            $password=0;
                                        }
                                        else
                                        {
                                            echo "<p>Password length should be less than 20 characters.</p>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<p>Password length should be greater than 8 characters.</p>";
                                    }
                                }
                                else
                                {
                                    echo "<p>Please Enter Password</p>";
                                }
                            }
                        ?>
                        <input type="submit" class="btn" value="SignUp" name="signup" >
                    </form>
                    <?php
                        if($fname==0 && $uname==0 && $email==0 && $password==0)
                        {
                            include 'connection.php';
                            if(isset($_POST["signup"]))
                            {
                                $fname=$_POST["fname"];
                                $uname=$_POST["uname"];
                                $email=$_POST["email"];
                                $password=hash('sha256',$_POST["password"]);
                                $sql="INSERT INTO users(user_mainname,user_name,user_email,user_password,user_question,user_answer,user_rept) VALUES ('$fname','$uname','$email','$password',0,0,0)";
                                $result=mysqli_query($conn,$sql);
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="main2" id="signin">
                <div class="lefts">
                    <h1>Welcome</h1>
                    <input type="submit" value="SignUp"  onclick="signup()">
                </div>
                <div class="rights">
                    <h2>Sign In</h2>
                    <?php
                            $username=1;$emaila=1;
                            if(isset($_POST["signin"]))
                            {
                                if($_POST["email"]!='')
                                {
                                    $username=0;
                                }
                                else
                                {
                                    echo "<p>Please Enter your Email</p>";
                                }
                            }
                            if(isset($_POST["signin"]))
                            {
                                if($_POST["password"]!='')
                                {
                                    $emaila=0;
                                }
                                else
                                {
                                    echo "<p>Please Enter your Password</p>";
                                }
                            }
                        ?>
                    <form action="" method="POST">
                        <p>Enter Your Email</p>
                        <input type="email" name="email" placeholder=" Email">
                        <p>Enter Your Password</p>
                        <input type="password" name="password" placeholder=" Password">
                        <input type="submit" class="btn" value="SignUp" name="signin" >
                        <?php
                            if(isset($_POST["signin"]))
                            {
                                if($username==0 && $emaila==0)
                                {
                                    include 'connection.php';
                                    $emailer=$_POST["email"];
                                    $password=$_POST["password"];
                                    $sql="SELECT * FROM users WHERE user_email='$emailer'";
                                    $result=mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($result)==1)
                                    {
                                        $row=mysqli_fetch_assoc($result);
                                        if(hash('sha256',$password)==$row['user_password'])
                                        {
                                            $_SESSION["Id"]=$row["user_id"];
                                            $_SESSION["name"]=$row["user_mainname"];
                                            header("Location:home.php");
                                        }
                                        else
                                        {
                                            echo "The Password is Incorrect!";
                                        }
                                    }
                                    else
                                    {
                                        echo "The username or password is incorrect";
                                    }
                                }
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>