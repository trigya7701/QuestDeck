<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Styles/profile.css">
    <script src="../Scripts/editprofile.js"></script>
</head>
<body>
    <?php
        include "../components/navbar.php";
    ?>
    <?php
    $flag=0;
    $flag2=0;
      include "connection.php";
      $u_id=$_SESSION["Id"];
      $sql="SELECT * FROM users WHERE user_id='$u_id'";
      $result=mysqli_query($conn,$sql);
      $data=mysqli_fetch_assoc($result);
      mysqli_close($conn);
    ?>
    <?php
      if(isset($_POST["save"]))
      {
        $flag=1;
        $name=$data["user_name"];
        $location=$data["user_location"];
        $title=$data["user_title"];
        $about=$data["user_about"];
        $u_id=$_SESSION["Id"];
        $github=$data["user_github"];
        $linkedin=$data["user_linkedin"];
        $website=$data["user_website"];
        if($_POST["username"]!=$name)
        {
          $name=$_POST["username"];
        }
        if($_POST["location"]!=$location)
        {
          $location=$_POST["location"];
        }
        if($_POST["title"]!=$title)
        {
          $title=$_POST["title"];
        }
        if($_POST["about"]!=$about)
        {
          $about=$_POST["about"];
        }
        if($_POST["githublink"]!=$github)
        {
          $github=$_POST["githublink"];
        }
        if($_POST["linkedinlink"]!=$linkedin)
        {
          $linkedin=$_POST["linkedinlink"];
        }
        if($_POST["weblink"]!=$website)
        {
          $website=$_POST["weblink"];
        }
        if(!empty($_FILES["picture"]["name"]))
        {
          $file_name=basename($_FILES["picture"]["name"]);
          $file_type=pathinfo($file_name,PATHINFO_EXTENSION);
          $types_allowed=array('jpg','jpeg','png');
          if(in_array($file_type,$types_allowed))
          {
            $flag2=1;
            $profile=addslashes(file_get_contents($_FILES["picture"]["tmp_name"]));
          }
          else
          {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            The Image is not updated as it is not of image type
          </div>';
          }
        }
        include "connection.php";
        if($flag2==0)
        {
          $sql="UPDATE users SET user_name='$name', user_location='$location', user_title='$title', user_about='$about', user_linkedin='$linkedin', user_github='$github', user_website='$website' WHERE user_id=$u_id;";
        }
        else
        {
          $sql="UPDATE users SET user_name='$name', user_location='$location', user_title='$title', user_about='$about', user_linkedin='$linkedin', user_github='$github', user_website='$website', user_profile='$profile' WHERE user_id=$u_id;";
        }
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
      }
    ?>
    <?php
      if($flag==1)
      {
          include "connection.php";
          $u_id=$_SESSION["Id"];
          $sql="SELECT * FROM users WHERE user_id='$u_id'";
          $result=mysqli_query($conn,$sql);
          $data=mysqli_fetch_assoc($result);
          mysqli_close($conn);
      }
    ?>
    <div class="edit">
        <button type="button" onclick="edit()" class="btn btn-secondary"><i class="bi bi-pencil-fill"></i>   Edit Profile</button>
        <!-- <input type="button" onclick="edit()" value="Edit Profie"> -->
    </div>
    <div class="container">
  <div class="row">
    <div class="col-lg-3 col-sm-4 col-5 ">
      <!-- <img src="../Images/profile.jpeg" alt="Trigya"> -->
      <?php
      echo '<img src="data:image/jpeg;base64,'.base64_encode($data["user_profile"]).'" alt="Profile Image" srcset="">';
    ?>
    </div>
    <div class="col-lg-4 col-sm-8  col-6 flex-column mar">
      <?php
      echo "<h1>".$data["user_name"]."</h1>";
      ?>
      <!-- <h1>rr701</h1> -->
      <!-- title -->
      <?php
      echo "<h3>".$data["user_title"]."</h3>";
      ?>
      <!-- <p>I am a coder</p> -->
      <?php
      date_default_timezone_set("Asia/Kolkata");
        $date_now=date_create(date("d-M-Y"));
        $date_register=date_create($data["user_timestamp"]);
        $difference=date_diff($date_register,$date_now,TRUE)->format("Member Since %a day");
      ?>
      <div class="flex-row">
        <i class="bi bi-person-badge"><?php echo $difference; ?></i>
        <i class="bi bi-clock-history"> Last visited on </i>
      </div>
      <!-- links -->
      <div class="flex-row">
          <a 
          <?php
          if($data["user_github"]!="")
    {
          echo "href=".$data["user_github"]."";
    }
          ?>>
          <i class="bi bi-github"></i></a>
          <a 
          <?php
          if($data["user_linkedin"]!="")
    {
          echo "href=".$data["user_linkedin"]."";
    }
          ?>><i class="bi bi-linkedin"></i></a>
         <a 
          <?php
          if($data["user_website"]!="")
    {
          echo "href=".$data["user_website"]."";
    }
          ?>><i class="bi bi-link"><?php echo $data['user_website'];?></i></a>
          <i class="bi bi-geo-alt-fill"><?php echo $data['user_location'];?></i></a>
      </div>
      <!-- <p><i>Member since 1 year</i><i>Last visited on </i></p> -->
    </div>
    <div class="col-lg-4  flex-column">
      <h3>About</h3>
      <?php
      echo "<p>".$data["user_about"]."</p>";
      ?>
      <!-- <p>I am Trigya Roy. Who lives in shrinagar. You can follow me to get updates of shrinagar</p> -->
    </div>
  </div>
</div>

<div class="stats-data">
<h4>Stats</h4>
<div class="stats">
    <div class="reputation">
    <?php
      echo "<p>".$data["user_rept"]."</p>";
      ?>
        <!-- <p>10</p> -->
        <p>reputation</p>
    </div>
    <div class="answers">
    <?php
      echo "<p>".$data["user_answer"]."</p>";
      ?>
        <!-- <p>10</p> -->
        <p>answers</p>
    </div>
    <div class="questions">
    <?php
      echo "<p>".$data["user_question"]."</p>";
      ?>
        <!-- <p>10</p> -->
        <p>questions</p>
    </div>
</div>
</div>
<form action="" method="post" enctype="multipart/form-data">
<div class="edit-profile" id="edit-profile">
  <h3>Edit Your Profile</h3>
  <div class="line"></div>
  
  <div class="information">
    <h5>Profile Image</h5>
    <?php
      echo '<img src="data:image/jpeg;base64,'.base64_encode($data["user_profile"]).'" alt="Profile Image" srcset="">';
    ?>
    Upload Another Image: <input type="file" name="picture" id="profile">
    <h5>Display Name</h5>
    <?php
      echo '<input type="text" name="username" value="'.$data["user_name"].'">';
    ?>
    <h5>Location</h5>
    <?php
      echo '<input type="text" name="location" value="'.$data["user_location"].'">';
    ?>
    <!-- <input type="text" name="location"> -->
    <h5>Title</h5>
    <?php
      echo '<input type="text" name="title" value="'.$data["user_title"].'">';
    ?>
    <!-- <input type="text" name="title"> -->
    <h5>About</h5>
    <?php
      echo '<input type="text" name="about" value="'.$data["user_about"].'">';
    ?>
    <!-- <input type="text" name="about"> -->
  </div>
  <div class="link">
    <h3>Links</h3>
    <div class="line"></div>
    <div class="links">
        <div class="git">
          <h5>Github Link</h5>
          <?php
          echo '<input type="text" name="githublink" value="'.$data["user_github"].'">';
        ?>
          <!-- <input type="text" name="githublink"> -->
        </div>
        <div class="twit">
          <h5>LinkedIn Link</h5>
          <?php
          echo '<input type="text" name="linkedinlink" value="'.$data["user_linkedin"].'">';
        ?>
          <!-- <input type="text" name="twitterlink"> -->
        </div>
        <div class="web">
        <h5>Website Link</h5>
        <?php
          echo '<input type="text" name="weblink" value="'.$data["user_website"].'">';
        ?>
        <!-- <input type="text" name="weblink"> -->
      </div>
    </div>
    </div>
    <div class="end">
      
        <input type="submit" name="save" value="Save Data">
        <input type="button" value="Cancel">
      </div>
      
    </div>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>