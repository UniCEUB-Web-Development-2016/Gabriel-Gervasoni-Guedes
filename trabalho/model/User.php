<?php

class User
{
	private $first_name;
	private $last_name;
	private $email;
	private $rg;
	private $cpf;
	private $address;
	private $phone;
	private $password;

	public function __construct($first_name, $last_name, $email, $rg, $cpf, $address, $phone, $password)
	{
		$this->setFirstName($first_name);
		$this->setLastName($last_name);
		$this->setEmail($email);
		$this->setRg($rg);
		$this->setCpf($cpf);
		$this->setAddress($address);
		$this->setPhone($phone);
		$this->setPassword($password);
	}

	/**
	 * @return mixed
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * @param mixed $first_name
	 */
	public function setFirstName($first_name)
	{
		$this->first_name = $first_name;
	}

	/**
	 * @return mixed
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * @param mixed $last_name
	 */
	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getRg()
	{
		return $this->rg;
	}

	/**
	 * @param mixed $rg
	 */
	public function setRg($rg)
	{
		$this->rg = $rg;
	}

	/**
	 * @return mixed
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * @param mixed $cpf
	 */
	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	/**
	 * @return mixed
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param mixed $address
	 */
	public function setAddress($address)
	{
		$this->address = $address;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}


}