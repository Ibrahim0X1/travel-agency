
<?php
class BookingService {
    private $bookings = []; // In a real app, this would be your database
    
    public function createBooking($customer, $travelPackage, $bookingDate): Booking {
        $id = uniqid(); // Generate unique ID
        $booking = new Booking($id, $customer, $travelPackage, $bookingDate);
        $this->bookings[$id] = $booking;
        return $booking;
    }
    
    public function cancelBooking($bookingId): bool {
        if (isset($this->bookings[$bookingId])) {
            unset($this->bookings[$bookingId]);
            return true;
        }
        return false;
    }
    
    public function getBooking($bookingId): ?Booking {
        return $this->bookings[$bookingId] ?? null;
    }
}
?>