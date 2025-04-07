<?php
// Class to manage Payments
class Payment {
    public $id;
    public $booking;
    public $amount;
    public $paymentDate;
    public $status;

    public function __construct($id, $booking, $amount, $paymentDate, $status) {
        $this->id = $id;
        $this->booking = $booking;
        $this->amount = $amount;
        $this->paymentDate = $paymentDate;
        $this->status = $status;
    }

    public function getPaymentDetails() {
        return "Payment ID: $this->id, Booking ID: {$this->booking->id}, Amount: $this->amount, Status: $this->status";
    }
}
?>