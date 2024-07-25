<?php

require_once ('Models/Database.php');
require_once ('Models/DeliveryPoint.php');

class DeliveryPointSet
{
    protected $_dbHandle, $_dbInstance;
    protected $_photoName;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
//        $this->_photoName = _photoName;
    }

    public function fetchAllDeliveries($firstPage, $pageLimit){
        $query = "SELECT * FROM delivery_point WHERE deliverer LIKE '%" . $this->fetchDelivererUsername() . "%' LIMIT " . $firstPage . ',' . $pageLimit;

        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function getAllDeliveries(){
        $query = "SELECT * FROM delivery_point";

        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function generateQuery($query){
        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function filterSearch($firstPage, $pageLimit){
        $query = "SELECT * FROM delivery_point WHERE id LIKE '%" . $_POST['idSearch'] . "%'
    AND name LIKE '%" . $_POST['nameSearch'] . "%'
    AND address LIKE '%" . $_POST['addressSearch'] . "%'
    AND city LIKE '%" . $_POST['citySearch'] . "%'
    AND postcode LIKE '%" . $_POST['postSearch'] . "%'
    AND latitude LIKE '%" . $_POST['latSearch'] . "%'
    AND longitude LIKE '%" . $_POST['longSearch'] . "%'
    AND deliverer LIKE '%" . $this->fetchDelivererUsername() . "%' 
    LIMIT " . $firstPage . ',' . $pageLimit;

        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function fetchDelivererUsername(){
        $query = "SELECT userid FROM delivery_users WHERE username LIKE '%" . $_SESSION['login'] . "%'";
        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function createNewRecord($name, $address, $city, $postcode, $deliverer, $lat, $long, $status){
        $query = "INSERT INTO delivery_point (name, address, city, postcode, deliverer, latitude, longitude, status) 
              VALUES (:name, :address, :city, :postcode, :deliverer, :lat, :long, :status)";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam(':name', $name);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':city', $city);
        $statement->bindParam(':postcode', $postcode);
        $statement->bindParam(':deliverer', $deliverer);
        $statement->bindParam(':lat', $lat);
        $statement->bindParam(':long', $long);
        $statement->bindParam(':status', $status);
        $statement->execute();
    }



    public function getPhotoName(){
        return $this->_photoName;
    }

    public function selectWithID($id){
        $query = "SELECT * FROM delivery_point WHERE id =:id";
        $statement = $this->_dbHandle->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function updateRecord($id, $name, $address, $city, $postcode, $deliverer, $lat, $long, $status){
        $query = "UPDATE delivery_point 
              SET name=:name, address=:address, city=:city, postcode=:postcode, deliverer=:deliverer, latitude=:lat, longitude=:long, status=:status
              WHERE id = :id";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':city', $city);
        $statement->bindParam(':postcode', $postcode);
        $statement->bindParam(':deliverer', $deliverer);
        $statement->bindParam(':lat', $lat);
        $statement->bindParam(':long', $long);
        $statement->bindParam(':status', $status);
        $statement->execute();
    }

    public function deleteRecord($id){
        $query = "DELETE FROM delivery_point WHERE id=:id";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function getTotalRecords ($delivererId){
        $query = "SELECT COUNT(*) FROM delivery_point WHERE deliverer =:delivererId";
        $statement = $this->_dbHandle->prepare($query);
        $statement->bindParam(':delivererId', $delivererId);
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function getDeliveryPoints($delivererId, $page, $pageLimit){
        $offset = ($page -1) * $pageLimit;
        $query = "SELECT * FROM delivery_point WHERE deliverer =:delivererId ORDER BY id ASC LIMIT :offset, :limit";
        $statement = $this->_dbHandle->prepare($query);
        $statement->bindParam(':delivererId', $delivererId, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->bindParam(':limit', $pageLimit, PDO::PARAM_INT);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }

        return $dataset;
    }

    public function getDeliveryPointsForDeliverer($delivererID){
        $query = "SELECT * FROM delivery_point WHERE deliverer =:delivererId";
        $statement = $this->_dbHandle->prepare($query);
        $statement->bindParam(':delivererId', $delivererID);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }

        return $dataset;
    }

    public function updateStatus($id, $status){
//        $query = "UPDATE delivery_point SET status =:status WHERE id =:id";
        $query = "UPDATE delivery_point SET status = " . $status . " WHERE id = " . $id;
        $statement = $this->_dbHandle->prepare($query);
//        $statement->bindParam(':id', $id);
//        $statement->bindParam(':status', $status);
        $statement->execute();
    }
}