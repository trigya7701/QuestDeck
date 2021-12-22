<?php

    $q_id=$_GET['q_id'];
   

    include '../pages/connection.php';
    $sql="SELECT * FROM `questions` WHERE q_id=$q_id";

    $result=mysqli_query($conn,$sql);

    if($result){
        $rowQuestion=mysqli_fetch_assoc($result);
    }

    $c_descError="";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['c_desc']) ){

        $c_desc=$_POST['c_desc'];
        $u_id=$_SESSION['Id'];

        if(empty($c_desc)){
            $c_descError="* Please enter some text";
        }
        else{
            $c_desc=str_replace("<","&lt;",$c_desc);
            $c_desc=str_replace(">","&gt;",$c_desc);

            // $sql="INSERT INTO `comments` ( `c_desc`, `user_id`, `q_id`, `c_likes`)
            //  VALUES ('$c_desc', '$u_id', '$q_id', '0')";
            
            $sql="INSERT INTO `comments` ( `c_desc`, `user_id`, `q_id`, `c_likes`) VALUES ( ?,?,?,?)";
                $stmt=mysqli_prepare($conn,$sql);
                $likes="0";
                mysqli_stmt_bind_param($stmt,"ssss",$c_desc,$u_id,$q_id,$likes);
                $result=mysqli_stmt_execute($stmt);
                            // $result=mysqli_query($conn,$sql);

            if($result){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment was posted . Thanks for contributing.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    $getUserQuesSql="SELECT * FROM `users` WHERE `user_id`='$u_id'";
                    $getUSerQuesResult=mysqli_query($conn,$getUserQuesSql);
                    $row=mysqli_fetch_assoc($getUSerQuesResult);
                    $ans=$row['user_answer']+1;
                    $rep=ceil(($row["user_question"])/3+($ans)/2);
                    $updateQuesSql="UPDATE `users` SET user_answer='$ans', user_rept='$rep' WHERE `user_id`='$u_id'";
                    $updateQuesResult=mysqli_query($conn,$updateQuesSql);
            }
            else{
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> Your answer was not posted .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }


    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['bookmark'])){

        
        $user_id=$_SESSION["Id"];
        $sqlcheckBookmark="SELECT * FROM `bookmark_posts` WHERE user_id='$user_id' AND q_id='$q_id'";
        $resultcheckBookmark=mysqli_query($conn,$sqlcheckBookmark);

        $num=mysqli_num_rows($resultcheckBookmark);
        if($num==1){
            echo'<div class="alert alert-info alert-dismissible fade show" role="alert">
            Question aldready added  .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
        

                $sqlBookmark="INSERT INTO `bookmark_posts` (`user_id`, `q_id`) VALUES ('$user_id','$q_id' )";
                $resultBookmark=mysqli_query($conn,$sqlBookmark);

                if($resultBookmark){
                    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Question added to bookmark posts .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else{
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failed!</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['remove'])){
        $user_id=$_SESSION["Id"];

       $sqlremoveBookmark="DELETE FROM `bookmark_posts` WHERE user_id='$user_id' AND q_id='$q_id'";
       $resultremoveBookmark=mysqli_query($conn,$sqlremoveBookmark);

       if($resultremoveBookmark){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Question removed from bookmark posts .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
         //updating user_answer field

        
       }
       else{
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
       }
    }



?>
<?php 
            $user_id=$rowQuestion['user_id'];
             $getUserSql="SELECT * FROM `users` WHERE `user_id`='$user_id'";
                    $getUSerResult=mysqli_query($conn,$getUserSql);
                    $rowUser=mysqli_fetch_assoc($getUSerResult); ?>

<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $rowQuestion['q_title']; ?></h5>
            <p class="card-text"><?php  echo $rowQuestion['q_desc']; ?></p>
            <p class="card-text"><small class="text-muted">Posted on <?php  echo $rowQuestion['q_timestamp']; ?> </small></p>
            <p class="card-text"><small class="text-muted">Posted by <a href=<?php echo "./user_details.php?u_id=".$user_id;?>><strong><?php echo $rowUser['user_name']; ?>
                </small></strong></p></a>
                
            <form action="" method="POST">

                <?php
                 if($flag==1){
                    $user_id=$_SESSION["Id"];
                    $sqlbuttonType="SELECT * FROM `bookmark_posts` WHERE user_id='$user_id' AND q_id='$q_id'";
                    $resultbuttonType=mysqli_query($conn,$sqlbuttonType);

                    $num=mysqli_num_rows($resultbuttonType);
                    if($num==0){
                        echo'<button type="submit" class="btn btn-danger btn-sm" name="bookmark">Add to Bookmarks</button>';
                    }
                    else{
                        echo'<button type="submit" class="btn btn-danger btn-sm" name="remove">Remove Bookmark</button>';
                    }
                }

                ?>

            </form>
        </div>

    </div>

    <h4>Reply to the Question</h4>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post your answer</label>
            <?php
            if($flag==1)
            {
            echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="c_desc" rows="3"></textarea>
            <p class="comment-err"><?php   echo $c_descError; ?></p>';
            }
            ?>

        </div>
        <?php
            if($flag==1)
            {
            echo '<input type="submit" class="btn btn-danger" value="Submit" name="submit"></input>';
        }
        else
        {
            echo '<input type="submit" class="btn btn-danger" value="Submit" name="submit" disabled="disabled"></input>';
        }
            ?>
        <!-- <input type="submit" class="btn btn-danger" value="Submit" name="submit"></input> -->
    </form>

</div>