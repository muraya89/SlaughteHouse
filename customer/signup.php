<!DOCTYPE html>
<html>
<head>
<title>Create an account</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>

  
  
  <div class="joinin">
    <h1>JOIN THE SLAUGHTERHOUSE</h1>
    <p>Already have an account? <a href="login.php">LOGIN</a></p>
  </div>
<!-- create an error message if the user made an error trying to create an account -->
  <?php
    if(isset($_GET['error'])) {
      if($_GET['error']=="emptyfields"){
        echo '<p class = "err">Fill in all fields!</p>';
      }
      elseif($_GET['error']== "invalidemail") {
        echo '<p class = "err">Provide a valid email!</p>';  
      }
      elseif ($_GET['error'] == "invalidpassword") {
         // code...
        echo '<p class = "err">Enter password!</p>';
      }
      elseif ($_GET['error'] == "invalidPassword") {
         // code...
        echo '<p class = "err"> Password should be atleast 8 characters long and should include at least one number, one uppercase letter and one special character </p>';
      }
      elseif($_GET['error']== "passwordCheck") {
        echo '<p class = "err">Your passwords do not match!</p>';
      }elseif($_GET['error'] == "dberror") {
          // code...
      echo '<p class = "err">Unsuccessful Signup!</p>';
      }
      elseif($_GET['signup']== "success") {
        echo '<p> class = "err"Signup Successful!</p>';
      }
    }
  ?>

  
</body>


</html>
