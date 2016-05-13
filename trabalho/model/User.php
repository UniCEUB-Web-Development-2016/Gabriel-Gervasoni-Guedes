<?php

class User
{
	private $first_name;
	private $last_name;
	private $email;
	private $birthdate;
	private $phone;
	private $password;

	public function __construct($first_name, $last_name, $email, $birthdate, $phone, $password)
	{
		$this->setFirstName($first_name);
		$this->setLastName($last_name);
		$this->setEmail($email);
		$this->setBirthdate($birthdate);
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
	 * @param mixed $name
	 */
	public function setFirstName($first_name)
	{
		$this->name = $first_name;
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
	public function getBirthdate()
	{
		return $this->birthdate;
	}

	/**
	 * @param mixed $birthdate
	 */
	public function setBirthdate($birthdate)
	{
		$this->birthdate = $birthdate;
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