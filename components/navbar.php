<?php
  session_start();
?>
<?php
  if(isset($_SESSION["name"]))
  {
    $name=$_SESSION["name"];
  }
  else
  {
    header("Location:../Pages/loginform.php");
  }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../Styles/navbar.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
<nav class="navbar navbar-expand-lg   navbar-theme ">
  <div class="container-fluid">
    <a class="navbar-brand navbar-content" href="../Pages/home.php">QuestDeck</a>
  
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon navbar-toggle-btn"><i class="bi bi-list"></i></span>
    </button>
    <div class="collapse navbar-collapse navbar-header" id="navbarSupportedContent">

      <form class="d-flex navbar-form">
          
        <input class="form-control me-2 navbar-searchbar" type="search" placeholder="Search Posts" aria-label="Search">
        <button class="btn btn-light btn" type="submit">Search</button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navbar-content" aria-current="page" href="../Pages/home.php">Home</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-content" href="../Pages/question_page.php">Create Post</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-content" href="#">About Us</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  navbar-content" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hi,<?php echo " $name" ?> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../Pages/profile.php">My Account</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../Pages/logout.php">Logout</a></li>
          </ul>
        </li>

    

        
        
      </ul>
      
    </div>
  </div>
</nav>