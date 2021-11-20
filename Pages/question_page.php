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
                include "connection.php";
                //cookie and the checking part goes her
                $q_titleError="";
                $q_descError="";
               
                 if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['submit'])){
                    $q_title=$_POST['q_title'];
                    $q_desc=$_POST['q_desc'];

                
                    if($q_title!=''){
                        
                        if(!preg_match("^[a-zA-Z\s]+$^",$q_title)){
                            $q_titleError="* Please enter a valid question title";
                        }
                        
                    }
                    else{
                        $q_titleError="* Please Enter the Question title";
                    }

                    if($q_desc!=''){
                        
                        if(!preg_match("^[a-zA-Z\s]+$^",$q_desc)){
                            $q_descError="* Please enter a valid question description";
                        }
                        
                    }
                    else{
                        $q_descError="* Please elaborate your question.";
                    }

                    if($q_titleError=="" && $q_descError==""){
                        

                            $sql="INSERT INTO `questions` ( `q_title`, `q_desc`, `user_id`)
                             VALUES ( '$q_title', '$q_desc','1')";

                            $result=mysqli_query($conn,$sql);

                            if($result){
                                    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Your post was submiited . Wait for comunity to respond.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                            }
                            else{
                                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your post was submiited . Wait for comunity to respond.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }


                    }





            }

    ?>


    <?php
    include "../components/navbar.php";
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
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Some text to enable scrolling..</h3>
                        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat.</p>

                        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat.</p>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>