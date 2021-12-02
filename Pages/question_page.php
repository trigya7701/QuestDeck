<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <!-- <link rel="stylesheet" href="../Styles/home_style.css">     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Styles/question_page.css">
    <!-- <script src="../Scripts/question_page.js"></script> -->
</head>

<body>
    <?php
    include "../components/navbar.php";
    ?>
    <?php
                include "connection.php";
                //cookie and the checking part goes her
                $q_titleError="";
                $q_descError="";
               
                 if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['submit'])){
                    $q_title=$_POST['q_title'];
                    $q_desc=$_POST['q_desc'];

                
                    if($q_title!=''){
                        
                      
                            $q_titleError="";
                        
                        
                    }
                    else{
                        $q_titleError="* Please Enter the Question title";
                    }

                    if($q_desc!=''){
                        
                       
                            $q_descError="";
                        
                        
                    }
                    else{
                        $q_descError="* Please elaborate your question.";
                    }

                    if($q_titleError=="" && $q_descError==""){
                        
                            $u_id=$_SESSION['Id'];
                            $q_title=str_replace("<","&lt;",$q_title);
                            $q_title=str_replace(">","&gt;",$q_title);

                            $q_desc=str_replace("<","&lt;",$q_desc);
                            $q_desc=str_replace(">","&gt;",$q_desc);

                            $sql="INSERT INTO `questions` ( `q_title`, `q_desc`, `user_id`) VALUES ( ?,?,?)";
                            $stmt=mysqli_prepare($conn,$sql);
                            mysqli_stmt_bind_param($stmt,"sss",$q_title,$q_desc,$u_id);
                            $result=mysqli_stmt_execute($stmt);



                           

                            
                            if($result==1){
                                    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Your post was submiited . Wait for comunity to respond.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                                   //updating user_question field


                                    $getUserQuesSql="SELECT * FROM `users` WHERE `user_id`='$u_id'";
                                    $getUSerQuesResult=mysqli_query($conn,$getUserQuesSql);
                                    $row=mysqli_fetch_assoc($getUSerQuesResult);
                                    $ques=$row['user_question']+1;
                                    $rep=ceil(($row["user_answer"])/2+($ques)/3);
                                   $updateQuesSql="UPDATE `users` SET user_question='$ques', user_rept='$rep' WHERE `user_id`='$u_id'";
                                   $updateQuesResult=mysqli_query($conn,$updateQuesSql);
                            }
                            else{
                                echo "Here";
                                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failure!</strong> Your post was submiited . Wait for comunity to respond.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }


                    }





            }

    ?>

    <div class="main">

        <div class="container mt-3">

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                Tips to ask Good Questions
            </button>
        </div>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Asking Good Question</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6> You’re ready to ask your question and the community is here to help! To get you the best
                            answers with specific coding, algorithm, or language problems.<br><br>Avoid asking
                            opinion-based questions., we’ve provided some guidance:<br><br>Before you post, search the
                            site to make sure your question hasn’t been answered. </h6>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <code>1.</code> Summarize your problem
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><code>Include details about your goal</code></li>
                                            <li><code>Describe expected and actual results</code></li>
                                            <li><code>Include any error messages</code></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <code>2.</code> Describe what you have tried
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Show what you’ve tried and tell us what you found (on
                                        this site or elsewhere) and why it didn’t meet your needs. You can get better
                                        answers when you provide research.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <code>3.</code> Show some code
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">When appropriate, share the minimum amount of code
                                        others need to reproduce your problem (also called a minimum, reproducible
                                        example).</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



        <div class="container mt-3">

            <form action="" method="POST">
                <div class="mt-4 p-5 bg-light text-black rounded">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="q_title" id="exampleFormControlInput1"
                            placeholder="Question Title">
                        <p class="err-design"><?php   echo"$q_titleError"; ?></p>

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Elaborate your Question</label>
                        <textarea class="form-control" name="q_desc" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                        <p class="err-design"><?php   echo"$q_descError"; ?></p>

                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-danger " value="Reset" name="reset"></input>
                        <input type="submit" class="btn btn-danger " value="Post" name="submit"></input>
                    </div>
                </div>
            </form>



        </div>


        <!-- <div class="line"></div>
            <div class="rightbox">
                <input type="button" value="Tips to ask good Question" onclick="tips()" id="tipper">
            </div>
            <div class="content">
                <div class="maincontent">
                    <div class="title">
                        <h4>Title</h4>
                        <p>Be specific and imagine that you are asking question to another person</p>
                        <input type="text" name="title">
                    </div>
                    <div class="description">
                        <h4>Description</h4>
                        <p>Includes everythig that is required to answer</p>
                        <input type="text" name="desc" id="desc">
                        <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                    </div>
                    <div class="buttons">
                        <input type="button" value="Reset">
                        <input type="button" value="Post">
                    </div>
                </div>
            </div>
            <div class="mainpopup" id="mainpopup">
                <div class="pop">
                    <div class="cancel">
                        <p>X</p>
                    </div>
                    <h2>Asking a good question</h2>
                    <p>You’re ready to ask your first question and your campus community is here to help you! To get you the best answers, we’ve provided some guidance</p>
                    <p>Before you ask make sure your question hasb not been answered</p>
                </div>
            </div> -->
    </div>
    <?php include '../components/footer.php';  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>