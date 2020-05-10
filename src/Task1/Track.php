<?php

declare(strict_types=1);

namespace App\Task1;

use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\This;

class Track
{
    public float $lapLength;
    public int $lapsNumber;
    public array $cars;

    public function __construct(float $lapLength, int $lapsNumber)
    {
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;
    }

    public function getLapLength(): float
    {
        return $this->lapLength;
    }

    public function getLapsNumber(): int
    {
        return $this->lapsNumber;
    }

    public function add(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function all(): array
    {
        return $this->cars;
    }


    public function run(): Car
    {
        $totalTime = [];
        for ($i = 0; $i < count($this->all()); $i++) {
            if ($this->totalLength() > $this->lengthFullTank($this->all()[$i])) {
                $totalTime[$i] = ((int)($this->totalLength() / $this->lengthFullTank($this->all()[$i])) * //ділимо повний шлях на шлях який машина пройде без дозаправки
                        $this->all()[$i]->getPitStopTime()) + $this->totalTime($this->all()[$i]); // множимо на піт-стоп час, та додаємо загальний час проходження дистанції
            } else {
                $totalTime[$i] = $this->timeRunTrack($this->all()[$i]);
            }
        }
        return $this->all()[array_search(min($totalTime), $totalTime)];
    }


    /*
     * Повна довжина з урахуванням кіл
     */
    public function totalLength()
    {
        return $this->getLapLength() * $this->getLapsNumber();
    }

    /*
     * Скільки машина може проїхати без дозаправки
     * */
    public function lengthFullTank($car)
    {
        return ($car->getFuelTankVolume() * 100) / $car->getFuelConsumption();
    }

    /*
     * Потрібний час що проїхати всю трасу
     * */
    public function totalTime($car)
    {
        return ($this->totalLength() / $car->getSpeed()) * 3600;
    }


}



