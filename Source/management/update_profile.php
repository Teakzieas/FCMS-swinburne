<?php

include '../components/connect.php';

session_start();

$man_id = $_SESSION['man_id'];

if(!isset($man_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);



   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $select_old_pass = $conn->prepare("SELECT password FROM `management` WHERE id = ?");
   $select_old_pass->execute([$man_id]);
   $fetch_prev_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);
   $prev_pass = $fetch_prev_pass['password'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = sha1($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         if($new_pass != $empty_pass){
            $update_pass = $conn->prepare("UPDATE `management` SET password = ? WHERE id = ?");
            $update_pass->execute([$confirm_pass, $man_id]);
            $message1[] = 'password updated successfully!';
         }else{
            $message[] = 'please enter a new password!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile Update</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/man_header.php' ?>

<!-- admin profile update section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>update manager profile</h3>
      <input type="text" hidden name="name" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" placeholder="<?= $fetch_profile['name']; ?>">
      <input type="password" name="old_pass" maxlength="20" placeholder="enter your old password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" maxlength="20" placeholder="enter your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_pass" maxlength="20" placeholder="confirm your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>

<!-- admin profile update section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>