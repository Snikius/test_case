<?php

interface IBird {
    public function setKind($type);
    public function getKind();

    public function getLocation();
    public function setLocation(Location $location);
    public function flyTo(Location $location);

    public function setMelody($melody);

    public function singMelody(); // вывод зависит от kind

    public function killBird();
    public function cloneBird($count);
}
