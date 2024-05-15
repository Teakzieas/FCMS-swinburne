<?php

include '../components/connect.php';

session_start();

$man_id = $_SESSION['man_id'];

if(!isset($man_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_users = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_users->execute([$delete_id]);
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_order->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users Accounts</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/man_header.php' ?>

<!-- user accounts section starts  -->

<section class="accounts">

   <h1 class="heading">users account</h1>
   <div class="search-bar" style="text-align: center;padding:20px;font-size:25px;">
      <form action="" method="GET">
         <input type="text" name="search" placeholder="Search by username" style="font-size:20px;border-color:gray;border-style: solid;border-radius:10px;padding:10px">
         <button type="submit" name="submit" style="font-size:20px;background:#fed330;padding:10px;border-radius:10px;" >Search</button>
         <a href="users_accounts.php"><button style="color:white;font-size:20px;background:#e74c3c;padding:10px;border-radius:10px;">Reset</button></a>
      </form>
         </div>
   <div class="box-container">


   <?php
      $search = isset($_GET['search']) ? $_GET['search'] : '';
      if(isset($_GET['submit'])){
         $select_account = $conn->prepare("SELECT * FROM `users` WHERE name like ?");
         $select_account->execute([$search]);
      }
      else
      {
         $select_account = $conn->prepare("SELECT * FROM `users`");
         $select_account->execute();
      }
      if($select_account->rowCount() > 0){
         while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <p> user id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> username : <span><?= $fetch_accounts['name']; ?></span> </p>
      <a href="users_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">delete</a>
      <a href="placed_orders.php?id=<?= $fetch_accounts['id']; ?>" class="btn">see orders</a>
   </div>
   <?php
      }
   }
   ?>


   </div>

</section>

<!-- user accounts section ends -->







<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>