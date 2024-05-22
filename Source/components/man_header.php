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
         <div class="dropdown">
            <button id="normal3" class="dropbtn" style="background-color: #fec901; color: black;    font-family: 'Rubik', sans-serif;font-size: 2rem;">Admin</button>
            <div class="dropdown-content">
               <a href="admin_accounts.php">Managers Accounts</a>
               <a href="operators_accounts.php">Operators Accounts</a>
            </div>
         </div>
         <a id="normal2" href="admin_accounts.php">Managers Accounts</a>
         <a id="normal"  href="operators_accounts.php">Operators Accounts</a>
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
         </div>
         <a href="../components/man_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>
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