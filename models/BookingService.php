<?php
require_once 'Connection.php';
require_once 'BookingModel.php';
require_once 'TravelPackageModel.php';
class BookingService {

    public function createBooking($customer, $travelPackage, $bookingDate): Booking {
        $conn = Connection::getInstance()->getConnection();

        $stmt = $conn->prepare("INSERT INTO bookings (customer_name, travel_package_id, booking_date) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $customer, $travelPackage->id, $bookingDate);
        
        if ($stmt->execute()) {
            $bookingId = $stmt->insert_id;
            return new Booking($bookingId, $customer, $travelPackage, $bookingDate);
        } else {
            die("Booking failed: " . $stmt->error);
        }
    }

    public function cancelBooking($bookingId): bool {
        $conn = Connection::getInstance()->getConnection();

        $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->bind_param("i", $bookingId);

        return $stmt->execute();
    }

    public function getBooking($bookingId): ?Booking {
        $conn = Connection::getInstance()->getConnection();

        $stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $travelPackage = new TravelPackage($row['travel_package_id']);
            return new Booking($row['id'], $row['customer_name'], $travelPackage, $row['booking_date']);
        }

        return null;
    }
}
?>
