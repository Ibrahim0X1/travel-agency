<?php
class BookTripCommand implements Command{
    private $bookingService;
    private $customer;
    private $travelPackage;
    private $bookingDate;
    private $bookingId;

    public function __construct($bookingService, $customer, $travelPackage, $bookingDate) {
        $this->bookingService = $bookingService;
        $this->customer = $customer;
        $this->travelPackage = $travelPackage;
        $this->bookingDate = $bookingDate;
    }

    public function execute(): bool {
        $booking = $this->bookingService->createBooking(
            $this->customer,
            $this->travelPackage,
            $this->bookingDate
        );
        $this->bookingId = $booking->id;
        return true;
    }
    
    public function undo(): bool {
        if ($this->bookingId) {
            return $this->bookingService->cancelBooking($this->bookingId);
        }
        return false;
    }
    
    public function getBookingId(): ?string {
        return $this->bookingId;
    }


}