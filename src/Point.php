<?php
declare(strict_types=1);

namespace Cvek\Point;

class Point
{
    protected $latitude;
    protected $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function __toString(): string
    {
        return \sprintf('(%f, %f)', $this->latitude, $this->longitude);
    }
}
