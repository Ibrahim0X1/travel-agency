<?php
require_once 'Connection.php';
// Class to represent a Travel Package
class TravelPackage {
    public $id;
    public $name;
    public $description;
    public $price;
    public $duration;
    public $destination;

    public function __construct($id) {
       
        $conn=Connection::getInstance()->getConnection();
        $query = "SELECT * FROM travelpackage WHERE id=".$id;
        $data = $conn->query($query);
        if (!$data) {
            die("Query failed: " . $conn->error);
        }
        if ($data->num_rows == 0) {
            die("No travel package found with ID: $id");
        }
        $result=mysqli_fetch_array($data);
        $this->id = $result['Id'];
        $this->name = $result['Name'];
        $this->description = $result['Description'];
        $this->price = $result['Price'];
        $this->duration = $result['Duration'];
        $this->destination = $result['Destination'];

    }

    public function getPackageDetails() {
        return "Package ID: $this->id \n Name: $this->name \n Description: $this->description \n Price: $this->price \n Duration: $this->duration days \n Destination: $this->destination";
    }
    
}
//$a=new TravelPackage(1);
//echo nl2br($a->getPackageDetails());
?>