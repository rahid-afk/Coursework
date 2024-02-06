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
        $this->_photoName = _photoName;
    }

    public function fetchAllDeliveries(){
        $sqlquery = 'SELECT * FROM delivery_point';

        $statement = $this->_dbHandle->prepare($sqlquery);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryPoint($row);
        }
        return $dataset;
    }

    public function getPhotoName(){
        return $this->_photoName;
    }
}