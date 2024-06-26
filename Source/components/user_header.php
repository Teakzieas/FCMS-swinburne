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
      <div class="message" style="background-color: green">
         <span>'.$message1.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header" style="background: #fec901;">

   <section class="flex">
   

   <a href="home.php" class="logo">
   <img src="images/LYgjKqzpQb.png" alt="Yum-Yum Logo" width="100" height="100"></a>

      <nav class="navbar">
          <a href="home.php">Home</a>
          <a href="about.php">About</a>
          <a href="menu.php">Menu</a>
          <a href="orders.php">Orders</a>
          <a href="contact.php">Contact</a>
          <a href="messages.php">Messages</a>
          <div id="normal3" class="dropdown">
            <button class="dropbtn" style="background-color: #fec901; color: black;    font-family: 'Rubik', sans-serif;font-size: 2rem;">Admin</button>
            <div class="dropdown-content">
            <a  href="management/admin_login.php">Management Portal</a>
            <a  href="operation/admin_login.php">Operation Portal</a>
               
            </div>
          </div>
         <a id="normal" href="management/admin_login.php">Management Portal</a>
         <a id="normal2" href="operation/admin_login.php">Operation Portal</a>
          <style>
            
            .dropdown {
               display: inline-block;
               position: relative;
            }

            .dropdown-content {
               display: none;
               position: absolute;
               background-color: #f9f9f9;
               min-width: 160px;
               box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
               z-index: 1;  
            }

            .dropdown-content a {
               color: black;
               padding: 12px 16px;
               text-decoration: none;
               display: block;
            }

            .dropdown-content a:hover {
               background-color: #f1f1f1;
            }

            .dropdown:hover .dropdown-content {
               display: block;
            }
            
            /* Add the same style as the current website */
            .dropdown-content {
               background-color: #fec901;
               color: white;
            }

            .dropdown-content a {
               color: white;
            }

            .dropdown-content a:hover {
               background-color: #feca02;
            }
          </style>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
               var dropdown = document.querySelector(".dropdown");
               dropdown.addEventListener("click", function() {
                 this.querySelector(".dropdown-content").classList.toggle("show");
               });
            });
               
                  setInterval(function() {
                     if (window.innerWidth > 1200) {
                        document.getElementById("normal").style.display = "none";
                        document.getElementById("normal2").style.display = "none";
                        document.getElementById("normal3").style.display = "inline-block";
                     }
                     else
                     {
                        document.getElementById("normal").style.display = "block";
                        document.getElementById("normal2").style.display = "block";
                        document.getElementById("normal3").style.display = "none";
                     }
                  }, 100);
              
            
          </script>
          
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <?php
            if(!isset($_SESSION['user_id'])){
               echo 
               '
               <p class="account">
               <a href="login.php">login</a> or
               <a href="register.php">register</a>
               </p> 
               ';
            };
         ?>
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

