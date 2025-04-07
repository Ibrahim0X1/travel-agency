<?php

// Class to represent a Travel Package
class TravelPackage {
    public $id;
    public $name;
    public $description;
    public $price;
    public $duration;
    public $destination;

    public function __construct($id, $name, $description, $price, $duration, $destination) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->duration = $duration;
        $this->destination = $destination;
    }

    public function displayDetails() {
        return "Package: $this->name, Destination: $this->destination, Price: $this->price, Duration: $this->duration days";
    }
}

// Class to represent a Customer
class Customer {
    public $id;
    public $name;
    public $email;
    public $phone;

    public function __construct($id, $name, $email, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getContactInfo() {
        return "Name: $this->name, Email: $this->email, Phone: $this->phone";
    }
}

// Class to handle Bookings
class Booking {
    public $id;
    public $customer;
    public $travelPackage;
    public $bookingDate;

    public function __construct($id, $customer, $travelPackage, $bookingDate) {
        $this->id = $id;
        $this->customer = $customer;
        $this->travelPackage = $travelPackage;
        $this->bookingDate = $bookingDate;
    }

    public function getBookingDetails() {
        return "Booking ID: $this->id, Customer: {$this->customer->name}, Package: {$this->travelPackage->name}, Date: $this->bookingDate";
    }
}

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
class AuxiliarryDataBaseFunctions {
    private static $db = null;
    public function __construct() {
        // Initialize the database connection
        if (self::$db === null) {
            try {
                self::$db = new PDO('mysql:host=localhost;dbname=unique_destination_website', 'root', '');
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
    public static function getInstance() {
        if (self::$db === null) {
            new AuxiliarryDataBaseFunctions();
        }
        return self::$db;
    }

    function getDatabaseConnection() {
        //initialize a database connection
        if(self::$db === null)
        {
            self::getInstance();
            return self::$db;
        }
        else
        {
            return self::$db;
        }
    
    }
    function getTravelPackages() {
        $db = $this->getDatabaseConnection();
        $stmt = $db->query("SELECT * FROM travel_packages");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'TravelPackage');
    }
    function getCustomers() {
        $db = $this->getDatabaseConnection();
        $stmt = $db->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Customer');
    }
    function getBookings() {
        $db = $this->getDatabaseConnection();
        $stmt = $db->query("SELECT * FROM bookings");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Booking');
    }
}

$dbFunctions1 = new AuxiliarryDataBaseFunctions();
$db1 = $dbFunctions1->getDatabaseConnection();

$dbFunctions2 = new AuxiliarryDataBaseFunctions();
$db2 = $dbFunctions2->getDatabaseConnection();

if ($db1 === $db2) {
    echo "Singleton works! Both instances are the same.";
} else {
    echo "Singleton failed! Instances are different.";
}

?>