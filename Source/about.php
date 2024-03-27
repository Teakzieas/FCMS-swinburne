<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
   <h3>about us</h3>
   <p><a href="home.php">home</a> <span> / about</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>
At FoodEdge Gourmet Catering, we excel as your premier catering partner for numerous reasons. Our talented culinary team is devoted to crafting gastronomic delights, ensuring that each dish is an exquisite masterpiece. Our extensive menu boasts a variety of options, including hors d'oeuvres, main courses, beverages, and desserts, catering to a wide array of preferences. We prioritize quality by sourcing only the freshest, top-tier ingredients to deliver a flavor-packed culinary experience.

In addition to our delectable offerings, our welcoming ambiance, seamless service, and dedication to fostering community connections make partnering with us an unforgettable affair, distinguishing FoodEdge Gourmet Catering as the preferred choice for discerning food connoisseurs!</p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>choose order</h3>
         <p>
Opt for our 'Custom Order' feature and tailor your catering experience to your preferences, ensuring a personalized and gratifying culinary journey with FoodEdge Gourmet Catering.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>fast delivery</h3>
         <p>Experience swift and efficient service with our expedited delivery option, ensuring that your delectable meals from FoodEdge Gourmet Catering arrive on time and in pristine condition at your desired location.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>enjoy food</h3>
         <p>
Indulge in the exceptional flavors and culinary delights offered by FoodEdge Gourmet Catering, where every dish is intricately crafted to provide you with an unforgettable experience.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->




















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>