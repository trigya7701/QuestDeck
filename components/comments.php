<?php

    $q_id=$_GET['q_id'];
    
    include '../pages/connection.php';

   
    $sql="SELECT * FROM `comments` WHERE q_id='$q_id'";
    $result=mysqli_query($conn,$sql);
   

    $num=mysqli_num_rows($result);

    if($num>0){

        echo '<div class="comment-header">

                 <h4>Comments </h4>
            </div>';

        while($row=mysqli_fetch_assoc($result)){?>

        <div class="d-flex comment">
            <div class="flex-shrink-0">
                <img src="../images/user.png" class="rounded-circle" alt="Sample Image">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5><?php
                        $user_id=$row['user_id'];
                        $sqlName="SELECT user_name FROM `users` WHERE user_id='$user_id'";

                        $resutName=mysqli_query($conn,$sqlName);
                        
                        $rowName=mysqli_fetch_assoc($resutName);
                        echo $rowName['user_name'];
                            
                    ?>

                    <small class="text-muted"><i>Posted on <?php echo $row["c_timestamp"]; ?></i></small>
                </h5>
                <p><?php echo $row["c_desc"];?></p>
                <form action="" method="POST">
                    <?php
                if($flag==1)
                {
                    echo '<button name="like" type="submit" class="btn btn-light btn-sm position-relative">
                        <img src="../images/like-icon.png" alt="Like Icon" />
                        <span class="badge bg-danger">';
                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["like"])){
                            $newLikes=$row["c_likes"]+1;
                            $id=$row["c_id"];
                            $sql1="UPDATE `comments` SET `c_likes` ='$newLikes'
                            WHERE `comments`.`c_id` = '$id'";
                            $result1=mysqli_query($conn,$sql1);
                            $row['c_likes']=$row['c_likes']+1;
                        }
                    echo $row['c_likes'].'
                        </span>
                    </button>';
                }
                ?>
                </form>

            </div>


        </div>
     <?php
        }


        
    }
    else{
        echo'<div class="container mt-3">
                <div class="mt-4 p-5 bg-light text-black rounded">
                    
                    <div class="mb-3">
                        <h2>No comments yet !!</h2>
                        <p>Be the first person to comment.</p>

                    </div>

                   
                </div>
            </div>';
    }






?>