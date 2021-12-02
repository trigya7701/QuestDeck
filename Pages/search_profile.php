<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Styles/about.css">
</head>

<body>

    <?php include '../components/navbar.php';
    include '../pages/connection.php';
    
    $searchUser=$_GET['searchuser'];

    
    ?>

    <div class="container my-3  ">
        <h2>Search results for <em>"<?php  echo $searchUser;  ?>"</em></h2>
        <div class="mt-4 p-4   rounded ">
            <div class="list-group">

                <?php
                    $serachUser=$_GET['searchuser'];
                    $sqlsearch="SELECT * FROM `users` WHERE  MATCH (user_mainname,user_name) against('$serachUser');";
                    $resultsearch=mysqli_query($conn,$sqlsearch);

                    if($resultsearch){
                        
                        $num=mysqli_num_rows($resultsearch);

                        if($num==0){
                            echo'<div class="container mt-3">
                            <div class="mt-4 p-5 bg-light text-black rounded">
                                
                                <div class="mb-3">
                                    <h2>Your search - <em>"'.$searchUser.'" </em>- did not match any documents.</h2>
                                    <p>
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                                    </p>
            
                                </div>
            
                               
                            </div>
                        </div>';
                        }
                        else{

                            while($row=mysqli_fetch_assoc($resultsearch)){
                                $url="user_details.php?u_id=".$row['user_id'];
                                echo'<a href="'.$url.'" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">'.$row['user_mainname'].'</h5>
            
                                </div>
                                <p class="mb-1">'.$row['user_name'].'.</p>
                                
                            </a>';
                            }
                        }
                    }
                    else{
                        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Something went wrong .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                ?>




            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>