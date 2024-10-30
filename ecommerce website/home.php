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
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/flower.png" alt="">
         </div>
         <div class="content">
            <span>Pressed flowers</span>
            <h3>Customize Now!</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/niceLife.png" alt="">
         </div>
         <div class="content">
            <span>Have a nice life</span>
            <h3>latest tees</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/coffee.png" alt="">
         </div>
         <div class="content">
            <span>Happy thoughts & coffee tee</span>
            <h3>Latest designs</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

 <!-- Artists' Hub Section -->
 <section class="artists-hub">
        <div class="artists-info">  
                <h2>Artists' Hub</h2>
                <p>Find unique tees designed by artits from all over the world</p>
                

          
            
            <button class="show-all-btn"><a href="products.html"></a>Shop Now! &gt;</button>


        </div>
        <div class="product-grid">
            <div class="product-card" data-product-id="1">
                <img src="images/niceLife.png" alt="Make A Life">
                <h3>Have a nice life tee</h3>
                <p>R149.99</p>
                <button class="add_to_cart">Add to Cart</button>
            </div>
            <div class="product-card" data-product-id="2">
                <img src="images/good.png" alt="Take The Good Stuff">
                <h3>See the Good Stuff</h3>
                <p>R159.99</p>
                <button class="add_to_cart">Add to Cart</button>
            </div>
            <div class="product-card" data-product-id="3">
                <img src="images/coffee.png" alt="Happy Thoughts">
                <h3>Happy Thoughts & Coffee</h3>
                <p>R169.99</p>
                <button class="add_to_cart">Add to Cart</button>

            </div>
            <div class="product-card" data-product-id="4">
                <img src="images/flower.png" alt="Pressed Flowers">
                <h3>Pressed Flowers Tee</h3>
                <p>R159.99</p>
                <button class="add_to_cart">Add to Cart</button>

            </div>
        </div>
    </section>
<section class="home-products">

   <h1 class="heading">latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>



</body>
</html>