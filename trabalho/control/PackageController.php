<?php

include_once "model/Request.php";
include_once "model/Package.php";
include_once "database/DatabaseConnector.php";

class PackageController
{
    public function register($request)
    {
        $params = $request->get_params();
        $package = new Package(
            $params["id"],
            $params["weight"],
            $params["dimensions"],
            $params["destination_address"]);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($package));
    }

    private function generateInsertQuery($package)
    {
        $query =  "INSERT INTO package (id, weight, dimensions, destination_address) VALUES ('".$package->getId()."','".
            $package->getId()."','".
            $package->getWeight()."','".
            $package->getDimensions()."','".
            $package->getDestinationAddress()."')";


        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT id, status, dimensions,destination_address FROM package WHERE ".$crit);

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