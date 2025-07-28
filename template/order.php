<?php
require_once '../loader.php';
session_start();


$user = $_SESSION['user_id'];

$sql = "SELECT * FROM orders WHERE `user_id`='$user'";
$output = db_select($sql);

$products = [];
foreach ($output as $order) {
    $product_id = $order['product_id'];
    $sql2 = "SELECT * FROM products WHERE `procuct_id`='$product_id'";
    $output2 = db_select($sql2);
    $products = array_merge($products, $output2);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Your orders Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #343a40;
            color: white;
            z-index: 1000000;
            position: relative;
        }

        .title {
            font-size: 28px;
            font-weight: 700;
            margin-right: auto;
        }

        .logout-btn,
        .add-btn {
            background-color: #495057;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
            display: inline-flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }

        .logout-btn a,
        .add-btn a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .logout-btn i,
        .add-btn i {
            margin-right: 8px;
        }

        .logout-btn:hover,
        .add-btn:hover {
            background-color: #6c757d;
            transition: background-color 0.3s ease;
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            position: relative;
        }

        #wordInput {
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 250px;
            font-size: 16px;
            transition: width 0.3s ease;
            z-index: 100000000;
        }

        #wordInput:focus {
            border-color: #007bff;
            outline: none;
            width: 300px;
        }

        .search-btn {
            background-color: #6c757d;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 10px;
            z-index: 100000000;
        }

        .search-btn i {
            color: white;
            font-size: 16px;
        }

        .search-btn:hover {
            background-color: #95989bff;
            transition: background-color 0.3s ease;
        }

        #result {
            position: sticky;
            top: 0;
            z-index: 100000;
            display: none;
        }

        @media (max-width: 768px) {
            .title {
                font-size: 22px;
            }

            #wordInput {
                width: 180px;
            }

            .search-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-btn {
                margin-top: 10px;
            }
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

        .search {
            display: flex;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            display: none;
            z-index: 1000;
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
        <div class="title">Your orders</div>
        <a href="panel.php" class="logout-btn" aria-label="Logout" title="Logout">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </header>

    <div id="result" class="output-box mt-4 empty"></div>
    <div class="product-list">
        <?php foreach ($products as $item) { ?>
            <div class="product-card">
                <img src="../uploads/<?php echo $item['photo_name']; ?>">
                <div class="product-info">
                    <h3><?php echo $item['product_title']; ?></h3>
                    <div class="category">Category: <?php echo $item['product_category']; ?></div>
                    <div class="price"><?php echo $item['product_price'] . '$'; ?></div>
                    <p><?php echo $item['product_caption']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>