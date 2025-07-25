<?php
require_once '../loader.php';
session_start();
$user = $_SESSION['user_id'];

$sql = "SELECT *FROM user WHERE `user_id`= $user";
$output = db_select($sql);
$user_info = $output[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile Page</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            color: #222;
        }

        header {
            width: 100%;
            background-color: #f8f9fa;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            text-align: center;
            font-weight: 700;
            font-size: 30px;
            margin-top: 20px;
            user-select: none;
            color: #222;
        }

        .logout-btn {
            position: absolute;
            left: 20px;
            top: 50%;
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


        main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 20px 40px 20px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            border-radius: 12px;
            margin-top: 20px;

        }

        main img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        main h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #222;
        }

        main p {
            margin: 0;
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .edit-profile {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
        }

        .edit-profile {
            text-decoration: none;
        }

        .edit-profile:hover {
            background-color: #333;
        }

        @media (max-width: 400px) {
            header {
                font-size: 24px;
                margin-top: 30px;
            }

            main img {
                width: 120px;
                height: 120px;
                margin-top: 30px;
            }

            main h2 {
                font-size: 20px;
            }

            main .edit-profile {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        Profile
        <button class="logout-btn" aria-label="Logout" title="Logout"">
           <a href=" panel.php"> <i class=" fas fa-arrow-left" style="color: white;"></i></a>
        </button>
    </header>
    <main>
        <img src="../uploads/user.png" alt="Profile Picture" />
        <h2><?php echo $user_info['user_name']; ?></h2>
        <p><?php echo $user_info['user_email']; ?></p>
        <a href="change_info.php" class="edit-profile">Edit Profile</a>
    </main>
</body>

</html>