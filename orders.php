<!DOCTYPE HTML>
<html>
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
    <title>Customer Data</title>
</head>
<body>
    
<?php include 'header.html';?>
<h1 class="h1"> CUSTOMER DATA</h1>
<div class="order">
  <table>
     <table>
     <tr>
	     <th> ID </th>
		   <th> Name </th>
       <th>Phone Number</th>
		   <th> Email </th>
		   <th> Payment Method </th>
       <th> Region</th>
       <th> Street</th>
       <th> City</th>
         <th> Province</th>
         <th> Country</th>
         <th>Postal Code</th>
         <th>Order</th>
         <th>Total payment</th>
	</tr>
	
  <?php
      include "config.php";
      $orders = mysqli_query($conn, "SELECT * FROM `order`");
      if(mysqli_num_rows($orders) > 0){
         while($row = mysqli_fetch_assoc($orders)){
      ?>
	<tr>
	    <td> <?php echo $row["id"]; ?> </td>
	    <td> <?php echo $row["name"]; ?> </td>
	    <td> <?php echo $row["number"]; ?> </td>
		  <td> <?php echo $row["email"]; ?> </td>
	    <td> <?php echo $row["method"]; ?> </td>

        <td><?php echo $row["region"]; ?></td>
        <td><?php echo $row["street"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["province"]; ?></td>
        <td><?php echo $row["country"]; ?></td>
        
        <td><?php echo $row["pin_code"]; ?></td>
        <td> <?php echo $row["total_products"]; ?> </td>
        <td> <?php echo $row["total_price"]; ?> </td>   
	 </tr>
	 <?php
		 }
	 }
	 else{
		 echo "0 results";
	 }
	?>
  </div>
  </table>
  </body>
  </html>
	   