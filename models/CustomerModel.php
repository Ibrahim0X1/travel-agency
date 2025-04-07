<?php
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
?>