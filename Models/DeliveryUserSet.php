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

    public function createUser($username, $password, $usertype){
        $query = "INSERT INTO delivery_users (username, password, usertype)
                    VALUES(:username, :password, :usertype)";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam('username', $username);
        $statement->bindParam('password', $password);
        $statement->bindParam('usertype', $usertype);
        $statement->execute();
    }

    public function getAllUsers(){
        $query = "SELECT * FROM delivery_users WHERE usertype LIKE 2";

        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryUser($row);
        }
        return $dataset;
    }

    public function deleteUser($id){
        $query = "DELETE FROM delivery_users WHERE userid=:id";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam('id', $id);
        $statement->execute();
    }

    public function updateUser($id, $name, $pass, $usertype){
        $query = "UPDATE delivery_users 
                  SET username = :name, password = :pass, usertype = :usertype
                  WHERE userid = :id";
        $statement = $this->_dbHandle->prepare($query);

        $statement->bindParam(':name', $name);
        $statement->bindParam(':pass', $pass);
        $statement->bindParam(':usertype', $usertype);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function selectWithID($id){
        $query = "SELECT * FROM delivery_users WHERE userid =:id";
        $statement = $this->_dbHandle->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $dataset = [];
        while ($row = $statement->fetch()){
            $dataset[] = new DeliveryUser($row);
        }
        return $dataset;
    }
}