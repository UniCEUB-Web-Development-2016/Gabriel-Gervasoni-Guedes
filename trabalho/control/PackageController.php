<?php

include_once "model/Request.php";
include_once "model/Package.php";
include_once "database/DatabaseConnector.php";

class PackageController
{
    private $requiredParameters = array('weight', 'dimensions', 'destination_address', 'status', 'cod_user');

    public function register($request)
    {
        $params = $request->get_params();
        $package = new Package(
            $params["weight"],
            $params["dimensions"],
            $params["destination_address"],
			$params["status"],
			$params["cod_user"]);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($package));
    }

    private function generateInsertQuery($package)
    {
        $query =  "INSERT INTO package (weight, dimensions, destination_address, status, cod_user) VALUES ('".$package->getWeight()."','".
            $package->getDimensions()."','".
            $package->getDestinationAddress()."','".
			$package->getStatus()."','".
			$package->getCodUser()."')";

        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT id, weight, status, dimensions, destination_address, status, cod_user FROM package WHERE ".$crit);

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
	
	public function update($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");
		$conn = $db->getConnection();
		foreach ($params as $key => $value) {
			$result = $conn->query("UPDATE package SET " . $key . " =  '" . $value . "' WHERE id = '" . $params["id"] . "'");
		}
		return $result;
	}

	public function delete($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("DELETE FROM package WHERE id = '" . $params["id"] . "'");
		return $result;
	}

	private function isValid($parameters)
	{
		$keys = array_keys($parameters);
		$diff1 = array_diff($keys, $this->requiredParameters);
		$diff2 = array_diff($this->requiredParameters, $keys);
		if (empty($diff2) && empty($diff1))
			return false;
}
}