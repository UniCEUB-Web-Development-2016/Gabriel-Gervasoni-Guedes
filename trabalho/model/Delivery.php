<?php

class Delivery
{
    private $status;

    public function __construct($status)
    {
        $this->setStatus($status);
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
}
