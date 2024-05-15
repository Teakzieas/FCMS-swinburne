<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">

   <h3>messages</h3>
   <p><a href="html.php">home</a> <span> / messages</span></p>
</div>

<section class="orders">

   <h1 class="title">your messages</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY `id` DESC");
         $select_orders->execute([$user_id]);
         $x = 0;
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
               $x= $x+1;
               
               if ($x == 1){
                  
                  if(isset($_GET['order'])) {


                  ?>
                  
                      <div class="box" id="glow">
                        <a href="print.php?order=<?= $fetch_orders['id']; ?>"><button style="float:right;padding:10px;background:#fed330;border-radius:10px;font-size:15px;font-weight:600;">Print</button></a>
                        <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
                        <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                        <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                        <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                        <p>address : <span><?= $fetch_orders['address']; ?></span></p>
                        <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
                        <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                        <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                        <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                        <p>Note FromFoodEdge : <span><?php if($fetch_orders['msg']==""){echo "-";}else{echo $fetch_orders['msg'];} ?></span></p>

                     </div>
                      <script>
                        var glowDiv = document.getElementById("glow");
                        var count = 0;
                        var interval = setInterval(function() {
                           if (count < 10) {
                             if (count % 2 === 0) {
                               glowDiv.style.backgroundColor = "#fed330";
                             } else {
                              glowDiv.style.backgroundColor = "WHITE";
                             }
                             count++;
                           } else {
                             clearInterval(interval);
                           }
                        }, 200);
                      </script>
                     
                  <?php
               }
            }
               else
               {
                  ?>
                  <div class="box">
                     <a href="print.php?order=<?= $fetch_orders['id']; ?>"><button style="float:right;padding:10px;background:#fed330;border-radius:10px;font-size:15px;font-weight:600;">Print</button></a>
                     <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
                     <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                     <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                     <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                     <p>address : <span><?= $fetch_orders['address']; ?></span></p>
                     <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
                     <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                     <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                     <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                     <p>Note FromFoodEdge : <span><?php if($fetch_orders['msg']==""){echo "-";}else{echo $fetch_orders['msg'];} ?></span></p>

                  </div>
                  <?php
               }
   ?>
   
   <?php
      }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      }
   ?>

   </div>

</section>










<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

