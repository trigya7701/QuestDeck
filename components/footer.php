<?php
$emailError="";
$f_descError="";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['feedback']) ){
    

    $f_email=$_POST['f_email'];
    $f_desc=$_POST['f_desc'];

    if(empty($f_email)){
        $emailError="Please Enter a email ";
    }
    if(empty($f_desc)){
        $f_descError="Please share some feedback";
    }

    if($emailError=="" && $f_descError==""){
        include '../pages/connection.php';

        $sqlFeedback="INSERT INTO `feedback`( `f_email`, `f_desc`) VALUES ('$f_email','$f_desc')";
        $result=mysqli_query($conn,$sqlFeedback);

        if($result){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>Thanks for sharing your feedback.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        else{
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Could not send your feedback .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }


    }
}

?>


<link rel="stylesheet" href="../Styles/footer.css">
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="single_footer">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Ask Anythng</a></li>
                        <li><a href="#">View Recent Posts</a></li>
                        <li><a href="#">About Us </a></li>
                        <li><a href="#">Connect with Others</a></li>
                      
                    </ul>
                </div>
            </div>
            <!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <h4>Get in Touch</h4>
                    <ul>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Simply dummy text</a></li>
                        <li><a href="#">The printing and typesetting </a></li>
                        <li><a href="#">Standard dummy text</a></li>
                        <li><a href="#">Type specimen book</a></li>
                    </ul>
                </div>
            </div>
            <!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <h4>Would Love to Hear From You !!</h4>
                    <div class="signup_form">
                        <form action="" method="POST" class="subscribe">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name='f_email' id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                                    <p class="comment-err"><?php   echo $emailError; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                                <textarea class="form-control" name='f_desc' id="exampleFormControlTextarea1" rows="3"></textarea>
                                <p class="comment-err"><?php   echo $f_descError; ?></p>
                            </div>
                            <button type="submit" class="btn btn-light" name='feedback'>Submit</input>

                        </form>
                    </div>
                </div>

            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <p class="copyright">Copyright © <a href="#">QuestDeck</a>  | All rights Reserved</p>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->
    </div>
    <!--- END CONTAINER -->
</div>


