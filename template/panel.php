<?php
require_once '../loader.php';
session_start();

$sql = "SELECT *FROM products ";
$output = db_select($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 1rem;
        }

        #sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.2s ease;
        }

        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
            border-left: 4px solid #ff6f00;
        }

        #content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
        }

        #header {
            height: 60px;
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            margin-bottom: 2rem;
        }

        #header h4 {
            margin: 0;
            color: #ff6f00;
            font-weight: 700;
        }

        .card {
            border-radius: 0.5rem;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .card .card-body h5 {
            color: #343a40;
            font-weight: 700;
        }

        .card .card-body p {
            color: #6c757d;
            font-size: 0.9rem;
        }

        #content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
            background-color: #fff;
            border-radius: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        #content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 0.5rem;
        }

        #content header .title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #343a40;
        }

        #content header .logout-btn,
        #content header .add-btn {
            background-color: #ff6f00;
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 0.3rem;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-left: 1rem;
        }

        #content header .logout-btn:hover,
        #content header .add-btn:hover {
            background-color: #e65c00;
        }

        .product-list {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 1.5rem;
            padding-bottom: 0.5rem;
        }

        .product-list {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
            justify-content: center;
        }

        .product-card {
            flex: 0 0 66.66%;
            min-width: 400px;
            max-width: 900px;
            height: 250px;
            background-color: #ffffff;
            border-radius: 1rem;
            display: flex;
            flex-direction: row;
            cursor: pointer;
            border: 1px solid #d5d8d8ff;
            transition: none;
            position: relative;
        }

        .product-card:hover {
            transform: none;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 1px solid #d5d8d8ff;
            margin: auto 2rem auto 2rem;
            flex-shrink: 0;
        }

        .product-info {
            padding: 1.5rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            justify-content: center;
            flex-grow: 1;
            text-align: left;
        }

        .product-info h3 {
            margin: 0;
            font-size: 1.6rem;
            color: #343a40;
        }

        .product-info .category {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .product-info .price {
            font-weight: 700;
            color: #ff6f00;
            font-size: 1.3rem;
        }

        .product-info p {
            font-size: 1rem;
            color: #495057;
        }



        .order_product {
            position: absolute;
            top: 30px;
            right: 20px;
            margin: 0;
            display: inline-block;
        }


        .order-btn {
            background-color: #ff6f00;
            border: none;
            color: white;
            padding: 6px 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-btn:hover {
            background-color: #b47c27ff;
        }



        @media (max-width: 768px) {
            #sidebar {
                position: relative;
                height: auto;
                max-width: 100%;
            }

            #content {
                margin-left: 0;
            }
        }

        .order-btn {
            position: relative;
        }

        .order-btn::before {
            content: "Add to orders.";
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: black;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            margin-bottom: 6px;
        }

        .order-btn:hover::before {
            opacity: 1;
        }
    </style>
</head>

<body>

    <nav id="sidebar">
        <div class="text-center mb-4">
            <h3 style="color:#ff6f00; font-weight:700;">Panel</h3>
        </div>
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a class="nav-link active">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_info.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Your Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product_category.php">Your Products Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Your Orders</a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <header>
            <div class="title">Products</div>
        </header>

        <?php foreach ($output as $item) { ?>
            <div class="product-list">
                <div class="product-card">
                    <img src="../uploads/<?php echo $item['photo_name']; ?>">
                    <div class="product-info">
                        <h3><?php echo $item['product_title']; ?> </h3>
                        <div class="category">Category : <?php echo $item['product_category']; ?> </div>
                        <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
                        <p><?php echo $item['product_caption']; ?> </p>
                        <form action="#" method="post" class="order_product">
                            <input id="product_id" type="hidden" name="product_id" value="<?php echo $item['procuct_id']; ?>">
                            <button type="submit" class="order-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>