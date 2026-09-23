<?php
require_once '../../config/config.php';


requireRole('admin');

logActivity(
    $pdo,
    $_SESSION['user_id'],
    $_SESSION['user_email'],
    'view_activity_logs',
    'success'
);

// Activity Logs Query#3
$stmt = $pdo->query("
    SELECT *
    FROM activity_logs
    ORDER BY activity_log_created_at DESC
");

$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            display: inline-block;
            margin-right: 15px;
            font-size: 24px;
        }

        .header a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }

        .header a:hover {
            text-decoration: underline;
        }

        /* Basic Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Welcome Admin</h1>
        <a href="../../auth/signout.php">Sign Out</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Record ID</th>
                <th>User ID</th>
                <th>User Email</th>
                <th>Action</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($activities as $activity): ?>
                <tr>
                    <td><?= htmlspecialchars($activity['activity_log_id']) ?></td>
                    <td><?= htmlspecialchars($activity['user_id']) ?></td>
                    <td><?= htmlspecialchars($activity['user_email']) ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_action']) ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_status']) ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_ip_address']) ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_user_agent']) ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>

