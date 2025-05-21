
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notifications</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f6f2; color: #4b2e2e; }
        .notification-list { max-width: 600px; margin: 40px auto; }
        .notification-item {
            background: #fff8f0;
            border-left: 5px solid #b22222;
            margin-bottom: 18px;
            padding: 18px 22px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
            font-size: 1.1rem;
            position: relative;
        }
        .notification-item.unread {
            font-weight: bold;
            background: #ffeaea;
            border-left: 5px solid #ff0000;
        }
        .mark-read-btn {
            position: absolute;
            right: 18px;
            top: 18px;
            background: #b22222;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 4px 10px;
            cursor: pointer;
            font-size: 0.95rem;
        }
        .mark-read-btn:hover {
            background: #8b4513;
        }
        h1 { color: #b22222; }
    </style>
</head>
<body>
    <div class="notification-list">
        <h1>Your Notifications</h1>
        <?php if (empty($notifications)): ?>
            <p>No notifications.</p>
        <?php else: ?>
            <?php foreach ($notifications as $n): ?>
                <div class="notification-item<?php if ($n['read'] == 0) echo ' unread'; ?>">
                    <?php echo htmlspecialchars($n['message']); ?>
                    <div style="font-size:0.9em;color:#888;margin-top:6px;">
                        <?php echo htmlspecialchars($n['created_at']); ?>
                    </div>
                    <?php if ($n['read'] == 0): ?>
                        <form method="get" action="../controllers/NotificationsController.php" style="display:inline;">
                            <input type="hidden" name="read" value="<?php echo $n['id']; ?>">
                            <button type="submit" class="mark-read-btn">Mark as Read</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
