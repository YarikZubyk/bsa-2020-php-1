<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Task1\Car;
use App\Task1\Track;

$bmw = new Car(1,
    'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
    'BMW',
    250,
    10,
    9.3,
    10);

$tesla = new Car(2,
    'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
    'TESLA',
    200,
    60,
    5.5,
    7);

$ford = new Car(3,
    'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
    'FORD',
    180,
    15,
    5,
    5);

$track = new Track(100, 5);

$track->add($bmw);
$track->add($tesla);
$track->add($ford);


print_r($track->all());
print_r($track->run());