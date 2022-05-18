<!DOCTYPE html>
<html lang="en ua">
<head>
<head>
  <meta charset="UTF-8">
  <title>10k random</title>
  <link rel="icon" type="image/x-icon" href="images/android-chrome-512x512.png">
  <link rel="stylesheet" href="stylesheets/styleLight.css" id="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="scripts.js"></script>
</head>

<body onload="pageView()">
<nav>
  <?php include "php/navigation.php" ?>
</nav>

<!--form should pop-up after click on "Profile" if user isn't logged in / open a page with user's data if logged in-->
<form action="" id="auth" method="post" style="display:none;">
  <?php include "php/auth.php"?>
</form>

<div class="content">
  <?php include "php/tables.php";?>
  <div class="left stat">
  <p>Top players</p>
  <?php topFifteen();?>
  </div>
  <div class="left stat">
  <p>Not so top players</p>
  <?php bottomFifteen();?> 
  </div>
  <div class="left stat">
  <p>Overall statistics</p>
  <?php mediocre();?> 
  </div>
</div>
  
<footer>
  <?php include "php/footer.php"?>
</footer>
</body>    
</html>