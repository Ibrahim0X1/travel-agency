<?php
session_start();
require_once '../models/NotificationModel.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/sign in.php");
    exit;
}

$model = new NotificationModel();

// Mark as read if id is passed
if (isset($_GET['read'])) {
    $model->markAsRead((int)$_GET['read']);
    header("Location: NotificationsController.php");
    exit;
}

$notifications = $model->getNotifications($_SESSION['user_id']);

// Pass data to the view
include '../views/notifications.php';