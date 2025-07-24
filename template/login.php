<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Light Modern Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <style>
    body {
      background: #f0f2f5;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-card {
      background: #ffffff;
      padding: 40px 35px;
      border-radius: 0.5rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      width: 380px;
    }

    h2 {
      color: #e65100;
      font-weight: 700;
      margin-bottom: 2rem;
      text-align: center;
    }

    label {
      color: #333333;
      font-weight: 600;
    }

    .form-control {
      background-color: #fafafa;
      border: 2px solid #ff9800;
      border-radius: 0.375rem;
      color: #333333;
      padding: 10px 12px;
      font-weight: 500;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
      transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    .form-control::placeholder {
      color: #b0b0b0;
    }

    .form-control:focus {
      background-color: #fff;
      border-color: #ef6c00;
      box-shadow: 0 0 8px rgba(239, 108, 0, 0.5);
      color: #222;
      outline: none;
    }

    .btn-primary {
      background-color: #ef6c00;
      border: none;
      border-radius: 0.5rem;
      font-weight: 700;
      padding: 12px 0;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #d84315;
    }

    .register-text {
      margin-top: 20px;
      text-align: center;
      font-size: 1rem;
      color: #333333;
    }

    .register-text a {
      color: #ef6c00;
      text-decoration: none;
      font-weight: 700;
    }

    .register-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="form-card">
    <h2>Login</h2>
    <form action="" method="post" id="loginForm">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" required />
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="register-text">
      If you don't have an account,
      <a href="../index.php">register now</a>.
    </p>
  </div>
</body>

</html>