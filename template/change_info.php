<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <title>Edit data</title>
    <style>
                .logout-btn {
            position: absolute;
            left: 20px;
            top: 5%;
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

    </style>
</head>

<body>

    <div class="container" style="max-width: 500px; margin-top: 50px;">
        <h4 class="mb-4 text-center">Edit data</h4>
        <div class="logout-btn">
            <a href=" user_info.php">  <i class=" fas fa-arrow-left" style="color: white;"></i></a>
        </div>
        <form action="" method="post" id="change_info">

            <div class="mb-3">
                <label for="name" class="form-label">New Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">New Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
        </form>
    </div>
</body>

</html>