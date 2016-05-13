<?php

include_once "model/Request.php";
include_once "model/Delivery.php";
include_once "database/DatabaseConnector.php";

class DeliveryController
{
    public function register($request)
    {
        $params = $request->get_params();
        $delivery = new Delivery(
            $params["id"],
            $params["status"]);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($delivery));
    }

    private function generateInsertQuery($delivery)
    {
        $query =  "INSERT INTO delivery (id, status) VALUES ('".$delivery->getId()."','".
            $delivery->getId()."','".
            $delivery->getStatus()."','";


        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT id, status FROM delivery WHERE ".$crit);

        //foreach($result as $row)

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }

        return substr($criteria, 0, -4);
    }
}