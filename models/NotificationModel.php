<?php
require_once 'Connection.php';
class NotificationModel {
    private $connection;

    public function __construct() {
        $connection=new Connection();
        $this->connection = $connection->getConnection();
    }

    public function getNotifications($userId) {
        $stmt = $this->connection->prepare("SELECT * FROM notification WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function markAsRead($notificationId) {
        $stmt = $this->connection->prepare("UPDATE notification SET `read` = 1 WHERE id = ?");
        $stmt->bind_param("i", $notificationId);
        return $stmt->execute();
    }
    public function deleteNotification($notificationId) {
        $stmt = $this->connection->prepare("DELETE FROM notification WHERE id = ?");
        $stmt->bind_param("i", $notificationId);
        return $stmt->execute();
    }
    public function addNotification($userId, $message) {
        $stmt = $this->connection->prepare("INSERT INTO notification (user_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $message);
        return $stmt->execute();
    }

}
//test 
// $notificationModel = new NotificationModel();
// $a=$notificationModel->getNotifications(1);
// print_r($a);
?>