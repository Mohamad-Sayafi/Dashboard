<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            display: flex;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
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

        /* Content */
        #content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
        }

        /* Header */
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

        /* Cards */
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

        /* Responsive */
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
    </style>
</head>

<body>

    <nav id="sidebar">
        <div class="text-center mb-4">
            <h3 style="color:#ff6f00; font-weight:700;">MyPanel</h3>
        </div>
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a class="nav-link active" >Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_info.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product_category.php">Products Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Support</a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <header id="header">
            <h4>Panel</h4>
        </header>

        <div class="container-fluid">
            <div class="row g-4">

                <div class="col-md-3 col-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5>Users</h5>
                            <p>1,234</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5>Sales</h5>
                            <p>$12,345</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5>Orders</h5>
                            <p>567</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5>Visitors</h5>
                            <p>8,765</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-5">
                <h5>Recent Activity</h5>
                <table class="table table-striped table-hover mt-3">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alice</td>
                            <td>Logged in</td>
                            <td>2025-07-20</td>
                            <td><span class="badge bg-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>Bob</td>
                            <td>Updated profile</td>
                            <td>2025-07-18</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Charlie</td>
                            <td>Placed an order</td>
                            <td>2025-07-15</td>
                            <td><span class="badge bg-info text-dark">In Progress</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>