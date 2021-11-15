<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../Styles/view_post.css"> -->
    <style>
    <?php include '../Styles/view_post.css';
    ?>
    </style>
    <title>QuestDeck | View Post</title>
</head>

<body>

    <!-- Navbar -->
    <?php  include '../components/navbar.php';?>

    <!-- Post Content -->
    <?php      
    include '../components/post_content.php';
    
    ?>

    <!-- Comments Section  -->
    <?php 
    include '../components/comments.php';
    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>