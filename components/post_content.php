
<?php

    $q_id=$_GET['q_id'];

    include '../pages/connection.php';

    $sql="SELECT * FROM `questions` WHERE q_id=$q_id";

    $result=mysqli_query($conn,$sql);

    if($result){
        $row=mysqli_fetch_assoc($result);
    }
?>


<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $row['q_title']; ?></h5>
            <p class="card-text"><?php  echo $row['q_desc']; ?></p>
            <p class="card-text"><small class="text-muted">Posted on <?php  echo $row['q_timestamp']; ?> </small></p>
        </div>

    </div>

    <h4>Reply to the Question</h4>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post your answer</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

    </div>

    <button type="button" class="btn btn-danger">Submit</button>

</div>

