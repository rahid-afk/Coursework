<?php
require_once ('Models/Database.php');
require_once ('Models/DeliveryUser.php');

class DeliveryUserSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function getDelivererID($username){
        $query = "SELECT userid FROM delivery_users WHERE username LIKE '%" . $username . "%'";

    }
}