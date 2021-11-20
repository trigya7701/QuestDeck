<?php

    $q_id=$_GET['q_id'];

    include '../pages/connection.php';
    $sql="SELECT * FROM `questions` WHERE q_id=$q_id";

    $result=mysqli_query($conn,$sql);

    if($result){
        $row=mysqli_fetch_assoc($result);
    }

    $c_descError="";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['c_desc']) ){

        $c_desc=$_POST['c_desc'];

        if(empty($c_desc)){
            $c_descError="* Please enter some text";
        }
        else{
            $sql="INSERT INTO `comments` ( `c_desc`, `user_id`, `q_id`, `c_likes`)
             VALUES ('$c_desc', '1', '$q_id', '0')";

            $result=mysqli_query($conn,$sql);

            if($result){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment was posted . Thanks for contributing.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else{
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }





?>


<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $row['q_title']; ?></h5>
            <p class="card-text"><?php  echo $row['q_desc']; ?></p>
            <p class="card-text"><small class="text-muted">Posted on <?php  echo $row['q_timestamp']; ?> </small></p>
            <button type="button" class="btn btn-danger btn-sm">Add to Bookmarks</button>
        </div>

    </div>

    <h4>Reply to the Question</h4>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post your answer</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="c_desc" rows="3"></textarea>
            <p class="comment-err"><?php   echo $c_descError; ?></p>

        </div>

        <input type="submit" class="btn btn-danger" value="Submit" name="submit"></input>
    </form>

</div>