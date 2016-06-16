<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";


class UserController

{
	private $requiredParameters = array('first_name', 'last_name', 'email', 'rg', 'cpf', 'address', 'phone','password' );

	public function register($request)
	{
		$params = $request->get_params();
		$user = new User($params["first_name"],
			$params["last_name"],
			$params["email"],
			$params["rg"],
			$params["cpf"],
			$params["address"],
			$params["phone"],
			$params["password"]);

		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

		$conn = $db->getConnection();


		return $conn->query($this->generateInsertQuery($user));
	}

	private function generateInsertQuery($user)
	{

		$query = "INSERT INTO user (first_name, last_name, email, rg, cpf, address, phone, password) VALUES ('" . $user->getFirstName() . "','" .
			$user->getLastName() . "','" .
			$user->getEmail() . "','" .
			$user->getRg() . "','" .
			$user->getCpf() . "','" .
			$user->getAddress() . "','" .
			$user->getPhone() . "','" .
			$user->getPassword() . "')";

		return $query;
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT id, first_name, last_name, email, rg, cpf, address, phone, password FROM user WHERE " . $crit);

		//foreach($result as $row) 

		return $result->fetchAll(PDO::FETCH_ASSOC);

	}

	private function generateCriteria($params)
	{
		$criteria = "";
		foreach ($params as $key => $value) {
			$criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
		}

		return substr($criteria, 0, -4);
	}

	public function update($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");
		$conn = $db->getConnection();
		foreach ($params as $key => $value) {
			$result = $conn->query("UPDATE user SET " . $key . " =  '" . $value . "' WHERE cpf = '" . $params["cpf"] . "'");
		}
		return $result;
	}

	public function delete($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "trabalho", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("DELETE FROM user WHERE cpf = '" . $params["cpf"] . "'");
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