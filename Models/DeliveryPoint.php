<?php

class DeliveryPoint
{
    protected $_id, $_name, $_address, $_city, $_postcode, $_lat, $_long;

    public function __construct($dbRow)
    {
        $this->_id = $dbRow['id'];
        $this->_name = $dbRow['name'];
        $this->_address = $dbRow['address'];
        $this->_city = $dbRow['city'];
        $this->_postcode = $dbRow['postcode'];
        $this->_lat = $dbRow['latitude'];
        $this->_long = $dbRow['longitude'];
    }

    public function getID(){
        return $this->_id;
    }
    public function getName(){
        return $this->_name;
    }
    public function getAddress(){
        return $this->_address;
    }
    public function getCity(){
        return $this->_city;
    }
    public function getPostcode(){
        return $this->_postcode;
    }
    public function getLat(){
        return $this->_lat;
    }
    public function getLong(){
        return $this->_long;
    }
}