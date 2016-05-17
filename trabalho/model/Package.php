<?php

class Package
{
    private $weight;
    private $dimensions;
    private $destination_address;

    public function __construct($weight, $dimensions, $destination_address)
    {
        $this->setWeight($weight);
        $this->setDimensions($dimensions);
        $this->setDestinationAddress($destination_address);
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