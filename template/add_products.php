<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Add Product</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      padding: 30px;
      direction: ltr;
      color: #343a40;
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

    form {
      background: #f9f9f9;
      padding: 30px 35px;
      border-radius: 8px;
      max-width: 480px;
      margin: auto;
      box-shadow: 0 2px 8px rgba(52, 58, 64, 0.1);
      color: #343a40;
    }

    h2 {
      margin-bottom: 25px;
      color: #ff6f00;
      text-align: center;
      font-weight: 700;
      letter-spacing: 1.1px;
    }

    label {
      display: block;
      margin-top: 18px;
      color: #343a40;
      font-weight: 600;
      font-size: 14px;
    }

    input[type="text"],
    input[type="number"],
    select {
      width: 100%;
      padding: 12px 15px;
      margin-top: 6px;
      border: 1.5px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      box-sizing: border-box;
      background-color: #fff;
      color: #343a40;
      transition: border-color 0.3s ease, background-color 0.3s ease;
      font-family: inherit;
      height: 44px;
    }

    textarea {
      width: 100%;
      padding: 12px 15px;
      margin-top: 6px;
      border: 1.5px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      box-sizing: border-box;
      background-color: #fff;
      color: #343a40;
      resize: vertical;
      min-height: 90px;
      transition: border-color 0.3s ease, background-color 0.3s ease;
      font-family: inherit;
      height: auto;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
      border-color: #ff6f00;
      background-color: #fff;
      outline: none;
      color: #343a40;
    }

    .file-upload-wrapper {
      margin-top: 10px;
      position: relative;
      width: 100%;
      height: 44px;
    }

    input[type="file"] {
      opacity: 0;
      position: absolute;
      width: 100%;
      height: 44px;
      top: 0;
      left: 0;
      cursor: pointer;
      z-index: 2;
    }

    .file-upload-button {
      position: absolute;
      top: 0;
      left: 0;
      height: 44px;
      width: 100%;
      border: 1.5px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      color: #343a40;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: border-color 0.3s ease, background-color 0.3s ease;
      user-select: none;
      z-index: 1;
    }

    .file-upload-button:hover {
      border-color: #ff6f00;
      background-color: #fff;
      color: #ff6f00;
    }

    #file-name {
      margin-top: 6px;
      font-style: italic;
      color: #666;
      font-size: 13px;
      min-height: 18px;
      word-break: break-word;
    }

    button.send {
      margin-top: 30px;
      width: 100%;
      padding: 14px;
      background-color: #ff6f00;
      border: none;
      border-radius: 6px;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 3px 8px rgba(255, 111, 0, 0.4);
    }

    button:hover {
      background-color: #cc5a00;
      box-shadow: 0 4px 12px rgba(204, 90, 0, 0.6);
      color: #fff;
    }
  </style>
</head>

<body>
  <button class="logout-btn" aria-label="Logout" title="Logout"">
     <a href=" products.php"> <i class=" fas fa-arrow-left" style="color: white;"></i></a>
  </button>
  <form action="" method="POST" enctype="multipart/form-data" id="add_products">
    <h2>Add New Product</h2>

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="caption">Caption:</label>
    <textarea id="caption" name="caption"></textarea>

    <label for="price">Price (USD):</label>
    <input type="number" id="cost" name="price" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
      <option value="">Select Category</option>
      <option value="clothing">Clothe</option>
      <option value="shoes">Shoes</option>
      <option value="accessories">Accessories</option>
      <option value="digital">Digital</option>
    </select>

    <label for="image">Product Image:</label>
    <div class="file-upload-wrapper">
      <input type="file" id="myFile" name="photos_upload" required>
      <div class="file-upload-button">Choose a photo</div>
    </div>
    <button class="send" type="submit">Add Product</button>
  </form>
</body>

</html>