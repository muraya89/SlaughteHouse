<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminstyles.css">
</head>
<body>

  <div class="login">
    <h1>Login</h1>
    <p>Welcome admin</p>
  </div>

<div class="admin">
<!-- form for admin login -->
<form action="includes/admin.inc.php" method="post">
	<input type="text" name="username" placeholder="Enter your username">
	<br>
	<input type="password" name="password" placeholder="Enter your password">
	<br>
	<button name="login_submit" class="sendbtn" type="submit">Login</button>
</form>
</div>
</body>
</html>