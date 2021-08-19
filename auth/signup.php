<!DOCTYPE html>
<html>
<head>
<title>Create an account</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<style>
		body{
      background: linear-gradient(95deg,  #a0609f ,#f59e9d );
		}
	</style>
</head>
<body>



  <div class="nav">
      <input type="checkbox" id="nav-check">
      <div class="nav-header">
          <div class="logo">
            <img src="../public/images/slaughterhouse.jpeg" alt="">
          </div>
        <div class="nav-title">
          <a href="../index.php"><b><strong> The Meat Hook</strong></b></a>
        </div>
      </div>
      <div class="nav-btn">
        <label for="nav-check">
          <span></span>
          <span></span>
          <span></span>
        </label>
      </div>
      <div class="nav-links">
        <a href="../about.php">About</a>
        <a href="../faq.php">FAQ</a>
  
        <!-- search bar -->
        <!-- <div class="search">
            <form action="">
              <input type="text" placeholder="Search...">
            <div class="searchbtn">
              <button type="submit" name="Submit">Submit</button>
            </div>
            </form>
        </div> -->
      </div>
    </div>
  <div class="effect">    
    <h1>JOIN THE SLAUGHTERHOUSE</h1>
    <p>Already have an account? <a href="login.php">LOGIN</a></p>  
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
          } elseif ($_GET['error'] == "accountError") {
            echo '<p class = "err">Account type required!</p>';
          } elseif($_GET['signup']== "success") {
            echo '<p> class = "err"Signup Successful!</p>';
          }
        }
      ?>
    <form method="POST" action="../app/auth/Register.php">
      <input type="text" name="cname" class="input-box" placeholder="Company Name" >
      <br>
      <input type="text" name="email" class="input-box" placeholder="Email">
      <br>
      <input type="text" name="phoneno" class="input-box" placeholder="Phone Number">
      <br>
      <input type="text" name="address" class="input-box" placeholder="Address">
      <br>
      <div class="radio">
        <div class="radio1">
        <input type="radio" value="supplier" name="accounttype">
        <label for="supplier">Supplier</label>
        </div>
        <div class="radio1">
        <input type="radio" value="customer" name="accounttype" >
        <label for="customer">Customer</label>
        </div>
      </div>
      <input type="password" name="password" class="input-box" placeholder="Enter Password">
      <br>
      <input type="password" name="cpassword" class="input-box" placeholder="Confirm Password">
      <br>
      <input type="hidden" name="table" value="users" />
      <input type="hidden" name="redirect_to" value="../../auth/signup.php" />
      <button type="submit" class="sendbtn" name="signup_submit">Sign up</button>
    </form>
  </div>
</body>


</html>

