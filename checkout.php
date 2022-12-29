<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $region = $_POST['region'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];
 
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
       while($product_item = mysqli_fetch_assoc($cart_query)){
          $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
          $product_price = number_format($product_item['price'] * $product_item['quantity']);
          $price_total += $product_price;
       };
    };

    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, region, street, city, province, country, pin_code, total_products, total_price) 
    VALUES('$name','$number','$email','$method','$region','$street','$city','$province','$country','$pin_code','$total_product','$price_total')") or die('query failed');
 
    if($cart_query && $detail_query){
       echo "
       <div class='order-message-container'>
       <div class='message-container'>
          <h3>thank you for shopping!</h3>
          <div class='order-detail'>
             <span>".$total_product."</span>
             <span class='total'> total : $".$price_total."/-  </span>
          </div>
          <div class='customer-details'>
             <p> your name : <span>".$name."</span> </p>
             <p> your number : <span>".$number."</span> </p>
             <p> your email : <span>".$email."</span> </p>
             <p> your address : <span>".$region.", ".$street.", ".$city.", ".$province.", ".$country." - ".$pin_code."</span> </p>
             <p> your payment mode : <span>".$method."</span> </p>
             <p>(*pay when product arrives*)</p>
          </div>
             <a href='user.php' class='btn'>continue shopping</a>
          </div>
       </div>
       ";
    }
 
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Check Out</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<div class="container">

<section class="checkout-form">

<h1 class="heading">complete your order</h1>


<form action="" method= "post">
<div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₱<?= $grand_total; ?>/- </span>
   </div>
<div class="flex">
         <div class="inputBox">
            <span>Full Name</span>
            <input type="text" placeholder="Enter Your Name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Phone Number</span>
            <input type="number" placeholder="Enter Your Phone Number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Enter Your Email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Devlivery</option>
               <option value="credit cart">Credit Card</option>
               <option value="Gcash">Gcash</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Region</span>
            <input type="text" placeholder="Region" name="region" required>
         </div>
         <div class="inputBox">
            <span>Barangay</span>
            <input type="text" placeholder="e.g. Apatot" name="street" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Candon " name="city" required>
         </div>
         <div class="inputBox">
            <span>Province</span>
            <input type="text" placeholder="e.g. Ilocos Sur" name="province" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Philippines" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>
</body>

<script src="js/script.js"></script>

</body>
</html>