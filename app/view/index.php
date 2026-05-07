<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Client Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Header Section -->
    <div class="page-header mt-5">
        <div class="container">
            <h1><i class="bi bi-people-fill"></i> MyShop - Client Management</h1>
            <p class="mb-0 mt-2 opacity-75">Manage your clients efficiently</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Add New Client Button -->
        <div class="action-card">
            <a class="btn btn-primary btn-lg" href="../process/create.php" role="button">
                <i class="bi bi-plus-circle"></i> Add New Client
            </a>
        </div>

        <!-- Clients Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i> ID</th>
                            <th><i class="bi bi-person"></i> Name</th>
                            <th><i class="bi bi-envelope"></i> Email</th>
                            <th><i class="bi bi-telephone"></i> Phone</th>
                            <th><i class="bi bi-geo-alt"></i> Address</th>
                            <th><i class="bi bi-calendar"></i> Created At</th>
                            <th class="text-center"><i class="bi bi-tools"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $username = "app_user";
                        $password = "app_password";
                        $serverName = "dockerdbhost";
                        $database = "my_database";

                        $connection = new mysqli($serverName, $username, $password, $database);

                        if ($connection->connect_error) {
                            die("Connection Error : " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM clients";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid Query : " . $connection->error);
                        }

                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "
                            <tr>
                                <td><span class='badge bg-secondary'>$row[id]</span></td>
                                <td><strong>$row[name]</strong></td>
                                <td><a href='mailto:$row[email]'>$row[email]</a></td>
                                <td>$row[phone]</td>
                                <td>$row[address]</td>
                                <td><small class='text-muted'>$row[create_at]</small></td>
                                <td class='text-center'>
                                    <a class='btn btn-primary btn-sm btn-action' href='../process/edit.php?id=$row[id]' title='Edit'>
                                        <i class='bi bi-pencil-square'></i>
                                    </a>
                                    <a class='btn btn-danger btn-sm btn-action' href='../process/delete.php?id=$row[id]' title='Delete' onclick=\"return confirm('Are you sure?')\">
                                        <i class='bi bi-trash'></i>
                                    </a>
                                </td>
                            </tr>
                            ";
                        }

                        if ($count == 0) {
                            echo "<tr><td colspan='7' class='text-center py-5 text-muted'>No clients found. <a href='../process/create.php'>Add one now</a></td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-4 text-center text-muted">
            <small>Total Clients: <strong><?php echo $count; ?></strong></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>