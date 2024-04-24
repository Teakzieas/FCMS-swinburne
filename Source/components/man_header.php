<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}


if(isset($message1)){
   foreach($message1 as $message1){
      echo '
      <div class="message1">
         <span>'.$message1.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   <link rel="stylesheet" href="css/style.css">


<header class="header" style="background: #fec901;">

   <section class="flex">

      <a href="dashboard.php" class="logo">Management<span>Panel</span></a>
      <img src="images/LYgjKqzpQb.png" width="100" height="100"></a>

      <nav class="navbar">
         <a href="dashboard.php">Home</a>
         <a href="products.php">Products</a>
         <a href="placed_orders.php">Orders</a>
         <a href="admin_accounts.php">Admins</a>
         <a href="users_accounts.php">Users</a>
         <a href="messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `management` WHERE id = ?");
            $select_profile->execute([$man_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update manager profile</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
         </div>
         <a href="../components/man_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>
