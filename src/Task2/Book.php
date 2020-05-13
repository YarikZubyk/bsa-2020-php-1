<?php

declare(strict_types=1);

namespace App\Task2;

use App\Task2\BooksGenerato;

class Book
{
    public $title;
    public $price;
    public $pageNumber;

    public function __construct(string $title, int $price, int $pageNumber)
    {
        try {
            if ($price < 0) {
                throw new Exception('Ціна не може бути менша за нуль!');
            }
            if ($pageNumber < 0) {
                throw new Exception('Кількість сторінок не може бути менше за нуль!');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $this->title = $title;
        $this->price = $price;
        $this->pageNumber = $pageNumber;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPagesNumber(): int
    {
        return $this->pageNumber;
    }
}