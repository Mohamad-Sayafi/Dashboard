<?php
require_once '../loader.php';
session_start();
$user = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .tabs {
      overflow: hidden;
      background-color: #f1f1f1;
    }

    .tabs {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f1f1f1;
    }

    .tablink {
      background-color: #ccc;
      border: none;
      outline: none;
      padding: 10px 15px;
      cursor: pointer;
      transition: 0.3s;
      width: 15%;
      text-align: center;
      border-radius: 8px;
      margin: 0 5px;
    }



    .product-list {
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 25px;
      max-width: 900px;
      margin: 0 auto;
    }

    .product-card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      padding: 20px;
      gap: 20px;
      min-height: 160px;
    }

    .product-card img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .product-info {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 140px;
      flex: 1;
      position: relative;
    }

    .product-info h3 {
      margin: 0;
      font-size: 22px;
      color: #333;
    }

    .product-info .category {
      font-size: 14px;
      color: #888;
      margin-top: 6px;
    }

    .product-info .price {
      font-size: 18px;
      color: #007bff;
      font-weight: bold;
      margin-top: 10px;
    }

    .product-info p {
      font-size: 14px;
      color: #555;
      margin-top: 10px;
      line-height: 1.3;
    }

    .tablink:hover {
      background-color: #ddd;
    }

    .tablink.active {
      background-color: #2196F3;
      color: white;
    }

    .tabcontent {
      display: none;
      padding: 20px;
      border-top: none;
    }

    #Clothing,
    #Shoes,
    #Accessories,
    #Digital {
      background-color: #f9f9f9;
      height: 200px;
    }
  </style>
</head>

<body>

  <div class="tabs">
    <button class="tablink active" data-tab="Clothing">Clothing</button>
    <button class="tablink" data-tab="Shoes">Shoes</button>
    <button class="tablink" data-tab="Accessories">Accessories</button>
    <button class="tablink" data-tab="Digital">Digital</button>
  </div>

  <div id="Clothing" class="tabcontent">
    <?php
    $sql = "SELECT * FROM `products` WHERE `user_id` = '$user' AND `product_category`='clothing'";
    $output = db_select($sql);
    foreach ($output as $item) {
    ?>
      <div class="product-list">
        <div class="product-card">
          <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
          <div class="product-info">
            <h3><?php echo $item['product_title']; ?> </h3>
            <div class="category">Category : <?php echo $item['product_category']; ?> </div>
            <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
            <p><?php echo $item['product_caption']; ?> </p>
            <form action="" method="post" id="delete_product" class="delete-form" onsubmit="return myFunction()">
              <input type="hidden" name="product_id" id="delet_pro" value="<?php echo $item['procuct_id']; ?>">
              <button type="submit" class="delete-btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div id="Shoes" class="tabcontent">
    <?php
    $sql = "SELECT * FROM `products` WHERE `user_id` = '$user' AND `product_category`='shoes'";
    $output = db_select($sql);
    foreach ($output as $item) {
    ?>
      <div class="product-list">
        <div class="product-card">
          <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
          <div class="product-info">
            <h3><?php echo $item['product_title']; ?> </h3>
            <div class="category">Category : <?php echo $item['product_category']; ?> </div>
            <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
            <p><?php echo $item['product_caption']; ?> </p>
            <form action="" method="post" id="delete_product" class="delete-form" onsubmit="return myFunction()">
              <input type="hidden" name="product_id" id="delet_pro" value="<?php echo $item['procuct_id']; ?>">
              <button type="submit" class="delete-btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div id="Accessories" class="tabcontent">
    <?php
    $sql = "SELECT * FROM `products` WHERE `user_id` = '$user' AND `product_category`='accessories'";
    $output = db_select($sql);
    foreach ($output as $item) {
    ?>
      <div class="product-list">
        <div class="product-card">
          <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
          <div class="product-info">
            <h3><?php echo $item['product_title']; ?> </h3>
            <div class="category">Category : <?php echo $item['product_category']; ?> </div>
            <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
            <p><?php echo $item['product_caption']; ?> </p>
            <form action="" method="post" id="delete_product" class="delete-form" onsubmit="return myFunction()">
              <input type="hidden" name="product_id" id="delet_pro" value="<?php echo $item['procuct_id']; ?>">
              <button type="submit" class="delete-btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div id="Digital" class="tabcontent">
    <?php
    $sql = "SELECT * FROM `products` WHERE `user_id` = '$user' AND `product_category`='digital'";
    $output = db_select($sql);
    foreach ($output as $item) {
    ?>
      <div class="product-list">
        <div class="product-card">
          <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
          <div class="product-info">
            <h3><?php echo $item['product_title']; ?> </h3>
            <div class="category">Category : <?php echo $item['product_category']; ?> </div>
            <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
            <p><?php echo $item['product_caption']; ?> </p>
            <form action="" method="post" id="delete_product" class="delete-form" onsubmit="return myFunction()">
              <input type="hidden" name="product_id" id="delet_pro" value="<?php echo $item['procuct_id']; ?>">
              <button type="submit" class="delete-btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <script>
    $(document).ready(function() {
      $("#" + $(".tablink.active").data("tab")).show();
      $(".tablink").click(function() {
        var tabName = $(this).data("tab");
        $(".tabcontent").hide();
        $("#" + tabName).show();
        $(".tablink").removeClass("active");
        $(this).addClass("active");
      });
    });
  </script>

</body>

</html>