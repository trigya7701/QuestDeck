<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <style>
        <?php     include '../Styles/home_style.css';?> 
    </style>

    <title>QuestDeck</title>
  </head>
  <body>
   
            <?php

            // Navbar
            include '../components/navbar.php';
            if($flag==1)
            {
              include '../components/bookmark.php';
            }
            ?>
            

            <div class="main row">
              
                <div class="col-lg-9">
                    <?php include '../components/posts.php'; ?>
                </div>
                <!-- // Posts -->
                
                <div class="col-lg-3">
                    <?php include '../components/searchBar.php'; ?>
                </div>

                <!-- // Search Bar -->
                

            </div>

            <!-- // Footer -->

                

       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

