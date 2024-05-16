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

   <div style="text-align:center">
      <h1 class="title" style="display: inline-block; text-align: center;">your messages</h1>
      <a class="button" href="contact.php" style="margin:20px;background-color: #e74c3c;; border-radius:10px;font-size: 3rem;    font-family: 'Rubik', sans-serif;    font-weight: bold;color:white;padding:10px">New Message</a>

   </div>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `messages` WHERE user_id = ? ORDER BY `id` DESC");
      $select_orders->execute([$user_id]);
      $x = 0;
      if($select_orders->rowCount() > 0)
      {
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC))
         {
            ?>
               <div class="box">
                  <p>Sent on : <span><?= $fetch_orders['event_timestamp']; ?></span></p>
                  <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                  <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                  <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                  <p style="border: 3px solid;width=100%;padding:10px">message : <br><span><?= $fetch_orders['message']; ?></span></p>
                  <p style="border: 3px solid;width=100%;padding:10px">Response : <br><span><?php if($fetch_orders['Response']==""){echo "-";}else{echo $fetch_orders['Response'];} ?></span></p>
               </div>
            <?php
         }
      }
      else
      {
         echo '<p class="empty">no messages yet!</p>';
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

