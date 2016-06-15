<?php

class Package
{
    private $weight;
    private $dimensions;
    private $destination_address;
	private $status;
	private $cod_user;

    public function __construct($weight, $dimensions, $destination_address, $status, $cod_user)
    {
        $this->setWeight($weight);
        $this->setDimensions($dimensions);
        $this->setDestinationAddress($destination_address);
		$this->setStatus($status);
		$this->setCodUser($cod_user);
		
    }


    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param mixed $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDestinationAddress()
    {
        return $this->destination_address;
    }

    /**
     * @param mixed $destination_address
     */
    public function setDestinationAddress($destination_address)
    {
        $this->destination_address = $destination_address;
    }

	/**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
	/**
     * @return mixed
     */
    public function getCodUser()
    {
        return $this->cod_user;
    }

    /**
     * @param mixed $cod_user
     */
    public function setCodUser($cod_user)
    {
        $this->cod_user = $cod_user;
    }
}