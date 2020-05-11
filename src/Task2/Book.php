<?php

declare(strict_types=1);

namespace App\Task2;

class Book
{
    public $title;
    public $price;
    public $pageNumber;

    public function __construct(string $title,int $price,int $pageNumber)
    {
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