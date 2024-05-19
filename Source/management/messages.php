<?php

include '../components/connect.php';

session_start();

$man_id = $_SESSION['man_id'];

if(!isset($man_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}

if(isset($_POST['update_message'])){

   $order_id = $_POST['order_id'];
   
   $msg = $_POST['response'];

   
   $update_status = $conn->prepare("UPDATE `messages` SET response = ? WHERE id = ?");
   $update_status->execute([$msg, $order_id]);
   $message1[] = 'payment status updated!';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Messages</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/man_header.php' ?>

<!-- messages section starts  -->

<section class="placed-orders">

   <h1 class="heading">messages</h1>

   <div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> name : <span><?= $fetch_messages['name']; ?></span> </p>
      <p> number : <span><?= $fetch_messages['number']; ?></span> </p>
      <p> email : <span><?= $fetch_messages['email']; ?></span> </p>
      <p> message : <span><?= $fetch_messages['message']; ?></span> </p>
      <form action="" method="POST">
         
         <input type="hidden" name="order_id" value="<?= $fetch_messages['id']; ?>">
         <br>
         <p>Response:</p>
         <input type="text" name="response" id="response" class="drop-down" value="<?= $fetch_messages['Response']; ?>">
         <div class="flex-btn">
            <input type="submit" value="update" class="btn" name="update_message">
            <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" class="delete-btn" onclick="return confirm('delete this message?');">delete</a>
         </div>
      </form>
        </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>