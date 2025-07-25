<?php
require_once '../loader.php';
session_start();

$user = $_SESSION['user_id'];

$sql = "SELECT *FROM products WHERE `user_id`= $user";
$output = db_select($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Your Product Page</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/main.js"></script>
  
  <style>
    body {
      font-family: 'Vazir', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      direction: ltr;

    }

    .logout-btn {
      position: absolute;
      left: 20px;
      transform: translateY(-50%);
      background-color: #343a40;
      border: none;
      cursor: pointer;
      font-size: 24px;
      padding: 0;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      display: inline-block;
    }

    .logout-btn a {
      display: inline-block;
      color: #fff;
      padding: 6px 14px;
      border-radius: 8px;
      text-decoration: none;
    }

    .logout-btn:hover {
      background-color: #495057;
    }

    .logout-btn:hover a {
      text-decoration: none;
    }
    header {
      background-color: #ffffff;
      padding: 20px 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .product-info {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 140px;
      flex: 1;
    }

    .delete-form {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .delete-btn {
      background: transparent;
      border: none;
      color: #e74c3c;
      font-size: 20px;
      cursor: pointer;
      padding: 4px;
      transition: color 0.3s ease;
    }

    .delete-btn:hover {
      color: #c0392b;
    }

    .title {
      font-size: 28px;
      font-weight: bold;
      color: #333;
      text-align: center;
    }

    .logout-btn {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      background-color: #343a40;
      border: none;
      color: #fff;
      cursor: pointer;
      font-size: 24px;
      padding: 6px 14px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    #delet_product {
      position: fixed;
      top: 10px;
      left: 10;
    }

    .add-btn {
      position: absolute;
      right: 40px;
      background-color: #343a40;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      padding: 0;
    }

    .add-btn .add {
      display: inline-block;
      color: white;
      padding: 12px 30px;
      text-decoration: none;
    }


    .add-btn:hover .add {
      text-decoration: none;
    }

    .logout-btn {
      
      border: none;
      cursor: pointer;
      position: absolute;
      left: 40px;
      padding: 0;
    }

    .logout-btn a {
      color: white;
      display: inline-block;
      padding: 8px 12px;
      text-decoration: none;
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



    @media (max-width: 600px) {
      .product-card {
        flex-direction: column;
        min-height: auto;
        text-align: center;
      }

      .product-card img {
        margin: 0 auto;
      }

      .product-info {
        height: auto;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="title">Your Product</div>

    <button class="logout-btn" aria-label="Logout" title="Logout"">
     <a href="panel.php"> <i class=" fas fa-arrow-left" style="color: white;"></i></a>
    </button>

    <button class="add-btn">
      <a class="add" href="add_products.php">Add Product</a>
    </button>

  </header>
  <?php foreach ($output as $item) {
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
</body>
<script>
  function myFunction() {
    return confirm("Are you sure you want to delete this?");
  }
</script>

</html>