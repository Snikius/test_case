<?php

class CyberBird implements \IBird
{
    private $alive = true;
    private $kind;
    private $location;
    private $speed;
    private $melody;

    public function __construct(Location $location, $speed)
    {
        $this->speed = $speed;
        $this->setLocation($location);
    }

    /**
     * @throws Exception
     */
    private function checkBird()
    {
        if(!$this->alive) {
            throw new \Exception('Bird is dead');
        }
    }

    /**
     * @param $type
     * @throws Exception
     */
    public function setKind($type)
    {
        $this->checkBird();
        $this->kind = $type;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getKind()
    {
        $this->checkBird();
        return $this->kind;
    }

    /**
     * @return Location
     * @throws Exception
     */
    public function getLocation()
    {
        $this->checkBird();
        return $this->location;
    }

    /**
     * @param Location $location
     * @throws Exception
     */
    public function setLocation(Location $location)
    {
        $this->checkBird();
        $this->location = clone $location;
    }

    /**
     * Логика упрощена
     * @param Location $location
     * @throws Exception
     */
    public function flyTo(Location $location)
    {
        $this->checkBird();
        $pFrom = $this->location->getPosition();
        $pTo = $location->getPosition();
        $xDif = $pFrom[0] - $pTo[0];
        $yDif = $pFrom[1] - $pTo[1];
        $zDif = $pFrom[2] - $pTo[2];
        $distance = sqrt($xDif * $xDif + $yDif * $yDif + $zDif * $zDif);
        $time = $distance / $this->speed;
        for($i = 0; $i < $time; $i++) {
            $cPosition = [
                $pFrom[0] + ($xDif * ($time / $i)),
                $pFrom[1] + ($yDif * ($time / $i)),
                $pFrom[2] + ($zDif * ($time / $i)),
            ];
            $this->location->setPosition($cPosition[0], $cPosition[1], $cPosition[2]);
            echo "Current position is: " . json_encode($cPosition);
        }
        $this->location->setPosition($pTo[0], $pTo[1], $pTo[2]);
    }

    /**
     * @param $melody
     * @throws Exception
     */
    public function setMelody($melody)
    {
        $this->checkBird();
        $this->melody = $melody;
    }

    /**
     * @throws Exception
     */
    public function singMelody()
    {
        $this->checkBird();
        echo 'Sing ' . $this->melody;
    }

    public function killBird()
    {
        $this->alive = false;
    }

    /**
     * @param $count
     * @return array
     * @throws Exception
     */
    public function cloneBird($count)
    {
        $this->checkBird();
        $birds = [];
        for($i = 0; $i < $count; $i++) {
            $birds[] = clone $this;
        }
        return $birds;
    }
}