<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;

class CarTrackHtmlPresenter
{
    public function present(Track $track): string
    {

        $cars = $track->all();

        $carWiew = '<div class="container">';
        foreach ($cars as $car) {
            $carWiew .= '<div class="car-container">';
            $carWiew .= '<p class="name-container">' . $car->getName() . ': ' . $car->getSpeed() . ', ' . $car->getFuelConsumption() . '</p>';
            $carWiew .= '<img src="'.$car->getImage().'">';
            $carWiew .= '<ul class="ul-container">';
            $carWiew .= '<li class="info"><strong>Speed Car:</strong> ' . $car->getSpeed() . ' km/h</li> ';
            $carWiew .= '<li class="info"><strong>PitStop time Car:</strong>  ' . $car->getPitStopTime() . ' S</li> ';
            $carWiew .= '<li class="info"><strong>Fuel Consumption Car:</strong>  ' . $car->getFuelConsumption() . ' L</li> ';
            $carWiew .= '<li class="info"><strong>Tank volume Car:</strong>  ' . $car->getFuelTankVolume() . ' L</li> ';
            $carWiew .= '</ul>';
            $carWiew .= '</div>';
        }
        $carWiew .= '</div > ';
        return $carWiew;
    }
}

