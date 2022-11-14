<?php session_start();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Password</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<style>
		body{
      background: linear-gradient(95deg,  #a0609f ,#f59e9d );
		}    
    input:required {
      border-color: #800000;
      border-width: 3px;
    }
    input:required:invalid {
      border-color: red;
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
  <div class="effect" style="height: 30%; width: 40%;">    
    <h1>Update Password</h1>
    <!-- create an error message if the user made an error trying to create an account -->
      <?php
        if(isset($_GET['error'])) {
          if($_GET['error']=="doesNotExist"){
            echo '<p class = "err">User does not exist!</p>';
          } else if($_GET['error']=="404"){
            echo '<p class = "err">An error occured try again later!</p>';
          }
        }
        $data = [];
        if (isset($_GET['value'])) {
        //   for decoding stored data when the edit button is selected
          $data = json_decode(base64_decode($_GET['value']));
          // var_dump($data);die();
        }
      ?>
    <form method="POST" action="../app/auth/updatePassword.php" style="overflow-y: auto;">
        <input type="password" name="password" required class="input-box" placeholder="Enter Password" value="<?= isset($_GET['value']) && isset($data->password) ? $data->password : ''; ?>">
        <br>
        <input type="password" name="newpassword" required class="input-box" placeholder="Confirm Password" value="<?= isset($_GET['value']) && isset($data->cpassword) ? $data->cpassword : ''; ?>">
        <br>        
        <input type="hidden" id="id" name="id" value="<?=$id?>"><br><br>
		<button name="update_submit" class="sendbtn" type="submit">Update</button>
    </form>
  </div>
</body>
<script>
    function back(){
        window.history.back();
    };
</script>

</html>