<div class="search">
    <form action="../pages/search_profile.php" class="input-group mb-3" method="GET">


        <input type="text" class="form-control" placeholder="Find User" aria-label="Recipient's username"
            name="searchuser" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>


    </form>

    <div class="search-users">

        <h5>Top Users</h5>

        <ol class="list-group list-group-numbered">

            <?php
              include "../pages/connection.php";

              $sqldisplayUsers="SELECT * FROM `users` ORDER BY user_rept DESC LIMIT 5";
              $resultdisplayUser=mysqli_query($conn,$sqldisplayUsers);

              if($resultdisplayUser){

                while($row=mysqli_fetch_assoc($resultdisplayUser)){
                  echo' <a href="./user_details.php?u_id='.$row["user_id"].'"><li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                  <div class="fw-bold">'.$row["user_mainname"].'</div>
                                  '.$row["user_name"].'
                              </div>
                              <span class="badge bg-primary rounded-pill">'.$row["user_rept"].'</span>
                          </li></a>';
                }
              }
              else{
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops!</strong> Something went wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
              }


            ?>


        </ol>

    </div>

    <div class="card" style="width: 17rem; margin: 3% 0;">
        <div class="card-body">

            <p class="card-text">Get in touch email us at <strong>questdeck.noreply@gmail.com</strong>.</p>

        </div>
    </div>

</div>