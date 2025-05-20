<?php
session_start();
require_once '../models/NotificationModel.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$model = new NotificationModel();
$notifications = $model->getNotifications($_SESSION['user_id']);
echo json_encode($notifications);
?>