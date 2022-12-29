<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
	<style>
body {
	margin: 0;
	padding: 0;
	background: url(img/cosmetic3.jpg);
	background-size: cover;
	font-family: sans-serif;
	position: center;
}
table{
	margin-left: auto;
	margin-right: auto;
}
.loginbox{
	width: 320px;
	height: 420px;
	background:  rgba(0,0,0,0.5);
	color: pink;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
}

h1 {
	margin: 0;
	padding: 0 0 25px;
	text-align: center;	font-size: 50px;
	color:purple;
	

}
.loginbox td{
	margin: 0;
	padding: 0;
	font-weight: inherit;
}
.loginbox input{
	width: 100%;
	margin-bottom: 20px;
}
.loginbox input[type="text"], input[type="password"]
{
	border: none;
	border-bottom: 10px solid #fff;
	background: trasparent;
	outline: none;
	height: 40px;
	color: black;
	font-size: 20px;
    border-radius: 20px;
}
.loginbox input[type="submit"]
{
	border: none;
	outline: none;
	height: 40px;
	background: purple;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
	cursor: pointer;
	background: pink;
	color: #000;
}
.loginbox a{
	text-decoration: none;
	font-size: 20px;
	line-height: 20px;
	color: purple;
    background:  rgba(0,0,0,0.4);
}
.loginbox a:hover
{
	color: purple;
}
	</style>
</head>

<body>
   <?php
      if (isset($_GET["error"])){
		  $error = $_GET["error"];
	  }
	  else{
		  $error = "";
	  }
	  $message = "";
	  if ($error=="failed"){
		  $message = "Failed to login, please login again";
	  }
	  ?>
	  <div class="loginbox">
	  <h1>Login Here</h1>
	  
	  <p style="color:red"><?php echo $message;?></p>
	  <form action="multiProcess.php" method="post">
	  <table>
	     <tr>
		     <td>Username:</td>
			 <td><input type="text" name="username" size="20"></td>
		</tr>
		 <tr>
		     <td>Password:</td>
			 <td><input type="password" name="password" size="20"></td>
		</tr>
		 <tr>
		     <td>&nbsp;</td>
			 <td><input type="submit" name="login" value="Login"></td>
		</tr>
		</table>
	   <a href="http://localhost/FinalProject/register.html"> Don't have an account?</a>
	</form>
	</div>
</body>
</html>