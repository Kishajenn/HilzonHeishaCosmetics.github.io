<?php
     include "config.php";
	 
	 $username = $_POST["username"];
	 $password = md5($_POST["password"]);
	 
	 $query = "SELECT * FROM user WHERE username ='$username' && password='$password'";
	 $result = mysqli_query($conn, $query);
	 $row = mysqli_fetch_assoc($result);
	 
	 if($row['level'] == "1"){
		 header("Location:home1.html");
	 }
	 else if($row['level'] == "2"){
		header("Location:home.html");
	}
	
	 else{
		 header("Location:index.php?error=failed");
	 }
?>