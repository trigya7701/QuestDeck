<?php

  include "../pages/connection.php";

  $sql="SELECT * FROM `questions`  ORDER BY q_timestamp DESC LIMIT 3";

  $result=mysqli_query($conn,$sql);

  if($result){

    $num=mysqli_num_rows($result);

    if($num>0){

      while ($row=mysqli_fetch_assoc($result)) {
        echo'<div class="card post-theme">
                <h5 class="card-header">'.$row["q_title"].'</h5>
                <div class="card-body ">
                  <h5 class="card-title">
                      <span class="d-inline-block text-truncate" style="max-width: 250px;">'.
                      $row["q_desc"].'</span>
                  </h5>
                  
                  <a href="../pages/view_post.php?q_id='.$row["q_id"].'" class="btn btn-danger btn-sm">View Post</a>
                </div>
              </div>';
      }
    }
    
  }

?>




