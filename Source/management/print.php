<?php
include '../components/connect.php';


session_start();


if(isset($_GET['order'])){
    $order_id = $_GET['order'];
}
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
   

<?php



$select_orders = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
$select_orders->execute([$order_id]);
$x = 0;
?> 
<section class="orders">
<div class="box-container">
<?php
if($select_orders->rowCount() > 0)
{
    while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC))
    {
        ?>
            <div class="box">
            <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
                <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                <p>Deliver on : <span><?= $fetch_orders['DeliveryTime']; ?></span></p>
                <p>address : <span><?= $fetch_orders['address']; ?></span></p>
                <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
                <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                <p>Note FromFoodEdge : <span><?= $fetch_orders['msg']; ?></span></p>

            </div>
            <?php
    }
}
        
?>
</div>
</section>

<script>
    print()
</script>
<script>
    window.onafterprint = function() {
        window.history.back();
    };
</script>
