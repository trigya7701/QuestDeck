<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Styles/profile.css">
</head>
<body>
    <?php
        include "../components/navbar.php";
    ?>
    <div class="edit">
        <input type="button" value="Edit Profie">
    </div>
    <div class="container">
  <div class="row">
    <div class="col-sm-3">
      <img src="../Images/profile.jpeg" alt="Trigya">
    </div>
    <div class="col flex-column mar">
      <h1>rr701</h1>
      <!-- title -->
      <p>I am a coder</p>
      <div class="flex-row">
        <i class="bi bi-person-badge"> Member since 1 year</i>
        <i class="bi bi-clock-history"> Last visited on </i>
      </div>
      <!-- links -->
      <div class="flex-row">
          <i class="bi bi-github"> Github link</i>
          <i class="bi bi-linkedin"> Linkedin link</i>
          <i class="bi bi-link"> Website link</i>
      </div>
      <!-- <p><i>Member since 1 year</i><i>Last visited on </i></p> -->
    </div>
    <div class="col flex-column">
      <h3>About</h3>
      <p>I am Trigya Roy. Who lives in shrinagar. You can follow me to get updates of shrinagar</p>
    </div>
  </div>
</div>
<div class="stats-data">
<h4>Stats</h4>
<div class="stats">
    <div class="reputation">
        <p>10</p>
        <p>reputation</p>
    </div>
    <div class="reached">
        <p>10</p>
        <p>reached</p>
    </div>
    <div class="answers">
        <p>10</p>
        <p>answers</p>
    </div>
    <div class="questions">
        <p>10</p>
        <p>questions</p>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>