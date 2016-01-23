<?php

class BirdLocation extends Location
{
    public function __construct($x, $y, $z)
    {
        $this->setPosition($x, $y, $z);
    }

    public function setPosition($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getPosition()
    {
        return [$this->x, $this->y, $this->z];
    }
}