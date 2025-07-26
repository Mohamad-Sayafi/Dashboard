<?php
require_once '../loader.php';
session_start();
$action = $_POST['action'];

if ($action == 'register') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed = md5($confirm_password);

    if (empty($email)) {
        $result = [
            'failed' => 'Inter your email'
        ];
    }

    if (empty($password) || empty($confirm_password)) {
        $result = [
            'failed' => 'Inter and confirm your password.'
        ];
    }

    if ($password !== $confirm_password) {
        $result = [
            'failed' => 'password is incorrect'
        ];
    } else {
        $user_data = [
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $hashed
        ];

        $result = db_insert('user', $user_data);

        if ($result) {
            $connection = db_connection();
            $sql = " SELECT * FROM `user` WHERE `user_email` = '$email'";
            $output = db_select_one($sql);
            $_SESSION['user_id'] = $output['user_id'];
            $result = [
                'success' => 'you registerd successfully.'
            ];
        } else {
            echo "register failed.";
        }
    }
    echo json_encode($result);
    exit;
} elseif ($action == 'login') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $result = [
            'failed' => 'Please fill in both email and password.'
        ];
    }

    $sql = "SELECT *FROM `user` WHERE `user_email`='$email'";
    $user = db_select_one($sql);

    if (!$user) {
        $result = [
            'failed' => 'Invalid email or password.'
        ];
    } elseif (md5($password) == $user['user_password']) {
        $_SESSION['user_id'] = $user['user_id'];
        $result = [
            'success' => 'you logined'
        ];
    } else {
        $result = [
            'failed' => 'email ro password is wrong.'
        ];
    }

    echo json_encode($result);
    exit;
} elseif ($action == 'change_info') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed = md5($confirm_password);

    if (empty($email)) {
        $result = [
            'failed' => 'Inter your email'
        ];
    }

    if (empty($password) || empty($confirm_password)) {
        $result = [
            'failed' => 'Inter and confirm your password.'
        ];
    }

    if ($password !== $confirm_password) {
        $result = [
            'failed' => 'password is incorrect'
        ];
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $hashed = md5($confirm_password);
        $user_id = $_SESSION['user_id'];



        $sql = "UPDATE user SET user_name = '$name', user_email = '$email', user_password = '$hashed' WHERE user_id = '$user_id'";
        $output = mysqli_query(db_connection(), $sql);
        $result = [
            'success' => 'your data changed.'
        ];
        echo json_encode($result);
        exit;
    }
} elseif ($action == 'add_products') {

    $name = $_POST['name'];
    $caption = $_POST['caption'];
    $cost = $_POST['cost'];
    $category = $_POST['category'];


    if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) {
        $temp_file = $_FILES['myFile']['tmp_name'];
        $upload_dir = '../uploads/';
        $new_name = 'file_' . time() . '.png';
        if (!move_uploaded_file($temp_file, $upload_dir . $new_name)) {
            $result = [
                'failed' => 'uploding failed.'
            ];
            echo json_encode($result);
            exit;
        }
        $photo_name = $new_name;
    } else {
        $result = [
            'failed' => 'File not choosed.'
        ];
        echo json_encode($result);
        exit;
    }

    $errors = [];

    if (empty($name)) {
        $errors[] = 'enter product name.';
    }

    if (empty($caption)) {
        $errors[] = 'enter product caption.';
    }

    if (!$cost) {
        $errors[] = 'enter product price.';
    }

    if (count($errors) > 0) {
        $result = [
            'failed' => implode('<br>', $errors)
        ];
        echo json_encode($result);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $title = $name;
    $caption = $caption;
    $cost = $cost;
    $category = $category;

    $data = [
        'user_id' => $user_id,
        'product_title' => $title,
        'product_caption' => $caption,
        'product_category' => $category,
        'product_price' => $cost,
        'photo_name' => $photo_name
    ];

    if (db_insert('products', $data)) {
        $result = [
            'success' => 'product added.'
        ];
    } else {
        $result = [
            'failed' => 'adding product failed.'
        ];
    }
    echo json_encode($result);
    exit;
} elseif ($action == 'delet_products') {
    $id =  $_POST['product_delet'];
    $user_id = $_SESSION['user_id'];

    $connection = db_connection();
    $sql = "DELETE FROM `products` WHERE `procuct_id`='$id'";
    mysqli_query($connection, $sql);
    $result = [
        'success' => 'Product deleted.'
    ];
    echo json_encode($result);
    exit;
} elseif ($action == 'search') {
    $word = $_POST['word'];
    $sql = "SELECT * FROM products WHERE `product_title` LIKE '$word%'";
    $connection = db_connection();
    $result = mysqli_query($connection, $sql);
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            ul {
                list-style: none;
                padding: 0;
            }

            ul li {
                background-color: #f1f3f5;
                border: 1px solid #ced4da;
                border-radius: 0.5rem;
                padding: 1rem;
                margin-bottom: 0.75rem;
                font-size: 1rem;
                color: #343a40;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
            }

            .product-list {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .product-card {
                width: 100%;
                max-width: 300px;
                margin: 10px;
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 15px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .product-card img {
                width: 100%;
                height: auto;
                border-radius: 8px;
            }

            .product-info h3 {
                font-size: 1.2rem;
                margin-top: 10px;
            }

            .category,
            .price,
            .product-caption {
                font-size: 1rem;
                color: #666;
                margin: 5px 0;
            }

            .delete-btn {
                background-color: red;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 5px;
            }

            .delete-btn i {
                font-size: 1.2rem;
            }
        </style>
    </head>

    <body>
        <ul>
            <?php
            foreach ($output as $item) {
                $photo_name = isset($item['photo_name']) ? $item['photo_name'] : 'default.jpg';
                $product_title = isset($item['product_title']) ? $item['product_title'] : 'Product name not set.';
                $product_category = isset($item['product_category']) ? $item['product_category'] : 'Product category not set.';
                $product_price = isset($item['product_price']) ? $item['product_price'] : 'Product price not set.';
                $product_caption = isset($item['product_caption']) ? $item['product_caption'] : 'Product caption not set.';
                $product_id = isset($item['product_id']) ? $item['product_id'] : '';
            ?>
                <div class="product-list">
                    <div class="product-card">
                        <img src="../uploads/<?php echo $photo_name; ?>" alt="Product Image" />
                        <div class="product-info">
                            <h3><?php echo $product_title; ?> </h3>
                            <div class="category">Category: <?php echo $product_category; ?> </div>
                            <div class="price"><?php echo $product_price . '$'; ?> </div>
                            <p class="product-caption"><?php echo $product_caption; ?> </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </ul>
    </body>

    </html>

<?php
}
?>