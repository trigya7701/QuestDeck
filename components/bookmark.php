<div class="bookmark-section">
    <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Bookmarked Posts</button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Saved Posts</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="list-group">
                <?php


                        //check for user authentication


                            include "../pages/connection.php";
                            $user_id=$_SESSION["Id"];
                            $sql="SELECT * FROM `bookmark_posts` WHERE user_id='$user_id'";
                            $result=mysqli_query($conn,$sql);

                            if($result){
                                $num=mysqli_num_rows($result);
                                if($num>0){
                                    
                                    while($row=mysqli_fetch_assoc($result)){

                                        $q_id=$row['q_id'];

                                        $sqlQuestion="SELECT * FROM `questions` WHERE q_id='$q_id'";
                                        $resultQuestions=mysqli_query($conn,$sqlQuestion);

                                        $rowQuestion=mysqli_fetch_assoc($resultQuestions);
                                        $postUrl="../pages/view_post.php?q_id=".$q_id;
                                        echo'<a href="'.$postUrl.'" class="list-group-item list-group-item-action">'.$rowQuestion['q_title'].' 
                                                <span>
                                                <form action="" method="POST">
                                               <button
                                                type="submit" class="btn btn-primary btn-sm" name="remove" onClick="remover('.$q_id.')">Remove</button>
                                                </form>
                                                </span></a>';

                                                
                                    }
                                }
                                else{
                                    echo'<div class="alert alert-info alert-dismissible fade show" role="alert">
                                    No Bookmarks Posts yet!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                }
                            }
                            else{
                                echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    No Bookmarks Posts yet!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                            }

                           

                            ?>



            </div>
        </div>
    </div>
</div>


