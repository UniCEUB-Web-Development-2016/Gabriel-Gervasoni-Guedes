<?php

class Package
{
    private $id;
    private $weight;
    private $dimensions;
    private $destination_address;

    public function __construct($id, $weight, $dimensions, $destination_address)
    {
        $this->setId($id);
        $this->setWeight($weight);
        $this->setDimensions($dimensions);
        $this->setDestinationAddress($destination_address);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

}