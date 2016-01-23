<?php

abstract class Location
{
    protected $x;
    protected $y;
    protected $z;

    abstract public function getPosition();
    abstract public function setPosition($x, $y, $z);
}