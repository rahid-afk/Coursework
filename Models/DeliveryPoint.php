<?php

class DeliveryPoint
{
    protected $_id, $_name, $_address, $_city, $_postcode, $_deliverer, $_lat, $_long, $_status;

    public function __construct($dbRow)
    {
        $this->_id = $dbRow['id'];
        $this->_name = $dbRow['name'];
        $this->_address = $dbRow['address'];
        $this->_city = $dbRow['city'];
        $this->_postcode = $dbRow['postcode'];
        $this->_deliverer = $dbRow['deliverer'];
        $this->_lat = $dbRow['latitude'];
        $this->_long = $dbRow['longitude'];
        $this->_status = $dbRow['status'];
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
    public function getDeliverer(){
        return $this->_deliverer;
    }
    public function getLat(){
        return $this->_lat;
    }
    public function getLong(){
        return $this->_long;
    }
    public function getStatus(){
        return $this->_status;
    }
}