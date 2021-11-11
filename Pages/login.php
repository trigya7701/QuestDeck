<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuestDeck</title>
</head>
<body>
<?php

$email_error="";

$pass_error="";

    if(isset($_POST['Submit']))
    {
       
       
        if(empty($_POST["email"]))
        {
            $email_error="Email Cannot Be Empty";
        }
        else
        {
            $email_error="";
        }
        
        if(empty($_POST["password"]))
        {
            $pass_error="Password Cannot Be Empty";
        }
      if( $email_error=="" && $pass_error==""){
        $_SESSION["token"]=$_POST['email'];
        // alert("session started");
        header("Location:home.php");
      }
        

        // if(isset($_COOKIE['user_name'])){
        //     echo" Full Name :".$_COOKIE['user_name'];
        // }
        // if(isset($_COOKIE['user_email'])){
        //     echo" Email :".$_COOKIE['user_email'];
        // }
        // if(isset($_COOKIE['user_phone'])){
        //     echo" Phone  :".$_COOKIE['user_phone'];
        // }
       
    }
    ?>  


        <div class="signup-form">

            <div class="form-left">

                    <div id="theme">
                        <h3>Sign in</h3>   
                    </div>

                <form method="POST" action="">
                               
                                <input type="email" name="email" placeholder=" Email">
                                <p class='name'><?php echo "$email_error";?></p>
                                
                            
                                <input type="password" name="password" placeholder=" Password">
                                <p class='name'><?php echo "$pass_error";?></p>
                                <input type="submit" class="btn" value="Submit" name="Submit" >
                </form>
                <a href="index.php"> First Time user ? Sign up</a>
            </div>

            <div class="form-right">
                    <img src="../images/signup-image.jpg" alt="">
            </div>




        </div>

           
    <style>
        *
{
    margin: 0;
    padding: 0;
}
body
{
    background-color: rgba(194, 185, 185, 0.2);

    background-size: cover;
    font-family: sans-serif;
}

.signup-form{
            height:500px;
			width:70%;
			background-color:white;
            -webkit-box-shadow: 0 10px 6px -6px #777;
            -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
			border-radius: 3%;
			margin: 5% auto;
            display:flex;
}
.form-left{
    height:100%;
    width:40%;
    padding-top:2%;
    margin: 3% 7%;
}

#theme{
				height:50px;
				width: 200px;
				border-radius: 10%;			
				text-align: center;
				font-size: 1.5em;



			}
input{
    width: 70%;
  
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 10px;
  margin-bottom: 5%;
}

input:focus{
    outline: none;
  box-shadow: none !important;
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  -o-box-shadow: none !important;
  -ms-box-shadow: none !important;
}
p
{
    color:red;
    margin-bottom: 2%;
    
} 
.form-right{
    margin:5% 4%;
}


.btn{

    display: inline-block;
  background: #6dabe4;
  color: #fff;
  border-bottom: none;
  width: auto;
  padding: 15px 39px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  margin-top: 25px;
  cursor: pointer;
}
.btn:hover{
    background: #4292dc;
}
/* form
{
            
    height:500px;
			width:70%;
			background-color:white;
            -webkit-box-shadow: 0 10px 6px -6px #777;
            -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
			border-radius: 3%;
			margin: 5% auto;  
            
            
           
			
}
#form{
             display: flex;
            flex-direction: row;
}

#form-left{

    height:100%;
    width: 30%;
    border-radius: 10%;
    margin-top: 3%;
    padding-top: 20px;
    padding-left: 80px;
    


}
#theme{
				height:50px;
				width: 200px;
				border-radius: 10%;			
				text-align: center;
				font-size: 1.5em;



			}

input{
    width: 100%;
  
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 30px;
  margin-bottom: 3%;
}
p
{
    color:red;
    margin-bottom: 3px;
    
} */


    </style>
</body>
</html>